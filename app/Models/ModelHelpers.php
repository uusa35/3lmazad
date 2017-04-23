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
    public function withHas($relation)
    {
        return $this->has($relation)->with($relation);
    }

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
}