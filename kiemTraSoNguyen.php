<?php
/**
 * @param $value
 * @return bool
 */
 function myIsInt($value)
{
    $tmp = (int) $value;
    if ($tmp == $value) {
        return true;
    } else {
        return false;
    }
}

