<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 7/23/17
 * Time: 9:02 AM
 */
use Illuminate\Support\Facades\Route;


/**
 * @param $element
 */
function checkTrans($element)
{
    if (strpos(trans($element), 'message.') === 0 || strpos(trans($element), 'general.') === 0) {
        return null;
    }
    return trans($element);
}

/**
 * @param $element
 * @return null|string
 */
function activeItem($element, $another = [])
{
    if (strpos(Route::currentRouteName(), $element)) {
        return 'active';
    }
    if (!empty($another)) {
        foreach ($another as $k => $value)
            if (strpos(Route::currentRouteName(), $value)) {
                return 'active';
                break;
            }
    }
    return null;
}

function activeLabel($element)
{
    return $element ? 'label-success' : 'label-danger';
}

function activeText($element)
{
    return $element ? 'Active' : 'N/A';
}