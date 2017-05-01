<?php
namespace UnionFind;

/**
 *动态连通性算法(加权quick_union算法) 
 * 
 */

class weightedQuickUnionFind {
	//森林拥有的所有触点,键为触点标记值,键值指向同在同一个分量的下一个触点，有点像链表
	private $id;
	//每个分量拥有的触点数，会用来决定两个树谁指向谁
	private $sz;

	private $count;

    /**
     * @param int $point 森林拥有的触点个数
     * 
     */
	public function __construct(int $pointNum){

		for ($i=0; $i <$pointNum ; $i++) { 
			//初始化，每个触点指向它自己,每个分量拥有的触点数为1
			$this->id[$i]=$i;
			$this->sz[$i]=1;
		}
		$this->count=$pointNum;
	}
	
    /**
     *point所在分量标示符 
     */
	public function find($point){
		while ($this->id[$point]!=$point) {
			$point=$this->id[$point];
		}
		return $point;
	}

    /**
     * point1 和point2是否是连通的
     * @return bool
     */
	public function isConnected($point1,$point2){
		$point1Root=$this->find($point1);
		$point2Root=$this->find($point2);
		return $point1Root==$point2Root;
	}

    /**
     * point1 和 point2之间添加一条链接
     * 
     */
	public function union($point1,$point2){
		$point1Root=$this->find($point1);
		$point2Root=$this->find($point2);
		if($point1Root==$point2Root){
			return;
		}
		if($this->sz[$point1Root]<$this->sz[$point2Root]){
			$this->id[$point1Root]=$point2Root;
			$this->sz[$point2Root]+=$this->sz[$point1Root];
		}else{
		   $this->id[$point2Root]=$point1Root;
		   $this->sz[$point1Root]+=$this->sz[$point2Root];
		}
		$this->count--;
	}

     /**
      * 森林拥有的连通分量个数
      * 
      */
	public function count(){
		return $this->count;
	}
}