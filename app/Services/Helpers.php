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
    if (strpos(trans($element), 'message.') === 0 || strpos(trans($element), 'general.') === 0) {
        return null;
    }
    return trans($element);
}


/**
 * @return mixed
 */
function testing()
{
    dd('testing fun');
}