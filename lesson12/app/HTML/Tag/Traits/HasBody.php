<?php


namespace HTML\Tag\Traits;

use HTML\Tag\TagBody;

trait HasBody
{
    protected $body;

    protected function bodyInit()
    {
        $this->setBody(new TagBody());
    }

    function setBody(TagBody $body)
    {
        $this->body = $body;
    }

    function getBody()
    {
        return $this->body;
    }

    function appendBody($value)
    {
        $this->getBody()->append($value);
        return $this;
    }

    function prependBody($value)
    {
        $this->getBody()->prepend($value);
        return $this;
    }
}