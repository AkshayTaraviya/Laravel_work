<?php

if (!function_exists('ucfirst')) {
    function ucfirst($str)
    {
        return strtolower(substr($str, 0, 1)) . substr($str, 1);
    }
}

