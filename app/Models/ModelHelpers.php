<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 3/19/17
 * Time: 5:33 PM
 */
trait ModelHelpers
{
    /**
     * @param $table
     * @param $column
     * @return array
     * Description : Fetchs all enum values from table for specific column
     */
    public static function getEnumValues($table, $column) {
        $type = DB::select(DB::raw("SHOW COLUMNS FROM $table WHERE Field = '{$column}'"))[0]->Type ;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enum = array();
        foreach( explode(',', $matches[1]) as $value )
        {
            $v = trim( $value, "'" );
            $enum = array_add($enum, $v, $v);
        }
        return $enum;
    }

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}