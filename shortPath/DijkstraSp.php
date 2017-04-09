<?php
//最短路径的Dijkstra算法
class DijkstraSP{
	//因为php没有一个常量表示无穷大，所以我们定义一个这样的值
	const INFINITY_NUMBER=9999999999999;
	/**
	 * 形式['p1'=>起点s到p1的最短路径,...]
	 * 
	 */
    private $_distTo; 

    /**
     * 形式['p1'=>一条有向权重边(DirectedEdge)，表示起点s到p1最短路径的最后一条边]
     * 
     */    
    private $_edgeTo;    

    //边的优先级队列(最小堆)
    private $_minPq;

    public function __construct($graph,$startPoint){
    	
        $graphTotalPointNum=$graph->totalPointNum();
        for ($i=0; $i < $graphTotalPointNum; $i++) { 
        	$this->_distTo[$i]=self::INFINITY_NUMBER;
        }

        $this->_minPq=new minPq();

    	//初始化起点，起点到起点距离为零
    	$this->_distTo[$startPoint]=0;
        $this->_edgeTo[$startPoint]=null;

    	$this->_minPq->insert($startPoint,0);
    	while(!$this->_minPq->isEmpty()){
    		//根据权重优先级依次放松
    		$nextRelaxPoint=$this->_minPq->extract();
    		$this->relax($nextRelaxPoint);
    	}
    }

	public function relax($point){
		$pointEdges=$this->_graph->pointEdge();

		foreach ($pointEdges as $_edge) {
			$_edgeWeight=$_edge->weight();
			$_edgeToPoint=$_edge->to();

            //v点经过边e到达w点；如果w原有路径大于 v点最小路径长度+e边的权重,进行放松操作
            $_edgeFromPointDist=$this->_distTo[$point];
			$_edgeToPointDist=$this->_distTo[$_edgeToPoint];

			if($_edgeToPointDist> $_edgeFromPointDist+$_edgeWeight){
				$this->_edgeTo[$_edgeToPoint]=$_edge;
				$this->_distTo[$_edgeToPoint]=$_edgeFromPointDist+$_edgeWeight;
                 
                //将w点放入优先级队列
				if($this->_minPq->isContain($_edgeToPoint)){
					$this->$_minPq[$_edgeToPoint,$this->_distTo[$_edgeToPoint]];
				}else{
					$this->$_minPq->insert($_edgeToPoint,$this->_distTo[$_edgeToPoint])
				}
			}
		}
	}
}

/**
 * 优先级队列（最小堆）
 * 
 */ 
class minPq extends \SplPriorityQueue{
	private $_allValue=[]; 

	public function compare($priority1 ,$priority2 ){
		if($priority1<$priority2){
			return 1;
		}elseif($priority1>$priority2){
			return -1;
		}else{
			return 0;
		}
	}

	public function insert ($value ,$priority ){
		$this->_allValue[]=$value;
		parent::insert($value,$priority);
	}

	public function contain($value){
		return in_array($value,$this->allValue);
	}
}