<?php

interface HasAttributesInterface
{
    function attributes();

    function setAttribute(string $key, $value);

    function getAttribute(string $key);

    function appendAttribute(string $key, $value);

    function prependAttribute(string $key, $value);

    function __get($name);

    function __set($name, $value);
}