/**
 * Bulk Pages Admin JavaScript
 *
 * Handles JSON validation, preset selection, and variable replacement
 * for the Bulk Page Creation admin interface.
 *
 * @package LeanCMS
 * @since 1.3.7
 */

(function($) {
	'use strict';

	/**
	 * Main initialization
	 */
	$(document).ready(function() {
		const $form = $('#leancms-bulk-pages-form');
		const $textarea = $('#leancms-pages-json');
		const $validation = $('#leancms-json-validation');
		const $presetSelect = $('#leancms-preset-select');
		const $presetDescription = $('#leancms-preset-description');
		const $presetDescriptionText = $('#leancms-preset-description-text');
		const $variableInputs = $('#leancms-variable-inputs');
		const $clientCode = $('#leancms-client-code');
		const $clientName = $('#leancms-client-name');
		const $applyPreset = $('#leancms-apply-preset');
		const $validateButton = $('#leancms-validate-json');

		let currentPreset = null;

		/**
		 * Validate JSON syntax and structure
		 */
		function validateJSON(showMessage = true) {
			const jsonString = $textarea.val().trim();

			if (!jsonString) {
				if (showMessage) {
					$validation.removeClass('valid invalid').empty();
				}
				return { valid: false, error: 'Empty JSON' };
			}

			try {
				const parsed = JSON.parse(jsonString);

				// Check if it's an array
				if (!Array.isArray(parsed)) {
					throw new Error('JSON must be an array of page objects');
				}

				// Validate each page object
				const errors = [];
				parsed.forEach((page, index) => {
					if (typeof page !== 'object' || page === null) {
						errors.push(`Item ${index + 1}: Must be an object`);
						return;
					}

					if (!page['page-title'] || typeof page['page-title'] !== 'string') {
						errors.push(`Item ${index + 1}: Missing or invalid 'page-title'`);
					}

					// Check for common typos
					if (page.title) {
						errors.push(`Item ${index + 1}: Use 'page-title' not 'title'`);
					}
				});

				if (errors.length > 0) {
					if (showMessage) {
						showValidation(false, errors.join('<br>'));
					}
					return { valid: false, error: errors.join('; ') };
				}

				if (showMessage) {
					showValidation(true, `✓ Valid JSON with ${parsed.length} page(s)`);
				}
				return { valid: true, data: parsed };

			} catch (e) {
				if (showMessage) {
					showValidation(false, '✗ Invalid JSON: ' + e.message);
				}
				return { valid: false, error: e.message };
			}
		}

		/**
		 * Show validation message
		 */
		function showValidation(isValid, message) {
			$validation
				.removeClass('valid invalid')
				.addClass(isValid ? 'valid' : 'invalid')
				.html(message);
		}

		/**
		 * Handle preset selection
		 */
		$presetSelect.on('change', function() {
			const presetKey = $(this).val();

			if (!presetKey || !leancmsBulkPages.presets[presetKey]) {
				$presetDescription.hide();
				$variableInputs.hide();
				currentPreset = null;
				return;
			}

			currentPreset = leancmsBulkPages.presets[presetKey];

			// Show description
			$presetDescriptionText.text(currentPreset.description);
			$presetDescription.show();

			// Show variable inputs
			$variableInputs.show();

			// Clear previous inputs
			$clientCode.val('');
			$clientName.val('');
		});

		/**
		 * Apply preset with variable replacement
		 */
		$applyPreset.on('click', function() {
			if (!currentPreset) {
				return;
			}

			const clientCode = $clientCode.val().trim();
			const clientName = $clientName.val().trim();

			if (!clientCode) {
				alert('Please enter a Client Code');
				$clientCode.focus();
				return;
			}

			if (!clientName) {
				alert('Please enter a Client Name');
				$clientName.focus();
				return;
			}

			// Validate client code format
			const clientCodePattern = /^[a-z0-9\-]+$/;
			if (!clientCodePattern.test(clientCode)) {
				alert('Client Code must contain only lowercase letters, numbers, and hyphens');
				$clientCode.focus();
				return;
			}

			// Generate parent slug from client name (convert to permalink-friendly format)
			const parentSlug = clientName
				.toLowerCase()
				.replace(/[^a-z0-9\s\-]/g, '') // Remove special characters
				.replace(/\s+/g, '-')           // Replace spaces with hyphens
				.replace(/\-+/g, '-')           // Replace multiple hyphens with single hyphen
				.replace(/^\-|\-$/g, '');       // Remove leading/trailing hyphens

			// Clone template and replace variables
			let jsonString = JSON.stringify(currentPreset.template, null, 2);
			jsonString = jsonString.replace(/\{\{CLIENT_CODE\}\}/g, clientCode);
			jsonString = jsonString.replace(/\{\{CLIENT_NAME\}\}/g, clientName);
			jsonString = jsonString.replace(/\{\{PARENT_SLUG\}\}/g, parentSlug);

			// Set textarea value
			$textarea.val(jsonString);

			// Validate
			validateJSON(true);

			// Show success message
			alert('Preset applied successfully! Review the JSON below and click "Create Pages" when ready.');
		});

		/**
		 * Manual validation button
		 */
		$validateButton.on('click', function() {
			validateJSON(true);
		});

		/**
		 * Real-time validation on textarea change (debounced)
		 */
		let validationTimeout;
		$textarea.on('input', function() {
			clearTimeout(validationTimeout);
			validationTimeout = setTimeout(function() {
				validateJSON(true);
			}, 500);
		});

		/**
		 * Form submission validation
		 */
		$form.on('submit', function(e) {
			const result = validateJSON(false);

			if (!result.valid) {
				e.preventDefault();
				alert('Please fix JSON errors before creating pages:\n\n' + result.error);
				$textarea.focus();
				validateJSON(true); // Show validation message
				return false;
			}

			// Confirm before creating
			const confirmMessage = `You are about to create ${result.data.length} page(s).\n\nAre you sure you want to continue?`;
			if (!confirm(confirmMessage)) {
				e.preventDefault();
				return false;
			}

			return true;
		});

		/**
		 * Auto-validate on page load if textarea has content
		 */
		if ($textarea.val().trim()) {
			validateJSON(true);
		}

		/**
		 * Client code input: auto-lowercase and sanitize
		 */
		$clientCode.on('input', function() {
			let value = $(this).val();
			value = value.toLowerCase().replace(/[^a-z0-9\-]/g, '');
			$(this).val(value);
		});
	});

})(jQuery);
