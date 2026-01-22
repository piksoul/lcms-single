# WordPress Data Object Pattern

## Purpose
Design principles and patterns for structuring complex, version-controlled metadata for Custom Post Types with proper validation, timestamps, and migration strategies.

## Core Principles

### 1. **Structured Data Storage**
Store complex data as structured metadata rather than flat fields for maintainability and scalability.

### 2. **Version Control**
Always version your data structure to support future migrations and backward compatibility.

### 3. **Timestamp Everything**
Track creation and modification times for audit trails and conflict resolution.

### 4. **Validate Early, Validate Often**
Validate data on input, before save, and on retrieval to ensure data integrity.

### 5. **Single Source of Truth**
One meta key stores the entire data structure; avoid fragmenting across multiple meta keys.

### 6. **Schema Evolution**
Plan for data structure changes; make migrations smooth and non-destructive.

---

## Data Structure Design Patterns

### Pattern 1: Version-Controlled Root Structure

**Principle:** Every data object should have a version number at the root level.

```php
$data = [
    'version' => '1.0',           // REQUIRED: Schema version
    'data' => [...],               // Actual data
    'meta' => [...],               // Metadata about the data
    'timestamps' => [...]          // Tracking information
];
```

**Why:**
- Enables automatic migrations between versions
- Allows backward compatibility checks
- Documents data structure evolution

**Implementation:**
```php
function get_{entity}_data( $post_id ) {
    $data = get_post_meta( $post_id, '_{entity}_data', true );

    // Migrate if needed
    if ( isset( $data['version'] ) && version_compare( $data['version'], CURRENT_VERSION, '<' ) ) {
        $data = migrate_{entity}_data( $data );
        update_post_meta( $post_id, '_{entity}_data', $data );
    }

    return $data;
}
```

---

### Pattern 2: Nested Entity Collections

**Principle:** Group related entities in collections with consistent structure.

```php
$data = [
    'version' => '1.0',
    'main' => [
        // Primary entity data
        'id' => 'main_001',
        'status' => 'active',
        'name' => 'Main Entity'
    ],
    'children' => [
        // Collection of child entities
        [
            'id' => 'child_001',
            'parent_id' => 'main_001',
            'status' => 'active',
            'sort_order' => 1
        ],
        [
            'id' => 'child_002',
            'parent_id' => 'main_001',
            'status' => 'active',
            'sort_order' => 2
        ]
    ]
];
```

**Why:**
- Maintains parent-child relationships
- Allows bulk operations on collections
- Supports sorting and filtering

**Best Practices:**
- Always include `id` for each entity
- Include `parent_id` for relationship tracking
- Add `sort_order` for ordered collections
- Include `status` for soft deletes

---

### Pattern 3: Timestamp Tracking

**Principle:** Track all temporal events for audit and conflict resolution.

```php
$data = [
    'version' => '1.0',
    'data' => [...],
    'timestamps' => [
        'created' => 1234567890,      // Unix timestamp or ISO 8601
        'modified' => 1234567891,     // Last modification (any field)
        'server_sync' => 1234567892,  // Last server sync (if applicable)
        'viewed' => 1234567893,       // Last viewed (optional)
    ]
];
```

**Best Practices:**
- Use Unix timestamps for easy calculations
- Update `modified` on any data change
- Separate user-triggered vs system updates if needed
- Consider timezone implications

**Implementation:**
```php
function update_{entity}_data( $post_id, $new_data ) {
    $existing = get_post_meta( $post_id, '_{entity}_data', true );

    // Merge new data
    $data = array_merge( $existing, $new_data );

    // Update timestamps
    $data['timestamps']['modified'] = time();

    update_post_meta( $post_id, '_{entity}_data', $data );
}
```

---

### Pattern 4: Settings and Preferences

**Principle:** Separate settings/preferences from core data for flexibility.

```php
$data = [
    'version' => '1.0',
    'data' => [
        // Core business data
    ],
    'settings' => [
        // User preferences and configuration
        'currency' => 'USD',
        'timezone' => 'America/New_York',
        'notifications_enabled' => true,
        'display_format' => 'compact'
    ]
];
```

**Why:**
- Settings can be changed without affecting core data
- Easy to provide defaults
- Can be validated separately

---

## Validation Strategies

### Validation Layer Pattern

**Principle:** Validate at multiple layers with different purposes.

```php
class Data_Validator {

    /**
     * Input validation: User-provided data
     */
    public function validate_input( $input ) {
        $errors = new WP_Error();

        // Required fields
        if ( empty( $input['name'] ) ) {
            $errors->add( 'missing_name', 'Name is required' );
        }

        // Data types
        if ( isset( $input['count'] ) && ! is_numeric( $input['count'] ) ) {
            $errors->add( 'invalid_count', 'Count must be numeric' );
        }

        // Business rules
        if ( isset( $input['end_date'] ) && strtotime( $input['end_date'] ) < time() ) {
            $errors->add( 'invalid_date', 'End date must be in the future' );
        }

        return $errors->has_errors() ? $errors : true;
    }

    /**
     * Structure validation: Data shape and integrity
     */
    public function validate_structure( $data ) {
        // Check version exists
        if ( ! isset( $data['version'] ) ) {
            return new WP_Error( 'missing_version', 'Data version is required' );
        }

        // Check required sections
        $required = array( 'data', 'timestamps' );
        foreach ( $required as $key ) {
            if ( ! isset( $data[ $key ] ) ) {
                return new WP_Error( 'missing_section', "Required section '{$key}' is missing" );
            }
        }

        // Validate nested structures
        if ( isset( $data['children'] ) && ! is_array( $data['children'] ) ) {
            return new WP_Error( 'invalid_children', 'Children must be an array' );
        }

        return true;
    }

    /**
     * Integrity validation: Relationships and constraints
     */
    public function validate_integrity( $data ) {
        $errors = new WP_Error();

        // Check child IDs are unique
        if ( isset( $data['children'] ) ) {
            $ids = array_column( $data['children'], 'id' );
            if ( count( $ids ) !== count( array_unique( $ids ) ) ) {
                $errors->add( 'duplicate_ids', 'Child IDs must be unique' );
            }
        }

        // Check parent-child relationships
        // Check calculated totals match
        // Check date sequences

        return $errors->has_errors() ? $errors : true;
    }
}
```

---

## Migration Strategies

### Version Migration Pattern

**Principle:** Support smooth upgrades between data structure versions.

```php
class Data_Migrator {

    /**
     * Migrate data from any version to current.
     */
    public function migrate( $data, $target_version ) {
        $current_version = $data['version'] ?? '1.0';

        // Define migration path
        $migrations = array(
            '1.0' => '1.1',
            '1.1' => '2.0',
            '2.0' => '2.1',
        );

        // Apply migrations in sequence
        while ( version_compare( $current_version, $target_version, '<' ) ) {
            $next_version = $migrations[ $current_version ] ?? null;

            if ( ! $next_version ) {
                break; // No migration path
            }

            $method = 'migrate_' . str_replace( '.', '_', $current_version ) . '_to_' . str_replace( '.', '_', $next_version );

            if ( method_exists( $this, $method ) ) {
                $data = $this->$method( $data );
                $data['version'] = $next_version;
            }

            $current_version = $next_version;
        }

        return $data;
    }

    /**
     * Example: Migrate from 1.0 to 1.1
     */
    private function migrate_1_0_to_1_1( $data ) {
        // Add new field with default
        if ( ! isset( $data['settings'] ) ) {
            $data['settings'] = array();
        }

        // Rename old field
        if ( isset( $data['old_field'] ) ) {
            $data['new_field'] = $data['old_field'];
            unset( $data['old_field'] );
        }

        // Transform data structure
        if ( isset( $data['items'] ) ) {
            foreach ( $data['items'] as &$item ) {
                $item['new_property'] = 'default_value';
            }
        }

        return $data;
    }

    /**
     * Example: Migrate from 1.1 to 2.0 (breaking change)
     */
    private function migrate_1_1_to_2_0( $data ) {
        // Restructure completely
        $new_data = array(
            'version' => '2.0',
            'main' => $data['data'],
            'children' => array(),
            'settings' => $data['settings'],
            'timestamps' => $data['timestamps'],
        );

        // Move items to children
        if ( isset( $data['items'] ) ) {
            foreach ( $data['items'] as $item ) {
                $new_data['children'][] = array(
                    'id' => $item['id'],
                    'data' => $item,
                );
            }
        }

        return $new_data;
    }
}
```

---

## Get/Set/Update Patterns

### Standardized Data Access

**Principle:** Provide consistent interface for data operations.

```php
class Entity_Data_Manager {

    /**
     * Get entity data with validation.
     */
    public function get( $post_id ) {
        $data = get_post_meta( $post_id, '_{entity}_data', true );

        // Return default structure if empty
        if ( empty( $data ) ) {
            return $this->get_default_structure();
        }

        // Validate structure
        $validation = $this->validator->validate_structure( $data );
        if ( is_wp_error( $validation ) ) {
            // Log error, return default
            return $this->get_default_structure();
        }

        // Migrate if needed
        if ( version_compare( $data['version'], CURRENT_VERSION, '<' ) ) {
            $data = $this->migrator->migrate( $data, CURRENT_VERSION );
            $this->update( $post_id, $data );
        }

        return $data;
    }

    /**
     * Set entire data structure.
     */
    public function set( $post_id, $data ) {
        // Validate
        $validation = $this->validator->validate_input( $data );
        if ( is_wp_error( $validation ) ) {
            return $validation;
        }

        // Add timestamps
        $data['timestamps'] = array(
            'created' => time(),
            'modified' => time(),
        );

        // Set version
        $data['version'] = CURRENT_VERSION;

        // Save
        update_post_meta( $post_id, '_{entity}_data', $data );

        return true;
    }

    /**
     * Update specific fields.
     */
    public function update( $post_id, $updates ) {
        $data = $this->get( $post_id );

        // Deep merge
        $data = $this->array_merge_recursive_distinct( $data, $updates );

        // Update timestamp
        $data['timestamps']['modified'] = time();

        // Save
        update_post_meta( $post_id, '_{entity}_data', $data );

        return true;
    }

    /**
     * Update specific nested field.
     */
    public function update_field( $post_id, $path, $value ) {
        $data = $this->get( $post_id );

        // Set nested value using dot notation
        $this->array_set( $data, $path, $value );

        // Update timestamp
        $data['timestamps']['modified'] = time();

        update_post_meta( $post_id, '_{entity}_data', $data );

        return true;
    }

    /**
     * Get specific nested field.
     */
    public function get_field( $post_id, $path, $default = null ) {
        $data = $this->get( $post_id );

        return $this->array_get( $data, $path, $default );
    }

    /**
     * Get default data structure.
     */
    private function get_default_structure() {
        return array(
            'version' => CURRENT_VERSION,
            'data' => array(),
            'settings' => array(),
            'timestamps' => array(
                'created' => time(),
                'modified' => time(),
            ),
        );
    }

    /**
     * Deep merge arrays (recursively).
     */
    private function array_merge_recursive_distinct( $array1, $array2 ) {
        $merged = $array1;

        foreach ( $array2 as $key => $value ) {
            if ( is_array( $value ) && isset( $merged[ $key ] ) && is_array( $merged[ $key ] ) ) {
                $merged[ $key ] = $this->array_merge_recursive_distinct( $merged[ $key ], $value );
            } else {
                $merged[ $key ] = $value;
            }
        }

        return $merged;
    }

    /**
     * Set nested array value using dot notation.
     */
    private function array_set( &$array, $path, $value ) {
        $keys = explode( '.', $path );
        $current = &$array;

        foreach ( $keys as $key ) {
            if ( ! isset( $current[ $key ] ) ) {
                $current[ $key ] = array();
            }
            $current = &$current[ $key ];
        }

        $current = $value;
    }

    /**
     * Get nested array value using dot notation.
     */
    private function array_get( $array, $path, $default = null ) {
        $keys = explode( '.', $path );
        $current = $array;

        foreach ( $keys as $key ) {
            if ( ! isset( $current[ $key ] ) ) {
                return $default;
            }
            $current = $current[ $key ];
        }

        return $current;
    }
}
```

**Usage:**
```php
$manager = new Entity_Data_Manager();

// Get entire structure
$data = $manager->get( $post_id );

// Update nested field
$manager->update_field( $post_id, 'settings.currency', 'EUR' );

// Get nested field
$currency = $manager->get_field( $post_id, 'settings.currency', 'USD' );

// Update multiple fields
$manager->update( $post_id, array(
    'settings' => array(
        'timezone' => 'UTC',
        'notifications_enabled' => true,
    ),
) );
```

---

## JSON Schema Validation (Advanced)

**Principle:** Define and validate against a formal schema.

```php
class Schema_Validator {

    /**
     * Get schema for version.
     */
    private function get_schema( $version ) {
        $schemas = array(
            '1.0' => array(
                'type' => 'object',
                'required' => array( 'version', 'data', 'timestamps' ),
                'properties' => array(
                    'version' => array( 'type' => 'string' ),
                    'data' => array(
                        'type' => 'object',
                        'properties' => array(
                            'name' => array( 'type' => 'string' ),
                            'status' => array(
                                'type' => 'string',
                                'enum' => array( 'active', 'inactive', 'pending' ),
                            ),
                        ),
                    ),
                    'timestamps' => array(
                        'type' => 'object',
                        'properties' => array(
                            'created' => array( 'type' => 'integer' ),
                            'modified' => array( 'type' => 'integer' ),
                        ),
                    ),
                ),
            ),
        );

        return $schemas[ $version ] ?? null;
    }

    /**
     * Validate against schema.
     */
    public function validate( $data, $version ) {
        $schema = $this->get_schema( $version );

        if ( ! $schema ) {
            return new WP_Error( 'no_schema', 'No schema found for version' );
        }

        // Use JSON Schema validator library or custom validation
        return $this->validate_against_schema( $data, $schema );
    }
}
```

---

## Best Practices Summary

### DO ✅
- **Always version your data structure**
- **Validate on input, save, and retrieval**
- **Track timestamps for all changes**
- **Provide default values for all fields**
- **Support backward compatibility**
- **Document your data structure**
- **Use consistent field naming (snake_case)**
- **Plan for future migrations**
- **Keep data structure flat when possible**
- **Use dot notation for nested access**

### DON'T ❌
- **Don't fragment data across multiple meta keys**
- **Don't skip validation steps**
- **Don't assume data structure is always valid**
- **Don't hardcode version numbers in multiple places**
- **Don't lose historical data during migrations**
- **Don't use deeply nested structures (>3 levels)**
- **Don't mix data types inconsistently**
- **Don't skip timestamp updates**

---

## File Structure

```php
includes/
└── data/
    ├── class-data-manager.php          # Main data access layer
    ├── class-data-validator.php        # Validation logic
    ├── class-data-migrator.php         # Version migrations
    └── schemas/
        ├── schema-v1.0.php             # Version 1.0 schema
        └── schema-v2.0.php             # Version 2.0 schema
```

---

## Integration Example

```php
// In main plugin file
define( 'ENTITY_DATA_VERSION', '2.0' );

// Initialize
$data_manager = new Entity_Data_Manager();
$data_manager->set_validator( new Data_Validator() );
$data_manager->set_migrator( new Data_Migrator() );

// Save hook
add_action( 'save_post_license', function( $post_id ) use ( $data_manager ) {
    if ( isset( $_POST['entity_data'] ) ) {
        $input = json_decode( stripslashes( $_POST['entity_data'] ), true );

        $validation = $data_manager->validator->validate_input( $input );
        if ( is_wp_error( $validation ) ) {
            // Show errors
            return;
        }

        $data_manager->update( $post_id, $input );
    }
} );
```

---

## Testing Checklist

- [ ] Default structure is valid
- [ ] Validation catches invalid input
- [ ] Timestamps update correctly
- [ ] Migrations work between all versions
- [ ] Nested field access works (get/set)
- [ ] Data persists correctly
- [ ] Invalid data doesn't save
- [ ] Version numbers track correctly
- [ ] Backward compatibility maintained
- [ ] Performance acceptable with large datasets

---

**Last Updated:** 2025-10-26
**Pattern Version:** 1.0
