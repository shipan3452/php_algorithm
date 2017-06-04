<?php
use BinaryTree\NodeKey;
use BinaryTree\Tree;
require './CompareObj.php';
require './Node.php';
require './Tree.php';
require './NodeKey.php';

$tree = new Tree();
$k1 = new NodeKey(5);
$k2 = new NodeKey(2);
$k3 = new NodeKey(7);
$k4 = new NodeKey(1);
$k5 = new NodeKey(10);
$k6 = new NodeKey(20);

$tree->put($k1, 'a');
$tree->put($k2, 'b');
$tree->put($k3, 'c');
/*$tree->put($k4, 'c');
$tree->put($k5, 'c');
$tree->put($k6, 'c');*/

//var_dump($tree);
var_dump($tree->deleteMin(), $tree);