<?php

function queryString ($Controller = '') {

    $array = [
        'san-pham' => 'product',
        'chi-tiet' => 'detail'
    ];

    return str_replace(array_keys($array), array_values($array), $Controller);
}