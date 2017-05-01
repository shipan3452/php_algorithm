<?php

/**
 * 加权有向图
 * 
 */
class EdgeWeightedDigraph{
	
	private $_totalPointNum;

	private $_totalEdgeNum;

    //图的数据结构表示，临接表 [顶点1=>[和顶点1相连接的边1，和顶点1相连的边2]...]
	private $_obj;


    /** 
     *
     *构造的图拥有的顶点数
     * (其实也可以初始化时不传，通过添加边时候来统计) 
     */
	public function __construct(int $totalPointNum){
		$this->_totalPointNum=$totalPointNum;
		$this->_totalEdgeNum=0;
		$this->_obj=[];
	}

    //图的总顶点数
	public function totalPointNum(){
		return $this->_totalPointNum;
	}

    //图的总边数
	public function totalEdgeNum(){
		return $this->_totalEdgeNum;
	}

   /**
    * 给图添加一条加权有向边
    * 
    */
	public function addEdge(DirectedEdge $e){
		$edgeFromPoint=$e->from();
		$this->_obj[$edgeFromPoint][]=$e;
		$this->_totalEdgeNum++;
	}

    //从点$point指出的边
	public function pointEdge($point){
		return $this->_obj[$point];
	}

    //获取图所有的边
	public function allEdge(){
        $edges=[];
		for ($i=0; $i < $this->_totalPointNum; $i++) { 
			foreach ($this->pointEdge($i) as $_edge) {
				$edges[]=$_edge;
			}
		}
		return $edges;
	}
}