<?php
require 'Node.php';
require 'TrieST.php';

$wordTree=new TrieST();
$wordTree->put('word',1);
$wordTree->put('book',2);
$wordTree->put('internet',3);
var_dump($wordTree->search('book'));
