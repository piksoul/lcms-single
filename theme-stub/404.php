<?php
/**
 * Theme 404 - Stub
 *
 * Delegates to the LeanCMS plugin's theme/404.php
 */

if ( defined( 'LEANCMS_PLUGIN_DIR' ) ) {
    include LEANCMS_PLUGIN_DIR . 'theme/404.php';
} else {
    echo '<h1>404 - Page Not Found</h1>';
}
