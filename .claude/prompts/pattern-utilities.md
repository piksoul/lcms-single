# Pattern: Utilities

## Purpose
Standardized approach for common utility functions, helpers, logging, debugging, and reusable code patterns in WordPress plugins.

## WordPress Standards
- **Function Prefix:** Always prefix utility functions with plugin slug
- **Global Functions:** Avoid polluting global namespace
- **Error Handling:** Use `WP_Error` for error returns
- **Logging:** Use `error_log()` when `WP_DEBUG` is enabled
- **Sanitization:** Provide sanitization helpers
- **File Header:** Always include filepath in file header documentation block

## File Structure
```
includes/
└── utilities/
    ├── class-helpers.php             # General helper functions
    ├── class-logger.php              # Logging system
    ├── class-validator.php           # Data validation
    ├── class-sanitizer.php           # Data sanitization
    ├── class-formatter.php           # Data formatting
    └── functions.php                 # Global utility functions
```

## Code Template

### Helpers Class (`class-helpers.php`)

```php
<?php
/**
 * Helper Functions
 *
 * @package    LeanCMS_Plugin
 * @subpackage Utilities
 * @filepath   includes/utilities/class-helpers.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

class LeanCMS_Helpers {

    /**
     * Check if plugin is in debug mode
     *
     * @return bool
     */
    public static function is_debug() {
        return defined( 'WP_DEBUG' ) && WP_DEBUG;
    }

    /**
     * Get plugin option with default
     *
     * @param string $key Option key
     * @param mixed $default Default value
     * @return mixed Option value
     */
    public static function get_option( $key, $default = '' ) {
        $options = get_option( 'leancms_options', array() );
        return isset( $options[ $key ] ) ? $options[ $key ] : $default;
    }

    /**
     * Update plugin option
     *
     * @param string $key Option key
     * @param mixed $value Option value
     * @return bool Success
     */
    public static function update_option( $key, $value ) {
        $options = get_option( 'leancms_options', array() );
        $options[ $key ] = $value;
        return update_option( 'leancms_options', $options );
    }

    /**
     * Get current user ID or 0 if not logged in
     *
     * @return int User ID
     */
    public static function get_current_user_id() {
        return is_user_logged_in() ? get_current_user_id() : 0;
    }

    /**
     * Check if current user has capability
     *
     * @param string $capability Capability to check
     * @return bool Has capability
     */
    public static function current_user_can( $capability ) {
        return is_user_logged_in() && current_user_can( $capability );
    }

    /**
     * Get post meta with default value
     *
     * @param int $post_id Post ID
     * @param string $key Meta key
     * @param mixed $default Default value
     * @return mixed Meta value
     */
    public static function get_post_meta( $post_id, $key, $default = '' ) {
        $value = get_post_meta( $post_id, $key, true );
        return ! empty( $value ) ? $value : $default;
    }

    /**
     * Get user meta with default value
     *
     * @param int $user_id User ID
     * @param string $key Meta key
     * @param mixed $default Default value
     * @return mixed Meta value
     */
    public static function get_user_meta( $user_id, $key, $default = '' ) {
        $value = get_user_meta( $user_id, $key, true );
        return ! empty( $value ) ? $value : $default;
    }

    /**
     * Generate random string
     *
     * @param int $length String length
     * @return string Random string
     */
    public static function generate_random_string( $length = 32 ) {
        return bin2hex( random_bytes( $length / 2 ) );
    }

    /**
     * Generate unique key
     *
     * @param string $prefix Optional prefix
     * @return string Unique key
     */
    public static function generate_unique_key( $prefix = '' ) {
        return $prefix . uniqid( '', true );
    }

    /**
     * Check if request is AJAX
     *
     * @return bool Is AJAX
     */
    public static function is_ajax() {
        return wp_doing_ajax();
    }

    /**
     * Check if in admin area
     *
     * @return bool Is admin
     */
    public static function is_admin() {
        return is_admin() && ! wp_doing_ajax();
    }

    /**
     * Get current URL
     *
     * @return string Current URL
     */
    public static function get_current_url() {
        return home_url( add_query_arg( array() ) );
    }

    /**
     * Redirect with message
     *
     * @param string $url Redirect URL
     * @param string $message Message
     * @param string $type Message type (success, error, warning, info)
     * @return void
     */
    public static function redirect_with_message( $url, $message, $type = 'info' ) {
        set_transient( 'leancms_redirect_message', array(
            'message' => $message,
            'type'    => $type,
        ), 30 );

        wp_redirect( $url );
        exit;
    }
}
```

### Logger Class (`class-logger.php`)

```php
<?php
/**
 * Logging System
 *
 * @package    LeanCMS_Plugin
 * @subpackage Utilities
 * @filepath   includes/utilities/class-logger.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

class LeanCMS_Logger {

    /**
     * Log levels
     */
    const LEVEL_DEBUG   = 'debug';
    const LEVEL_INFO    = 'info';
    const LEVEL_WARNING = 'warning';
    const LEVEL_ERROR   = 'error';

    /**
     * Log file path
     *
     * @var string
     */
    private $log_file;

    /**
     * Constructor
     */
    public function __construct() {
        $upload_dir = wp_upload_dir();
        $this->log_file = $upload_dir['basedir'] . '/leancms-debug.log';
    }

    /**
     * Log message
     *
     * @param string $message Message to log
     * @param string $level Log level
     * @param array $context Additional context
     * @return void
     */
    public function log( $message, $level = self::LEVEL_INFO, $context = array() ) {
        // Only log if debug mode is enabled
        if ( ! defined( 'WP_DEBUG' ) || ! WP_DEBUG ) {
            return;
        }

        // Format log entry
        $log_entry = sprintf(
            '[%s] [%s] %s',
            current_time( 'Y-m-d H:i:s' ),
            strtoupper( $level ),
            $message
        );

        // Add context if provided
        if ( ! empty( $context ) ) {
            $log_entry .= ' ' . wp_json_encode( $context );
        }

        // Write to file
        $this->write_to_file( $log_entry );

        // Also use error_log
        error_log( $log_entry );
    }

    /**
     * Log debug message
     *
     * @param string $message Message
     * @param array $context Context
     * @return void
     */
    public function debug( $message, $context = array() ) {
        $this->log( $message, self::LEVEL_DEBUG, $context );
    }

    /**
     * Log info message
     *
     * @param string $message Message
     * @param array $context Context
     * @return void
     */
    public function info( $message, $context = array() ) {
        $this->log( $message, self::LEVEL_INFO, $context );
    }

    /**
     * Log warning message
     *
     * @param string $message Message
     * @param array $context Context
     * @return void
     */
    public function warning( $message, $context = array() ) {
        $this->log( $message, self::LEVEL_WARNING, $context );
    }

    /**
     * Log error message
     *
     * @param string $message Message
     * @param array $context Context
     * @return void
     */
    public function error( $message, $context = array() ) {
        $this->log( $message, self::LEVEL_ERROR, $context );
    }

    /**
     * Write to log file
     *
     * @param string $entry Log entry
     * @return void
     */
    private function write_to_file( $entry ) {
        // Add newline
        $entry .= "\n";

        // Write to file
        file_put_contents( $this->log_file, $entry, FILE_APPEND );
    }

    /**
     * Clear log file
     *
     * @return bool Success
     */
    public function clear_log() {
        if ( file_exists( $this->log_file ) ) {
            return unlink( $this->log_file );
        }
        return true;
    }

    /**
     * Get log contents
     *
     * @param int $lines Number of lines to retrieve (0 for all)
     * @return string Log contents
     */
    public function get_log( $lines = 100 ) {
        if ( ! file_exists( $this->log_file ) ) {
            return '';
        }

        if ( $lines === 0 ) {
            return file_get_contents( $this->log_file );
        }

        // Get last N lines
        $file = file( $this->log_file );
        $file = array_slice( $file, -$lines );
        return implode( '', $file );
    }
}

// Global instance
global $leancms_logger;
$leancms_logger = new LeanCMS_Logger();
```

### Validator Class (`class-validator.php`)

```php
<?php
/**
 * Data Validation
 *
 * @package    LeanCMS_Plugin
 * @subpackage Utilities
 * @filepath   includes/utilities/class-validator.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

class LeanCMS_Validator {

    /**
     * Validate email address
     *
     * @param string $email Email address
     * @return bool|WP_Error True if valid, WP_Error if invalid
     */
    public static function validate_email( $email ) {
        if ( ! is_email( $email ) ) {
            return new WP_Error( 'invalid_email', __( 'Invalid email address', 'leancms-plugin' ) );
        }
        return true;
    }

    /**
     * Validate required field
     *
     * @param mixed $value Field value
     * @param string $field_name Field name for error message
     * @return bool|WP_Error
     */
    public static function validate_required( $value, $field_name = 'Field' ) {
        if ( empty( $value ) ) {
            return new WP_Error( 'required_field', sprintf(
                __( '%s is required', 'leancms-plugin' ),
                $field_name
            ));
        }
        return true;
    }

    /**
     * Validate string length
     *
     * @param string $value String value
     * @param int $min Minimum length
     * @param int $max Maximum length
     * @return bool|WP_Error
     */
    public static function validate_length( $value, $min = 0, $max = 255 ) {
        $length = strlen( $value );

        if ( $length < $min ) {
            return new WP_Error( 'min_length', sprintf(
                __( 'Minimum length is %d characters', 'leancms-plugin' ),
                $min
            ));
        }

        if ( $length > $max ) {
            return new WP_Error( 'max_length', sprintf(
                __( 'Maximum length is %d characters', 'leancms-plugin' ),
                $max
            ));
        }

        return true;
    }

    /**
     * Validate URL
     *
     * @param string $url URL to validate
     * @return bool|WP_Error
     */
    public static function validate_url( $url ) {
        if ( ! filter_var( $url, FILTER_VALIDATE_URL ) ) {
            return new WP_Error( 'invalid_url', __( 'Invalid URL', 'leancms-plugin' ) );
        }
        return true;
    }

    /**
     * Validate phone number (basic)
     *
     * @param string $phone Phone number
     * @return bool|WP_Error
     */
    public static function validate_phone( $phone ) {
        $phone = preg_replace( '/[^0-9]/', '', $phone );

        if ( strlen( $phone ) < 10 ) {
            return new WP_Error( 'invalid_phone', __( 'Invalid phone number', 'leancms-plugin' ) );
        }

        return true;
    }

    /**
     * Validate date format
     *
     * @param string $date Date string
     * @param string $format Date format
     * @return bool|WP_Error
     */
    public static function validate_date( $date, $format = 'Y-m-d' ) {
        $d = DateTime::createFromFormat( $format, $date );

        if ( ! $d || $d->format( $format ) !== $date ) {
            return new WP_Error( 'invalid_date', __( 'Invalid date format', 'leancms-plugin' ) );
        }

        return true;
    }

    /**
     * Validate numeric value
     *
     * @param mixed $value Value to validate
     * @param float $min Minimum value
     * @param float $max Maximum value
     * @return bool|WP_Error
     */
    public static function validate_numeric( $value, $min = null, $max = null ) {
        if ( ! is_numeric( $value ) ) {
            return new WP_Error( 'invalid_number', __( 'Value must be numeric', 'leancms-plugin' ) );
        }

        $value = floatval( $value );

        if ( ! is_null( $min ) && $value < $min ) {
            return new WP_Error( 'min_value', sprintf(
                __( 'Minimum value is %s', 'leancms-plugin' ),
                $min
            ));
        }

        if ( ! is_null( $max ) && $value > $max ) {
            return new WP_Error( 'max_value', sprintf(
                __( 'Maximum value is %s', 'leancms-plugin' ),
                $max
            ));
        }

        return true;
    }

    /**
     * Validate array of data against rules
     *
     * @param array $data Data to validate
     * @param array $rules Validation rules
     * @return bool|WP_Error True if valid, WP_Error with all errors
     */
    public static function validate( $data, $rules ) {
        $errors = array();

        foreach ( $rules as $field => $field_rules ) {
            $value = isset( $data[ $field ] ) ? $data[ $field ] : '';

            foreach ( $field_rules as $rule => $params ) {
                $result = null;

                switch ( $rule ) {
                    case 'required':
                        $result = self::validate_required( $value, $field );
                        break;
                    case 'email':
                        $result = self::validate_email( $value );
                        break;
                    case 'url':
                        $result = self::validate_url( $value );
                        break;
                    case 'numeric':
                        $min = isset( $params['min'] ) ? $params['min'] : null;
                        $max = isset( $params['max'] ) ? $params['max'] : null;
                        $result = self::validate_numeric( $value, $min, $max );
                        break;
                }

                if ( is_wp_error( $result ) ) {
                    $errors[ $field ] = $result->get_error_message();
                    break; // Stop validating this field on first error
                }
            }
        }

        if ( ! empty( $errors ) ) {
            return new WP_Error( 'validation_failed', __( 'Validation failed', 'leancms-plugin' ), $errors );
        }

        return true;
    }
}
```

### Sanitizer Class (`class-sanitizer.php`)

```php
<?php
/**
 * Data Sanitization
 *
 * @package    LeanCMS_Plugin
 * @subpackage Utilities
 * @filepath   includes/utilities/class-sanitizer.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

class LeanCMS_Sanitizer {

    /**
     * Sanitize text field
     *
     * @param string $value Value to sanitize
     * @return string Sanitized value
     */
    public static function text( $value ) {
        return sanitize_text_field( $value );
    }

    /**
     * Sanitize textarea
     *
     * @param string $value Value to sanitize
     * @return string Sanitized value
     */
    public static function textarea( $value ) {
        return sanitize_textarea_field( $value );
    }

    /**
     * Sanitize email
     *
     * @param string $value Email address
     * @return string Sanitized email
     */
    public static function email( $value ) {
        return sanitize_email( $value );
    }

    /**
     * Sanitize URL
     *
     * @param string $value URL
     * @return string Sanitized URL
     */
    public static function url( $value ) {
        return esc_url_raw( $value );
    }

    /**
     * Sanitize HTML
     *
     * @param string $value HTML content
     * @param array $allowed_tags Allowed HTML tags
     * @return string Sanitized HTML
     */
    public static function html( $value, $allowed_tags = null ) {
        if ( is_null( $allowed_tags ) ) {
            $allowed_tags = wp_kses_allowed_html( 'post' );
        }
        return wp_kses( $value, $allowed_tags );
    }

    /**
     * Sanitize integer
     *
     * @param mixed $value Value to sanitize
     * @return int Sanitized integer
     */
    public static function int( $value ) {
        return absint( $value );
    }

    /**
     * Sanitize float
     *
     * @param mixed $value Value to sanitize
     * @return float Sanitized float
     */
    public static function float( $value ) {
        return floatval( $value );
    }

    /**
     * Sanitize boolean
     *
     * @param mixed $value Value to sanitize
     * @return bool Boolean value
     */
    public static function bool( $value ) {
        return filter_var( $value, FILTER_VALIDATE_BOOLEAN );
    }

    /**
     * Sanitize slug
     *
     * @param string $value Value to sanitize
     * @return string Sanitized slug
     */
    public static function slug( $value ) {
        return sanitize_title( $value );
    }

    /**
     * Sanitize array
     *
     * @param array $array Array to sanitize
     * @param string $type Sanitization type
     * @return array Sanitized array
     */
    public static function array( $array, $type = 'text' ) {
        if ( ! is_array( $array ) ) {
            return array();
        }

        $sanitized = array();

        foreach ( $array as $key => $value ) {
            $key = self::text( $key );

            if ( method_exists( __CLASS__, $type ) ) {
                $value = call_user_func( array( __CLASS__, $type ), $value );
            } else {
                $value = self::text( $value );
            }

            $sanitized[ $key ] = $value;
        }

        return $sanitized;
    }
}
```

### Formatter Class (`class-formatter.php`)

```php
<?php
/**
 * Data Formatting
 *
 * @package    LeanCMS_Plugin
 * @subpackage Utilities
 * @filepath   includes/utilities/class-formatter.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

class LeanCMS_Formatter {

    /**
     * Format date
     *
     * @param string $date Date string
     * @param string $format Date format
     * @return string Formatted date
     */
    public static function date( $date, $format = null ) {
        if ( is_null( $format ) ) {
            $format = get_option( 'date_format' );
        }

        $timestamp = is_numeric( $date ) ? $date : strtotime( $date );
        return date_i18n( $format, $timestamp );
    }

    /**
     * Format time
     *
     * @param string $time Time string
     * @param string $format Time format
     * @return string Formatted time
     */
    public static function time( $time, $format = null ) {
        if ( is_null( $format ) ) {
            $format = get_option( 'time_format' );
        }

        $timestamp = is_numeric( $time ) ? $time : strtotime( $time );
        return date_i18n( $format, $timestamp );
    }

    /**
     * Format datetime
     *
     * @param string $datetime Datetime string
     * @return string Formatted datetime
     */
    public static function datetime( $datetime ) {
        $date_format = get_option( 'date_format' );
        $time_format = get_option( 'time_format' );

        $timestamp = is_numeric( $datetime ) ? $datetime : strtotime( $datetime );
        return date_i18n( $date_format . ' ' . $time_format, $timestamp );
    }

    /**
     * Format relative time (e.g., "2 hours ago")
     *
     * @param string $datetime Datetime string
     * @return string Relative time
     */
    public static function time_ago( $datetime ) {
        $timestamp = is_numeric( $datetime ) ? $datetime : strtotime( $datetime );
        return human_time_diff( $timestamp, current_time( 'timestamp' ) ) . ' ' . __( 'ago', 'leancms-plugin' );
    }

    /**
     * Format price/currency
     *
     * @param float $amount Amount
     * @param string $currency Currency code
     * @return string Formatted price
     */
    public static function price( $amount, $currency = 'USD' ) {
        $symbol = self::get_currency_symbol( $currency );
        return sprintf( '%s%s', $symbol, number_format( $amount, 2 ) );
    }

    /**
     * Get currency symbol
     *
     * @param string $currency Currency code
     * @return string Currency symbol
     */
    private static function get_currency_symbol( $currency ) {
        $symbols = array(
            'USD' => '$',
            'EUR' => '€',
            'GBP' => '£',
            'JPY' => '¥',
        );

        return isset( $symbols[ $currency ] ) ? $symbols[ $currency ] : $currency . ' ';
    }

    /**
     * Format phone number
     *
     * @param string $phone Phone number
     * @param string $format Format pattern
     * @return string Formatted phone
     */
    public static function phone( $phone, $format = '(###) ###-####' ) {
        $phone = preg_replace( '/[^0-9]/', '', $phone );

        if ( strlen( $phone ) === 10 ) {
            return sprintf( '(%s) %s-%s',
                substr( $phone, 0, 3 ),
                substr( $phone, 3, 3 ),
                substr( $phone, 6 )
            );
        }

        return $phone;
    }

    /**
     * Format file size
     *
     * @param int $bytes File size in bytes
     * @return string Formatted size
     */
    public static function file_size( $bytes ) {
        $units = array( 'B', 'KB', 'MB', 'GB', 'TB' );

        for ( $i = 0; $bytes > 1024; $i++ ) {
            $bytes /= 1024;
        }

        return round( $bytes, 2 ) . ' ' . $units[ $i ];
    }
}
```

## Required Functions

### Helpers
- [x] Get/update options
- [x] User capability checks
- [x] Meta data helpers
- [x] Random string generation
- [x] URL helpers
- [x] Redirect with messages

### Logger
- [x] Log messages at different levels
- [x] Write to log file
- [x] Clear log
- [x] Retrieve log contents
- [ ] Log rotation
- [ ] Email alerts for errors

### Validator
- [x] Validate common data types
- [x] Batch validation
- [x] Return WP_Error objects
- [ ] Custom validation rules
- [ ] Async validation

### Sanitizer
- [x] Sanitize common data types
- [x] HTML sanitization
- [x] Array sanitization
- [ ] Recursive sanitization
- [ ] Custom sanitizers

### Formatter
- [x] Date/time formatting
- [x] Currency formatting
- [x] Phone formatting
- [x] File size formatting
- [ ] Number formatting
- [ ] Address formatting

## Security Checklist

- [ ] **Always Sanitize:** Sanitize all user input
- [ ] **Always Validate:** Validate data before processing
- [ ] **Always Escape:** Escape all output
- [ ] **Use WP Functions:** Use WordPress sanitization functions
- [ ] **Never Trust Input:** Treat all input as potentially malicious
- [ ] **Log Securely:** Don't log sensitive data (passwords, tokens)

## Common Variations

### Custom Validation Rule
```php
public static function validate_custom( $value ) {
    // Your custom validation logic
    if ( ! meets_criteria( $value ) ) {
        return new WP_Error( 'custom_error', __( 'Custom error message', 'leancms-plugin' ) );
    }
    return true;
}
```

### Debug Helper
```php
if ( LeanCMS_Helpers::is_debug() ) {
    global $leancms_logger;
    $leancms_logger->debug( 'Debug message', array( 'data' => $data ) );
}
```

## Testing Checklist

- [ ] Validation catches invalid data
- [ ] Sanitization removes dangerous content
- [ ] Formatting produces correct output
- [ ] Logging writes to file when debug enabled
- [ ] Helpers return expected values
- [ ] WP_Error objects returned on failures
- [ ] No PHP warnings or notices

## Integration Points

### Main Plugin File
```php
// In leancms-plugin.php
require_once LEANCMS_PLUGIN_DIR . 'includes/utilities/class-helpers.php';
require_once LEANCMS_PLUGIN_DIR . 'includes/utilities/class-logger.php';
require_once LEANCMS_PLUGIN_DIR . 'includes/utilities/class-validator.php';
require_once LEANCMS_PLUGIN_DIR . 'includes/utilities/class-sanitizer.php';
require_once LEANCMS_PLUGIN_DIR . 'includes/utilities/class-formatter.php';
```

### Usage Examples
```php
// Validation
$result = LeanCMS_Validator::validate_email( $email );
if ( is_wp_error( $result ) ) {
    // Handle error
}

// Sanitization
$clean_data = LeanCMS_Sanitizer::text( $_POST['field'] );

// Formatting
echo LeanCMS_Formatter::date( $date );

// Logging
global $leancms_logger;
$leancms_logger->error( 'Something went wrong', array( 'user_id' => $user_id ) );

// Helpers
$value = LeanCMS_Helpers::get_option( 'key', 'default' );
```

## Placeholders to Replace

- `{field_name}` - Field name for validation messages
- `{min}` - Minimum value/length
- `{max}` - Maximum value/length
- `{format}` - Format pattern
- `{option_key}` - Option key name

## Notes

- Use static methods for utility classes (no state needed)
- Return WP_Error objects for validation failures
- Always check if WP_DEBUG is enabled before logging
- Use WordPress core functions when available
- Keep utility functions focused and single-purpose
- Document all parameters and return types
- Consider performance for frequently-called functions
- Use type hinting in PHP 7+
- Implement proper error handling
- Keep log files secure (in protected directory)
