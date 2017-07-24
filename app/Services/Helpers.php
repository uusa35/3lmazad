<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 7/23/17
 * Time: 9:02 AM
 */


/**
 * @param $element
 */
function checkTrans($element)
{
    if (strpos(trans($element), 'message.') || strpos(trans($element), 'general.')) {
        return trans($element);
    }
    return null;
}


/**
 * @return mixed
 */
function testing()
{
    dd('testing fun');
}