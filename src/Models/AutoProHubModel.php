<?php

namespace Prasso\AutoProHub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

abstract class AutoProHubModel extends Model
{
    /**
     * The prefix for all AutoProHub tables.
     *
     * @var string
     */
    protected static $tablePrefix = 'aph_';

    /**
     * Create a new AutoProHub model instance.
     *
     * @param array $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        
        // If the child class hasn't explicitly set a table name,
        // set it based on the model name with the prefix
        if (!isset($this->table)) {
            // Get the short name of the class (without namespace)
            $reflection = new \ReflectionClass($this);
            $shortName = $reflection->getShortName();
            
            // Convert the class name to snake_case for the table name
            $tableName = static::$tablePrefix . $this->snakeCase($shortName);
            
            // Set the table name with the prefix
            $this->setTable($tableName);
        }
    }
    
    /**
     * Convert a string to snake_case.
     *
     * @param string $input
     * @return string
     */
    protected function snakeCase($input)
    {
        if (ctype_lower($input)) {
            return $input;
        }
        
        $output = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $input));
        return Str::plural($output);
    }
}
