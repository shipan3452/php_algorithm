<?php
namespace MST;

/**
* 加权无向图
*/
class edgeWeightedGraph
{
    //图的总顶点数
	private $totalPointNum;
	
	//图的总边数
	private $totalEdgeNum;
    
    //图的数据结构表示，临接表 [顶点1=>[和顶点1相连接的边1，和顶点1相连的边2]...]
	private $obj;

	function __construct(int $totalPointNum)
	{
		$this->totalPointNum=$totalPointNum;
		for($i=0;$i<$this->totalPointNum;$i++){
			$this->obj[$i]=[];
		}
	}

    /**
     *给图添加一条边
     *  
     */
	function addEdge(\MST\edge $edge){
		$edgePoint1=$edge->either();
		$edgePoint2=$edge->other($edgePoint1);
		$this->obj[$edgePoint1][]=$edge;
		$this->obj[$edgePoint2][]=$edge;
		$this->totalEdgeNum++;
	}

    /**
     * 获取图的所有边
     * 
     */
	function getAllEdges(){
		$edges=[];
		foreach ($this->obj as $_pointConnectEdge) {
		    $edges=array_merge($edges,$_pointConnectEdge);
		}
		return $edges;
	}

    /**
     *获取树的顶点个数 
     * 
     */
	function getPointNum(){
		return $this->totalPointNum;
	}

    /**
     *获取和顶点相连的边 
     * 
     */
	function pointConnectEdge($point){
		return $this->obj[$point];
	}
}