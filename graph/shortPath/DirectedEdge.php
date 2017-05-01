<?php

/**
 *加权有向边 
 */
class DirectedEdge{
	//加权有向边的起点
	private $_from;
	//加权有向边指向的点
	private $_to;
	//边的权重
	private $_weight;

	public function __construct($from,$to,$weight){
		$this->_from=$from;
		$this->_to=$to;
		$this->_weight=$weight;
	}

    //获取边的起点
	public function from(){
		return $this->_from;
	}

    //获取边指向的点
	public function to(){
		return $this->_to;
	}

    //获取边的权重
	public function weight(){
		return $this->_weight;
	}
}