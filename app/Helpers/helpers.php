<?php

if (!function_exists('lcfirst')) {
    function lcfirst($str)
    {
        return strtolower(substr($str, 0, 1)) . substr($str, 1);
    }
}
