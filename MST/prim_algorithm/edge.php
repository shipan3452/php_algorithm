<?php 
namespace MST;

/**
 * 加权图的边
 * 
 */

class edge{
	private $point1;
	private $point2;
	private $weight;

	public function __construct($point1,$point2,$weight){
		$this->point1=$point1;
		$this->point2=$point2;
		$this->weight=$weight;
	}

   //获取边的一个顶点
	public function either(){
		return $this->point1;
	}

	//获取另一个顶点
	public function other(int $point){
		if($this->point1==$point){
			return $this->point2;
		}elseif($this->point2==$point){
			return $this->point1;
		}else{
			throw new \Exception("获取另一个顶点参数非法！");
		}
	}

    /**
     * 获取边的权重
     * 
     */
	public function weight(){
		return $this->weight;
	}
}