<?php
namespace BinaryTree;
class Node{
	private $_key;
	private $_value;
	//该节点的子节点数
	private $_sonNodeNum;

    //节点的左子树节点
	private $_left;
	//节点的右子树节点
	private $_right;

	public function __construct($key,$value){
		$this->_key=$key;
		$this->_value=$value
	}

	public function setLeftSonNode($node){
		$this->_left=$node;
	}

	public function getLeftSonNode(){
		return $this->_left;
	}

	public function setRightSonNode($node){
		$this->_right=$node;
	}

	public function getRightSonNode(){
		return $this->_right;
	}

	public function getSonNodeNum(){
		return $this->_sonNodeNum;
	}

	public function setValue($value){
		$this->_value=$value;
	}
}