<?php
namespace MST;
/**
 * 边权重的优先级队列；主要用来获取最小权重横切边
 * 
 */
class edgeWeightMinPq extends \SplMinHeap{

	protected function compare(edge $edge1,edge $edge2){
		$edge1Weight=$edge1->weight();
		$edge2Weight=$edge2->weight();
		if($edge1Weight>$edge2Weight){
			return -1;
		}elseif($edge1Weight<$edge2Weight){
			return 1;
		}else{
			return 0;
		}
	}
}
/*require 'edge.php';

$edge1=new edge(4,5,0.35);
$edge2=new edge(5,7,0.28);

$minPq=new edgeWeightMinPq();
$minPq->insert($edge1);
$minPq->insert($edge2);
var_dump($minPq->top());*/