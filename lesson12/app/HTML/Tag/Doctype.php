<?php


namespace HTML\Tag;


class Doctype
{
    protected $doctype;

    public function __construct($doctype = null)
    {
        $this->doctype = $doctype;
    }

    function get($type = null): string
    {
        switch ($type)
        {
            case "4.01":
                $this->doctype = "HTML PUBLIC \"-//W3C//DTD HTML 4.01//EN\"\n\"http://www.w3.org/TR/html4/strict.dtd\"";
                break;
            case "4.01 Transitional":
                $this->doctype = "HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\n\"http://www.w3.org/TR/html4/loose.dtd\"";
                break;
            case "4.01 Frameset":
                $this->doctype = "HTML PUBLIC \"-//W3C//DTD HTML 4.01 Frameset//EN\"\n\"http://www.w3.org/TR/html4/frameset.dtd\"";
                break;
            case "1.0 Strict":
                $this->doctype = "html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\"\n\"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\"";
                break;
            case "1.0 Transitional":
                $this->doctype = "html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\"\n\"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"";
                break;
            case "1.0 Frameset":
                $this->doctype = "html PUBLIC \"-//W3C//DTD XHTML 1.0 Frameset//EN\"\n\"http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd\"";
                break;
            case "1.1":
                $this->doctype = "html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\"\n\"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\"";
                break;
            default:
                $this->doctype = "html";
        }
        return "<!DOCTYPE $this->doctype >";
    }

    function __toString(): string
    {
        return implode( $this->doctype );
    }
}