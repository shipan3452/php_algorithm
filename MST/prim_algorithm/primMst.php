<?php
namespace MST;

use MST\edgeWeightedGraph as graph;
use MST\edge as edge;
use MST\edgeWeightMinPq as minPq;

/**
* 最小生成树的prim算法实现
*/
class primMst
{
	private $mark;
	private $edgeMinPq;
	private $minTree=[];
	function __construct(graph $graph)
	{
		$this->edgeMinPq=new minPq();
		//随机选个顶点开始，
		$this->visit($graph,0);
		while (!$this->edgeMinPq->isEmpty()) {
			//最小权重横切边
			$minWeightEdge=$this->edgeMinPq->extract();
			$edgePoint1=$minWeightEdge->either();
			$edgePoint2=$minWeightEdge->other($edgePoint1);
			if($this->_pointIsMark($edgePoint1)&&$this->_pointIsMark($edgePoint2)){
				continue;
			}
			$this->minTree[]=$minWeightEdge;
			if($this->_pointIsMark($edgePoint1)){
				$this->visit($graph,$edgePoint2);
			}
			if($this->_pointIsMark($edgePoint2)){
				$this->visit($graph,$edgePoint1);
			}
		}
	}

	function visit(graph $graph,$point){
		$this->mark[$point]=true;
		$edges=$graph->pointConnectEdge($point);
		foreach ($edges as $_edge) {
			//如果是横切边(边的另一个顶点未被标记过)，就添加横切边优先级队列待选
			if(!$this->_pointIsMark($_edge->other($point))){
			   $this->edgeMinPq->insert($_edge);
			}
		}
	}


    /**
     *顶点是否被标记过 
     */
	private function _pointIsMark($point){
		return $this->mark[$point]??false;
	}

	public function showPath(){
		$path='';
		foreach ($this->minTree as $edge) {
			$p1=$edge->either();
			$p2=$edge->other($p1);
			$path.=$p1.'-->'.$p2."\r\n";
		}
		echo $path;
	}
}