<?php
require_once 'weightedQuickUnionFind.php';
use UnionFind\weightedQuickUnionFind as unionFind;
$u=new unionFind(10);

$isConnect=[
[4,3],
[3,8],
[6,5],
[9,4],
[2,1],
[8,9],
[5,0],
[7,2],
[6,1],
[1,0],
[6,7],
];

foreach ($isConnect as $_oneItem) {
	$u->union($_oneItem[0],$_oneItem[1]);
}
var_dump($u->isConnected(4,9));
var_dump($u->isConnected(0,7));