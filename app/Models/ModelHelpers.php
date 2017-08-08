<?php
namespace App\Models;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;

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

    function getCreatedDateAttribute()
    {
        Date::setLocale(app()->getLocale());
        return Date::parse($this->attributes['created_at'])->diffForHumans();
    }

    function getStartsAtAttribute()
    {
        Date::setLocale(app()->getLocale());
        return Date::parse($this->attributes['start_date'])->diffForHumans();
    }

    function getEndsAtAttribute()
    {
        Date::setLocale(app()->getLocale());
        return Date::parse($this->attributes['end_date'])->diffForHumans();
    }

    function getCountryNameAttribute() {
        return $this->country->name;
    }

    function getAreaNameAttribute() {
        return $this->area->name;
    }

    public function scopeAdHasMeta($q)
    {
        return $q->whereHas('meta', function ($q) {
            return $q;
        }, '>', 0);
    }

    public function scopeAdHasValidDeal($q)
    {
        return $q->whereHas('deals', function ($q) {
            return $q->where('end_date', '>', Carbon::now());
        }, '>', 0);
    }

    public function scopeAdHasValidFreeDeal($q)
    {
        return $q->whereHas('deals', function ($q) {
            return $q->where('end_date', '>', Carbon::now())->whereHas('plan', function ($q) {
                $q->where('is_paid',false);
            });
        }, '>', 0);
    }

    public function scopeAdHasValidPaidDeal($q)
    {
        return $q->whereHas('deals', function ($q) {
            return $q->where('end_date', '>', Carbon::now())->whereHas('plan', function ($q) {
                $q->where('is_paid',true);
            });
        }, '>', 0);
    }
}