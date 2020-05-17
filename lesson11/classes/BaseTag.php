<?php

//require_once 'TagName.php';
//require_once 'TagAttributes.php';
//require_once 'TagBody.php';

abstract class BaseTag implements HasAttributesInterface
{

    private $name;
    private $attributes;
    private $body;

    public function __construct(string $name)
    {
        $this->name = new TagName($name);
        $this->attributes = new TagAttributes();
        $this->body = new TagBody();
    }

    //region NAME METHODS
    public function name()
    {
        return $this->name;
    }

    function isSelfClosing()
    {
        return $this->name()->isSelfClosing();
    }
    //endregion

    //region BODY METHODS
    function getBodyString(): string
    {
        if ( $this->isSelfClosing() )
            return '';

        return $this->_body();
    }

    function _body()
    {
        return $this->body;
    }

    function appendBody($value)
    {
        $this->_body()->append($value);
        return $this;
    }

    function prependBody($value)
    {
        $this->_body()->prepend($value);
        return $this;
    }
    //endregion

    //region ATTRIBUTES METHODS
    function attributes()
    {
        return $this->attributes;
    }

    function setAttribute(string $key, $value)
    {
        $this->attributes()->$key = $value;
        return $this;
    }

    function getAttribute(string $key)
    {
        return $this->attributes()->$key ?? null;
    }

    function appendAttribute(string $key, $value)
    {
        $this->attributes()->append($key, $value);
        return $this;
    }

    function prependAttribute(string $key, $value)
    {
        $this->attributes()->prepend($key, $value);
        return $this;
    }

    function __get($name)
    {
        return $this->getAttribute($name);
    }

    function __set($name, $value)
    {
        $this->setAttribute($name, $value);
    }

    //endregion

    //region GENERATING METHODS
    function start(): string
    {
        $str = "<{$this->name()}{$this->attributes()}";

        if ( $this->isSelfClosing() )
            $str .= " /";

        return "$str>";
    }

    function end(): string
    {
        if ( $this->isSelfClosing() )
            return '';

        return "</{$this->name()}>";
    }

    function __toString(): string
    {
        return $this->start() . $this->getBodyString() . $this->end();
    }

    //endregion

    function appendTo(BaseTag $tag)
    {
        $tag->appendBody($this);
        return $this;
    }

    function prependTo(BaseTag $tag)
    {
        $tag->prependBody($this);
        return $this;
    }

}
