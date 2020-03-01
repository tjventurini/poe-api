<?php

namespace Tjventurini\PoeApi\Converters;

abstract class Converter
{
    abstract public static function convert(array $data);
}