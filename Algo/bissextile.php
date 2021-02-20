<?php

function is_leap_year(int $year): bool {
    if (($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0) {
        return true;
    }
    return false;
}


var_dump(is_leap_year(2020));
var_dump(is_leap_year(2021));
var_dump(is_leap_year(2505));
var_dump(is_leap_year(2024));
var_dump(is_leap_year(2028));