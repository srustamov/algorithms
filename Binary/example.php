<?php

require __DIR__."/Tree.php";

$tree = Binary\Tree::create();

$tree->add(40);
$tree->add(25);
$tree->add(20);
$tree->add(50);
$tree->add(45);
$tree->add(60);

print_r($tree->toArray());

