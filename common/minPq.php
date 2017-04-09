<?php
namespace common

class minPq extends \SplMinHeap{

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