<?php
/**
 * Theme Index - Stub
 *
 * Delegates to the LeanCMS plugin's theme/index.php
 */

if ( defined( 'LEANCMS_PLUGIN_DIR' ) ) {
    include LEANCMS_PLUGIN_DIR . 'theme/index.php';
} else {
    echo '<p>LeanCMS plugin is required. Please activate the LeanCMS Single plugin.</p>';
}
