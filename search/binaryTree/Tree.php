<?php
namespace BinaryTree;
class Tree{
    private $_root;

    /**
     * 插入节点
     * @param  [type] $key   [description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
	public function put($key,$value)
	{
		$root=$this->_put($this->_root,$key,$value);
	}

	private function _put($node,$key,$value){
		if(is_null($node)){
			return new Node($key,$value);
		}

		$compareRe=$key->compare($node->getKey())
		if($compareRe<0){
			$node->setLeftSonNode($this->_put($key,$value));
		}elseif($compareRe>0){
			$node->setRightSonNode($this->_put($key,$value));
		}else{
			$node->setValue($value)
		}

        $nodeSonNodeNum=$node->getLeftSonNode()->size()+$node->getRightSonNode()->size()+1;
		$node->setSonNodeNum=($nodeSonNodeNum)
		return $node;
	}
	

	public function search($key){
		$this->_serach($this->_root,$key);
	}

	private function _search($node,$key){

	}
}