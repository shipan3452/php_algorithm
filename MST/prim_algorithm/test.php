<?php
require 'edge.php';
require 'edgeWeightMinPq.php';
require 'edgeWeightedGraph.php';
require 'primMst.php';

use MST\edgeWeightedGraph as graph;
use MST\edge as edge;
use MST\edgeWeightMinPq as minPq;
use MST\primMst;

$testEdge=[
[4,5,0.35],
[4,7,0.37],
[5,7,0.28],
[0,7,0.16],
[1,5,0.32],
[0,4,0.38],
[2,3,0.17],
[1,7,0.19],
[0,2,0.26],
[1,2,0.36],
[1,3,0.29],
[2,7,0.34],
[6,2,0.40],
[3,6,0.52],
[6,0,0.58],
[6,4,0.93],
];

$graph =new graph(8);
$q=new minPq();
foreach ($testEdge as $_edgeInfo) {
	$_edge=new edge($_edgeInfo[0],$_edgeInfo[1],$_edgeInfo[2]);


	$graph->addEdge($_edge);
}


$primArigh=new primMst($graph);
$primArigh->showPath();
