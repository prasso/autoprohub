# AutoProHub Table Prefix Convention

## Overview

All database tables created by the AutoProHub package must use the `aph_` prefix to:
- Avoid table name collisions with the main application and other packages
- Clearly identify tables that belong to the AutoProHub package
- Maintain consistency across the package

## Implementation

### Base Model Class

The package includes an abstract `AutoProHubModel` class that automatically handles table prefixing:

```php
// src/Models/AutoProHubModel.php
abstract class AutoProHubModel extends Model
{
    protected static $tablePrefix = 'aph_';
    
    // Automatically applies the prefix to table names
    // See implementation for details
}
```

### Using the Base Model

All models in the AutoProHub package should extend the `AutoProHubModel` class:

```php
namespace Prasso\AutoProHub\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class YourModel extends AutoProHubModel
{
    use HasFactory;
    
    // No need to specify $table - it will be automatically set to 'aph_your_models'
    // If you need a custom table name, you can still override it:
    // protected $table = 'aph_custom_name';
}
```

### Migrations

When creating migrations for AutoProHub tables, always use the `aph_` prefix explicitly:

```php
Schema::create('aph_your_table', function (Blueprint $table) {
    $table->id();
    // columns...
    $table->timestamps();
});
```

## Examples

- Customer model → `aph_customers` table
- Product model → `aph_products` table
- Order model → `aph_orders` table

## Benefits

- Clear separation of concerns
- Easier database management
- Prevents conflicts with other tables in the application
- Consistent naming convention
