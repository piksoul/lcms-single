# WordPress Commerce Pattern

## Purpose
Comprehensive commerce functionality including pricing calculations, payment processing, subscriptions, and WooCommerce integration for cart handling, checkout customization, and order processing.

## WordPress Standards
- Follow WordPress Coding Standards
- Use WooCommerce hooks and filters properly
- **Decimal Precision:** Use `number_format()` for currency display
- **Currency Handling:** Store amounts as decimals for WooCommerce compatibility
- **Transaction Security:** Always verify payment gateway webhooks
- **PCI Compliance:** Never store credit card data directly
- **Audit Trail:** Log all transactions and status changes
- **Text Domain:** Always use plugin text domain for translations
- **File Headers:** All files must include @filepath in header comments

## File Structure

```
includes/
└── commerce/
    ├── class-commerce-manager.php       # Main orchestrator
    ├── class-cart-handler.php           # Cart operations
    ├── class-checkout-handler.php       # Checkout customization
    ├── class-order-processor.php        # Order completion handler
    ├── class-commerce-helpers.php       # Utility functions
    ├── class-pricing.php                # Pricing calculations
    ├── class-payment-gateway.php        # Payment processing (non-WC)
    └── class-subscription.php           # Subscription management
```

---

## 1. Commerce Manager (Orchestrator)

**File:** `includes/commerce/class-commerce-manager.php`

```php
<?php
/**
 * Commerce Manager
 *
 * Orchestrates all commerce functionality and WooCommerce integration.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Commerce
 * @filepath   includes/commerce/class-commerce-manager.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Commerce Manager Class
 *
 * Coordinates commerce components and WooCommerce integration.
 */
class LeanCMS_Commerce_Manager {

    /**
     * Cart handler instance.
     *
     * @var LeanCMS_Cart_Handler
     */
    private $cart_handler;

    /**
     * Checkout handler instance.
     *
     * @var LeanCMS_Checkout_Handler
     */
    private $checkout_handler;

    /**
     * Order processor instance.
     *
     * @var LeanCMS_Order_Processor
     */
    private $order_processor;

    /**
     * Initialize the class.
     */
    public function __construct() {
        add_action( 'plugins_loaded', array( $this, 'init' ) );
    }

    /**
     * Initialize commerce components.
     */
    public function init() {
        // Check if WooCommerce is active
        if ( ! $this->is_woocommerce_active() ) {
            add_action( 'admin_notices', array( $this, 'woocommerce_missing_notice' ) );
            return;
        }

        // Load dependencies
        $this->load_dependencies();

        // Initialize components
        $this->cart_handler = new LeanCMS_Cart_Handler();
        $this->checkout_handler = new LeanCMS_Checkout_Handler();
        $this->order_processor = new LeanCMS_Order_Processor();

        // Register hooks
        $this->register_hooks();
    }

    /**
     * Check if WooCommerce is active.
     *
     * @return bool
     */
    private function is_woocommerce_active() {
        return class_exists( 'WooCommerce' );
    }

    /**
     * Load commerce dependencies.
     */
    private function load_dependencies() {
        require_once LEANCMS_PLUGIN_DIR . 'includes/commerce/class-cart-handler.php';
        require_once LEANCMS_PLUGIN_DIR . 'includes/commerce/class-checkout-handler.php';
        require_once LEANCMS_PLUGIN_DIR . 'includes/commerce/class-order-processor.php';
        require_once LEANCMS_PLUGIN_DIR . 'includes/commerce/class-commerce-helpers.php';
    }

    /**
     * Register WooCommerce hooks.
     */
    private function register_hooks() {
        // Register custom hooks here if needed
    }

    /**
     * Display WooCommerce missing notice.
     */
    public function woocommerce_missing_notice() {
        ?>
        <div class="notice notice-error">
            <p>
                <?php
                echo wp_kses_post(
                    __( '<strong>LeanCMS Plugin:</strong> WooCommerce is required for commerce functionality.', 'leanos-plugin' )
                );
                ?>
            </p>
        </div>
        <?php
    }

    /**
     * Get cart handler instance.
     *
     * @return LeanCMS_Cart_Handler
     */
    public function get_cart_handler() {
        return $this->cart_handler;
    }

    /**
     * Get checkout handler instance.
     *
     * @return LeanCMS_Checkout_Handler
     */
    public function get_checkout_handler() {
        return $this->checkout_handler;
    }

    /**
     * Get order processor instance.
     *
     * @return LeanCMS_Order_Processor
     */
    public function get_order_processor() {
        return $this->order_processor;
    }
}

// Initialize
new LeanCMS_Commerce_Manager();
```

---

## 2. Cart Handler

**File:** `includes/commerce/class-cart-handler.php`

```php
<?php
/**
 * Cart Handler
 *
 * Manages WooCommerce cart operations including adding items,
 * dynamic pricing, and custom cart display.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Commerce
 * @filepath   includes/commerce/class-cart-handler.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Cart Handler Class
 *
 * Handles cart modifications and custom cart behavior.
 */
class LeanCMS_Cart_Handler {

    /**
     * URL parameter for adding items.
     *
     * @var string
     */
    private $add_param = '{plugin_prefix}_add_item';

    /**
     * Initialize the class.
     */
    public function __construct() {
        // Handle add to cart via URL
        add_action( 'template_redirect', array( $this, 'handle_add_to_cart_url' ) );

        // Modify cart item pricing
        add_filter( 'woocommerce_add_cart_item_data', array( $this, 'add_cart_item_data' ), 10, 3 );
        add_filter( 'woocommerce_get_cart_item_from_session', array( $this, 'get_cart_item_from_session' ), 10, 3 );

        // Display custom cart item data
        add_filter( 'woocommerce_cart_item_name', array( $this, 'display_cart_item_data' ), 10, 3 );
        add_filter( 'woocommerce_cart_item_price', array( $this, 'display_cart_item_price' ), 10, 3 );

        // Hide quantity selector
        add_filter( 'woocommerce_is_sold_individually', array( $this, 'force_sold_individually' ), 10, 2 );

        // Prevent duplicate items (optional)
        add_filter( 'woocommerce_add_to_cart_validation', array( $this, 'prevent_duplicate_cart_items' ), 10, 3 );
    }

    /**
     * Handle adding items via URL parameter.
     *
     * URL format: ?{plugin_prefix}_add_item={post_id}
     */
    public function handle_add_to_cart_url() {
        if ( ! isset( $_GET[ $this->add_param ] ) ) {
            return;
        }

        $item_id = absint( $_GET[ $this->add_param ] );

        if ( ! $item_id ) {
            return;
        }

        // Get item data (example: from custom post type)
        $item_data = $this->get_item_data( $item_id );

        if ( ! $item_data ) {
            wc_add_notice( __( 'Invalid item.', 'leanos-plugin' ), 'error' );
            return;
        }

        // Get or create WooCommerce product
        $product_id = $this->get_or_create_product( $item_data );

        if ( ! $product_id ) {
            wc_add_notice( __( 'Failed to add item to cart.', 'leanos-plugin' ), 'error' );
            return;
        }

        // Add to cart with custom data
        $cart_item_key = WC()->cart->add_to_cart(
            $product_id,
            1, // Quantity
            0, // Variation ID
            array(), // Variation attributes
            array(
                '{plugin_prefix}_item_id' => $item_id,
                '{plugin_prefix}_item_data' => $item_data,
                '{plugin_prefix}_price' => $item_data['total_price'],
            )
        );

        if ( $cart_item_key ) {
            wc_add_notice( __( 'Item added to cart!', 'leanos-plugin' ), 'success' );
        }

        // Redirect to cart
        wp_safe_redirect( wc_get_cart_url() );
        exit;
    }

    /**
     * Add custom data to cart item.
     *
     * @param array $cart_item_data Cart item data.
     * @param int   $product_id     Product ID.
     * @param int   $variation_id   Variation ID.
     * @return array Modified cart item data.
     */
    public function add_cart_item_data( $cart_item_data, $product_id, $variation_id ) {
        // Custom data already added via add_to_cart() call
        return $cart_item_data;
    }

    /**
     * Restore cart item data from session.
     *
     * @param array $cart_item Cart item data.
     * @param array $values    Stored values.
     * @param string $key      Cart item key.
     * @return array Modified cart item.
     */
    public function get_cart_item_from_session( $cart_item, $values, $key ) {
        if ( isset( $values['{plugin_prefix}_item_id'] ) ) {
            $cart_item['{plugin_prefix}_item_id'] = $values['{plugin_prefix}_item_id'];
            $cart_item['{plugin_prefix}_item_data'] = $values['{plugin_prefix}_item_data'];
            $cart_item['{plugin_prefix}_price'] = $values['{plugin_prefix}_price'];

            // Set custom price
            if ( isset( $cart_item['data'] ) ) {
                $cart_item['data']->set_price( $values['{plugin_prefix}_price'] );
            }
        }

        return $cart_item;
    }

    /**
     * Display custom cart item data.
     *
     * @param string $product_name Product name.
     * @param array  $cart_item    Cart item data.
     * @param string $cart_item_key Cart item key.
     * @return string Modified product name.
     */
    public function display_cart_item_data( $product_name, $cart_item, $cart_item_key ) {
        if ( ! isset( $cart_item['{plugin_prefix}_item_data'] ) ) {
            return $product_name;
        }

        $item_data = $cart_item['{plugin_prefix}_item_data'];

        // Add custom details below product name
        $details = '<div class="{plugin_prefix}-cart-details">';
        $details .= sprintf( '<p><strong>%s:</strong> %s</p>', __( 'Item Type', 'leanos-plugin' ), esc_html( $item_data['type'] ) );
        $details .= sprintf( '<p><strong>%s:</strong> %s</p>', __( 'Quantity', 'leanos-plugin' ), esc_html( $item_data['quantity'] ) );

        // Add list of sub-items if applicable
        if ( ! empty( $item_data['sub_items'] ) ) {
            $details .= '<p><strong>' . __( 'Includes:', 'leanos-plugin' ) . '</strong></p>';
            $details .= '<ul style="margin-left: 20px; list-style: disc;">';
            foreach ( $item_data['sub_items'] as $sub_item ) {
                $details .= sprintf(
                    '<li>%s (%s)</li>',
                    esc_html( $sub_item['name'] ),
                    wc_price( $sub_item['price'] )
                );
            }
            $details .= '</ul>';
        }

        $details .= '</div>';

        return $product_name . $details;
    }

    /**
     * Display custom cart item price.
     *
     * @param string $price    Price HTML.
     * @param array  $cart_item Cart item data.
     * @param string $cart_item_key Cart item key.
     * @return string Modified price HTML.
     */
    public function display_cart_item_price( $price, $cart_item, $cart_item_key ) {
        if ( isset( $cart_item['{plugin_prefix}_price'] ) ) {
            return wc_price( $cart_item['{plugin_prefix}_price'] );
        }

        return $price;
    }

    /**
     * Force items to be sold individually.
     *
     * @param bool       $sold_individually Current value.
     * @param WC_Product $product           Product object.
     * @return bool
     */
    public function force_sold_individually( $sold_individually, $product ) {
        // Force quantity = 1 for specific product types
        if ( $product->get_meta( '_{plugin_prefix}_item' ) ) {
            return true;
        }

        return $sold_individually;
    }

    /**
     * Prevent duplicate cart items.
     *
     * @param bool $passed      Validation status.
     * @param int  $product_id  Product ID.
     * @param int  $quantity    Quantity.
     * @return bool
     */
    public function prevent_duplicate_cart_items( $passed, $product_id, $quantity ) {
        foreach ( WC()->cart->get_cart() as $cart_item ) {
            if ( isset( $cart_item['{plugin_prefix}_item_id'] ) && $cart_item['product_id'] === $product_id ) {
                wc_add_notice( __( 'This item is already in your cart.', 'leanos-plugin' ), 'error' );
                return false;
            }
        }

        return $passed;
    }

    /**
     * Get item data from post ID.
     *
     * @param int $item_id Item post ID.
     * @return array|false Item data or false.
     */
    private function get_item_data( $item_id ) {
        // Example: Get data from custom post type meta
        $data = get_post_meta( $item_id, '_{plugin_prefix}_data', true );

        if ( empty( $data ) ) {
            return false;
        }

        // Calculate total price from sub-items
        $total_price = 0;
        if ( ! empty( $data['sub_items'] ) ) {
            foreach ( $data['sub_items'] as $sub_item ) {
                $total_price += floatval( $sub_item['price'] ) * intval( $sub_item['quantity'] );
            }
        }

        $data['total_price'] = $total_price;

        return $data;
    }

    /**
     * Get or create WooCommerce product for item.
     *
     * @param array $item_data Item data.
     * @return int|false Product ID or false.
     */
    private function get_or_create_product( $item_data ) {
        // Check if product already exists
        $existing_product = get_posts( array(
            'post_type'      => 'product',
            'posts_per_page' => 1,
            'meta_key'       => '_{plugin_prefix}_item_type',
            'meta_value'     => $item_data['type'],
        ) );

        if ( ! empty( $existing_product ) ) {
            return $existing_product[0]->ID;
        }

        // Create new product
        $product = new WC_Product_Simple();
        $product->set_name( $item_data['name'] ?? __( 'Item', 'leanos-plugin' ) );
        $product->set_regular_price( $item_data['total_price'] );
        $product->set_sold_individually( true );
        $product->set_virtual( true );
        $product->update_meta_data( '_{plugin_prefix}_item_type', $item_data['type'] );
        $product->update_meta_data( '_{plugin_prefix}_item', true );

        return $product->save();
    }
}
```

---

## 3. Checkout Handler

**File:** `includes/commerce/class-checkout-handler.php`

```php
<?php
/**
 * Checkout Handler
 *
 * Customizes WooCommerce checkout including pre-filling fields,
 * saving order meta, and checkout validation.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Commerce
 * @filepath   includes/commerce/class-checkout-handler.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Checkout Handler Class
 *
 * Manages checkout customizations.
 */
class LeanCMS_Checkout_Handler {

    /**
     * Initialize the class.
     */
    public function __construct() {
        // Force classic checkout (disable blocks)
        add_filter( 'woocommerce_checkout_is_vdp', '__return_false' );

        // Pre-fill checkout fields
        add_filter( 'woocommerce_checkout_get_value', array( $this, 'prefill_checkout_fields' ), 10, 2 );

        // Save custom order meta
        add_action( 'woocommerce_checkout_create_order_line_item', array( $this, 'save_order_line_item_meta' ), 10, 4 );
        add_action( 'woocommerce_checkout_update_order_meta', array( $this, 'save_order_meta' ) );

        // Hide/modify checkout fields (optional)
        add_filter( 'woocommerce_checkout_fields', array( $this, 'customize_checkout_fields' ) );

        // Validate checkout
        add_action( 'woocommerce_after_checkout_validation', array( $this, 'validate_checkout' ), 10, 2 );
    }

    /**
     * Pre-fill checkout fields from cart item data.
     *
     * @param mixed  $value Field value.
     * @param string $field Field key.
     * @return mixed Modified field value.
     */
    public function prefill_checkout_fields( $value, $field ) {
        // Get first cart item with custom data
        $cart_item = $this->get_first_custom_cart_item();

        if ( ! $cart_item || ! isset( $cart_item['{plugin_prefix}_item_data'] ) ) {
            return $value;
        }

        $item_data = $cart_item['{plugin_prefix}_item_data'];

        // Map item data to checkout fields
        $field_mapping = array(
            'billing_email'      => 'customer_email',
            'billing_first_name' => 'customer_first_name',
            'billing_last_name'  => 'customer_last_name',
            'billing_company'    => 'customer_company',
            'billing_phone'      => 'customer_phone',
        );

        if ( isset( $field_mapping[ $field ] ) && isset( $item_data[ $field_mapping[ $field ] ] ) ) {
            return $item_data[ $field_mapping[ $field ] ];
        }

        return $value;
    }

    /**
     * Save custom meta to order line item.
     *
     * @param WC_Order_Item_Product $item          Order item.
     * @param string                $cart_item_key Cart item key.
     * @param array                 $values        Cart item values.
     * @param WC_Order              $order         Order object.
     */
    public function save_order_line_item_meta( $item, $cart_item_key, $values, $order ) {
        if ( isset( $values['{plugin_prefix}_item_id'] ) ) {
            $item->add_meta_data( '_{plugin_prefix}_item_id', $values['{plugin_prefix}_item_id'], true );
            $item->add_meta_data( '_{plugin_prefix}_item_data', $values['{plugin_prefix}_item_data'], true );
        }
    }

    /**
     * Save custom meta to order.
     *
     * @param int $order_id Order ID.
     */
    public function save_order_meta( $order_id ) {
        $order = wc_get_order( $order_id );

        if ( ! $order ) {
            return;
        }

        // Save additional order meta from cart items
        foreach ( $order->get_items() as $item ) {
            $item_id = $item->get_meta( '_{plugin_prefix}_item_id' );

            if ( $item_id ) {
                $order->update_meta_data( '_{plugin_prefix}_has_custom_items', true );
                $order->save();
                break;
            }
        }
    }

    /**
     * Customize checkout fields.
     *
     * @param array $fields Checkout fields.
     * @return array Modified fields.
     */
    public function customize_checkout_fields( $fields ) {
        // Example: Hide address fields if not needed
        $cart_item = $this->get_first_custom_cart_item();

        if ( $cart_item && isset( $cart_item['{plugin_prefix}_item_data'] ) ) {
            // Hide shipping address
            unset( $fields['shipping'] );

            // Hide billing address fields (except email)
            $fields['billing']['billing_address_1']['required'] = false;
            $fields['billing']['billing_city']['required'] = false;
            $fields['billing']['billing_postcode']['required'] = false;
            $fields['billing']['billing_country']['required'] = false;
        }

        return $fields;
    }

    /**
     * Validate checkout before order creation.
     *
     * @param array    $data   Posted data.
     * @param WP_Error $errors Validation errors.
     */
    public function validate_checkout( $data, $errors ) {
        $cart_item = $this->get_first_custom_cart_item();

        if ( ! $cart_item ) {
            return;
        }

        if ( ! isset( $cart_item['{plugin_prefix}_item_id'] ) ) {
            return;
        }

        $item_id = $cart_item['{plugin_prefix}_item_id'];

        // Validate item is still active/available
        $item_status = get_post_status( $item_id );

        if ( 'publish' !== $item_status ) {
            $errors->add( 'item_not_available', __( 'This item is no longer available.', 'leanos-plugin' ) );
        }

        // Additional validation as needed
    }

    /**
     * Get first cart item with custom data.
     *
     * @return array|null Cart item or null.
     */
    private function get_first_custom_cart_item() {
        foreach ( WC()->cart->get_cart() as $cart_item ) {
            if ( isset( $cart_item['{plugin_prefix}_item_id'] ) ) {
                return $cart_item;
            }
        }

        return null;
    }
}
```

---

## 4. Order Processor

**File:** `includes/commerce/class-order-processor.php`

```php
<?php
/**
 * Order Processor
 *
 * Processes completed orders to update custom data (e.g., license expiry,
 * subscription renewal, access grants).
 *
 * @package    LeanCMS_Plugin
 * @subpackage Commerce
 * @filepath   includes/commerce/class-order-processor.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Order Processor Class
 *
 * Handles post-purchase processing.
 */
class LeanCMS_Order_Processor {

    /**
     * Initialize the class.
     */
    public function __construct() {
        // Process order on completion
        add_action( 'woocommerce_order_status_completed', array( $this, 'process_completed_order' ) );

        // Alternative: Process on payment complete
        add_action( 'woocommerce_payment_complete', array( $this, 'process_payment_complete' ) );
    }

    /**
     * Process completed order.
     *
     * @param int $order_id Order ID.
     */
    public function process_completed_order( $order_id ) {
        $order = wc_get_order( $order_id );

        if ( ! $order ) {
            return;
        }

        // Check if already processed
        if ( $order->get_meta( '_{plugin_prefix}_processed' ) ) {
            return;
        }

        // Process each order item
        foreach ( $order->get_items() as $item_id => $item ) {
            $custom_item_id = $item->get_meta( '_{plugin_prefix}_item_id' );

            if ( ! $custom_item_id ) {
                continue;
            }

            // Process the item (e.g., extend expiry date, grant access)
            $this->process_item_renewal( $custom_item_id, $order_id );
        }

        // Mark as processed
        $order->update_meta_data( '_{plugin_prefix}_processed', true );
        $order->update_meta_data( '_{plugin_prefix}_processed_date', current_time( 'mysql' ) );
        $order->save();

        // Fire action for additional processing
        do_action( '{plugin_prefix}_order_processed', $order_id );
    }

    /**
     * Process payment complete (alternative hook).
     *
     * @param int $order_id Order ID.
     */
    public function process_payment_complete( $order_id ) {
        // Can be used instead of or in addition to order_status_completed
        // Fires earlier, immediately after payment is confirmed
    }

    /**
     * Process item renewal/update.
     *
     * @param int $item_id  Item post ID.
     * @param int $order_id Order ID.
     * @return bool Success.
     */
    private function process_item_renewal( $item_id, $order_id ) {
        // Get current item data
        $item_data = get_post_meta( $item_id, '_{plugin_prefix}_data', true );

        if ( empty( $item_data ) ) {
            return false;
        }

        // Example: Extend expiry date by 12 months
        if ( isset( $item_data['main']['expiry_date'] ) ) {
            $current_expiry = $item_data['main']['expiry_date'];
            $new_expiry = $this->extend_expiry_date( $current_expiry, 12 );

            $item_data['main']['expiry_date'] = $new_expiry;
        }

        // Extend all sub-item expiry dates
        if ( ! empty( $item_data['sub_items'] ) ) {
            foreach ( $item_data['sub_items'] as &$sub_item ) {
                if ( isset( $sub_item['expiry_date'] ) ) {
                    $sub_item['expiry_date'] = $this->extend_expiry_date( $sub_item['expiry_date'], 12 );
                }
            }
        }

        // Update timestamps
        $item_data['timestamps']['modified'] = time();
        $item_data['timestamps']['server_sync'] = time();

        // Add renewal history
        if ( ! isset( $item_data['renewal_history'] ) ) {
            $item_data['renewal_history'] = array();
        }

        $item_data['renewal_history'][] = array(
            'order_id'     => $order_id,
            'renewed_date' => current_time( 'mysql' ),
            'previous_expiry' => $current_expiry ?? null,
            'new_expiry'   => $new_expiry ?? null,
        );

        // Save updated data
        update_post_meta( $item_id, '_{plugin_prefix}_data', $item_data );

        // Link order to item
        update_post_meta( $item_id, '_{plugin_prefix}_last_order_id', $order_id );

        // Fire action
        do_action( '{plugin_prefix}_item_renewed', $item_id, $order_id );

        return true;
    }

    /**
     * Extend expiry date.
     *
     * @param string $current_date Current date (Y-m-d).
     * @param int    $months       Months to add.
     * @return string New date (Y-m-d).
     */
    private function extend_expiry_date( $current_date, $months = 12 ) {
        $timestamp = strtotime( $current_date );

        // If already expired, start from today
        if ( $timestamp < time() ) {
            $timestamp = time();
        }

        $new_timestamp = strtotime( "+{$months} months", $timestamp );

        return date( 'Y-m-d', $new_timestamp );
    }

    /**
     * Calculate pro-rata refund/credit.
     *
     * @param string $old_expiry Old expiry date.
     * @param float  $old_price  Old price.
     * @param float  $new_price  New price.
     * @return float Pro-rata amount.
     */
    public function calculate_prorata( $old_expiry, $old_price, $new_price ) {
        $days_remaining = max( 0, floor( ( strtotime( $old_expiry ) - time() ) / DAY_IN_SECONDS ) );
        $total_days = 365;

        $daily_rate = $new_price / $total_days;

        return $daily_rate * $days_remaining;
    }
}
```

---

## 5. Commerce Helpers

**File:** `includes/commerce/class-commerce-helpers.php`

```php
<?php
/**
 * Commerce Helpers
 *
 * Utility functions for commerce operations.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Commerce
 * @filepath   includes/commerce/class-commerce-helpers.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Commerce Helpers Class
 *
 * Static helper methods for commerce functionality.
 */
class LeanCMS_Commerce_Helpers {

    /**
     * Calculate total from sub-items.
     *
     * @param array $sub_items Array of sub-items with price and quantity.
     * @return float Total price.
     */
    public static function calculate_subtotal( $sub_items ) {
        $total = 0;

        foreach ( $sub_items as $item ) {
            $price = isset( $item['price'] ) ? floatval( $item['price'] ) : 0;
            $quantity = isset( $item['quantity'] ) ? intval( $item['quantity'] ) : 1;

            $total += $price * $quantity;
        }

        return round( $total, 2 );
    }

    /**
     * Format price for display.
     *
     * @param float  $price    Price amount.
     * @param string $currency Currency code.
     * @return string Formatted price.
     */
    public static function format_price( $price, $currency = 'USD' ) {
        if ( function_exists( 'wc_price' ) ) {
            return wc_price( $price );
        }

        $symbol = self::get_currency_symbol( $currency );
        return $symbol . number_format( $price, 2 );
    }

    /**
     * Get currency symbol.
     *
     * @param string $currency Currency code.
     * @return string Currency symbol.
     */
    public static function get_currency_symbol( $currency = '' ) {
        if ( function_exists( 'get_woocommerce_currency_symbol' ) ) {
            return get_woocommerce_currency_symbol( $currency );
        }

        $symbols = array(
            'USD' => '$',
            'EUR' => '€',
            'GBP' => '£',
            'AUD' => 'A$',
            'JPY' => '¥',
        );

        return isset( $symbols[ $currency ] ) ? $symbols[ $currency ] : $currency . ' ';
    }

    /**
     * Generate renewal URL for item.
     *
     * @param int    $item_id  Item post ID.
     * @param string $redirect Redirect URL after adding to cart.
     * @return string Renewal URL.
     */
    public static function get_renewal_url( $item_id, $redirect = '' ) {
        $url = add_query_arg(
            array(
                '{plugin_prefix}_add_item' => $item_id,
            ),
            home_url( '/' )
        );

        if ( $redirect ) {
            $url = add_query_arg( 'redirect', urlencode( $redirect ), $url );
        }

        return $url;
    }

    /**
     * Validate item data structure.
     *
     * @param array $data Item data.
     * @return true|WP_Error True if valid, WP_Error otherwise.
     */
    public static function validate_item_data( $data ) {
        $errors = new WP_Error();

        // Check required fields
        if ( empty( $data['main'] ) ) {
            $errors->add( 'missing_main', __( 'Main item data is required.', 'leanos-plugin' ) );
        }

        // Validate price
        if ( isset( $data['main']['price'] ) && ! is_numeric( $data['main']['price'] ) ) {
            $errors->add( 'invalid_price', __( 'Price must be numeric.', 'leanos-plugin' ) );
        }

        return $errors->has_errors() ? $errors : true;
    }

    /**
     * Log commerce activity.
     *
     * @param string $message Log message.
     * @param string $level   Log level (info, warning, error).
     */
    public static function log( $message, $level = 'info' ) {
        if ( ! defined( 'WP_DEBUG' ) || ! WP_DEBUG ) {
            return;
        }

        error_log( sprintf( '[%s Commerce %s] %s', LEANCMS_VERSION, strtoupper( $level ), $message ) );
    }
}
```

---

## Security Checklist

- [ ] **PCI Compliance:** Never store credit card numbers
- [ ] **Webhook Verification:** Always verify webhook signatures
- [ ] **Secure API Keys:** Store keys in wp-config.php or encrypted in database
- [ ] **Transaction Logging:** Log all transactions for audit trail
- [ ] **User Verification:** Verify user owns item before processing
- [ ] **Input Validation:** Validate all payment amounts and data
- [ ] **HTTPS Required:** Force HTTPS for all payment pages
- [ ] **CSRF Protection:** Use nonces for payment forms
- [ ] **Price Validation:** Never trust client-side prices
- [ ] **Order Verification:** Verify order status before processing

## Common Variations

### Custom Product Creation
```php
// Virtual product with custom pricing
$product = new WC_Product_Simple();
$product->set_name( 'Item Renewal' );
$product->set_regular_price( $price );
$product->set_virtual( true );
$product->set_sold_individually( true );
$product->save();
```

### Pro-Rata Calculation
```php
$days_remaining = max( 0, floor( ( strtotime( $expiry_date ) - time() ) / DAY_IN_SECONDS ) );
$daily_rate = $annual_price / 365;
$prorata_amount = $daily_rate * $days_remaining;
```

### Conditional Field Display
```php
add_filter( 'woocommerce_checkout_fields', function( $fields ) {
    if ( has_custom_items_in_cart() ) {
        unset( $fields['shipping'] );
        $fields['billing']['billing_address_1']['required'] = false;
    }
    return $fields;
} );
```

## Testing Checklist

- [ ] Cart adds items correctly via URL
- [ ] Custom pricing displays in cart
- [ ] Checkout fields pre-fill correctly
- [ ] Order meta saves properly
- [ ] Order processing updates item data
- [ ] Expiry dates extend correctly
- [ ] Renewal history logs properly
- [ ] Pro-rata calculations are accurate
- [ ] Duplicate prevention works
- [ ] Validation catches errors
- [ ] Redirects work correctly
- [ ] WooCommerce not active handled gracefully

## Integration Points

Main plugin file:

```php
// Commerce functionality
if ( class_exists( 'WooCommerce' ) ) {
    require_once LEANCMS_PLUGIN_DIR . 'includes/commerce/class-commerce-manager.php';
}
```

## Placeholders to Replace

| Placeholder | Description | Example |
|-------------|-------------|---------|
| `{plugin_prefix}` | Plugin prefix | `leancms`, `lm` |
| `{item_id}` | Item/entity post ID | `123` |
| `{post_type}` | Custom post type slug | `license`, `subscription` |

---

**Last Updated:** 2025-10-26
**Pattern Version:** 2.0 (Enhanced with WooCommerce integration)
