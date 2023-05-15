<?php
/**
 * @param $price
 * @return string
 */
function priceFormat($price){
    return number_format((float)$price, 2, '.', '');
}

/**
 * @param $date
 * @return false|string
 */
function CustomDateFormat($date){
    return date('m/d/Y', strtotime($date));
}
