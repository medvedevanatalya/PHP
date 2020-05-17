<?php

use HTML\Tag;
use HTML\Tag\Doctype;


include_once "autoload.php";

$doctype = new Doctype();
echo $doctype->get();
