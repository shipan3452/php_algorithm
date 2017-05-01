<?php

/**
* 单词树节点
*/
class Node
{
	private $_value;
	private $_next=[];

    /**
     * 
     */
	public function getVal(){
		return $this->_value;
	}

	public function getNextNode($pos){
		return $this->_next[$pos]??null;
	}

	public function setNextNode($pos,$node){
		return $this->_next[$pos]=$node;
	}

	public function setVal($value){
		$this->_value=$value;
	}
}