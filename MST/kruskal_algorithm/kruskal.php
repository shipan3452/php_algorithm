<?php
namespace MST;
use MST\edgeWeightMinPq as minPq;
use MST\edgeWeightedGraph as graph;
use UnionFind\weightedQuickUnionFind as unionFind;
/**
* 最小生成树-kruskal算法
*/
class kruskal{
	//保存最小生成树结果
	private $minTree=[];

    //所有边的优先级队列(最小堆)
    private $edgesMinPq;

    //连通性检查算法
    private $unionFindStrategy;

	function __construct(graph $graph)
	{
		$graphEdges=$graph->getAllEdges();
		$this->minPq=new minPq();
        $this->unionFindStrategy=new UnionFind($graph->getPointNum());

		foreach ($graphEdges as $_edge) {
			$this->minPq->insert($_edge);
		}

        //安装优先级遍历所有的边直至最小生成数拥有 树的顶点-1 条边
		while ( (!$this->minPq->isEmpty()) && (count($this->$minTree)<$graph->getPointNum()-1)) {
			$currentMinWeightEdge=$this->minPq->extract();
			$point1=$currentMinWeightEdge->either();
			$point2=$currentMinWeightEdge->other($point1);

			//
			if($this->unionFindStrategy->isConnected($point1,$point2)){
				continue;
			}
			$this->unionFindStrategy->union($point1,$point2);
			$this->minTree[]=$currentMinWeightEdge;
		}
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