<?php
/**
* 单词查找树算法
*/
class TrieST
{
	private $_root=null;

    /**
     *查找单词$key
     * 
     */
	public function search(string $key){
		 $node=$this->_search($this->_root,$key,0);
		 if(is_null($node)){
		 	return null;
		 }
		 return $node->getVal();
	}

	private function _search($node,string $key,int $keyIndex){
		if(is_null($node)){
			return null;
		}
		if(strlen($key)==$keyIndex){
			return $node;
		}
		$nextNodePos=$key[$keyIndex];
		return $this->_search($node->getNextNode($nextNodePos),$key,++$keyIndex);
	}

    /**
     * 添加单词
     * @param string key 要添加的单词
     */
	public function put(string $key,$value){
		if(is_null($this->_root)){
			$this->_root=$this->_put($this->_root,$key,$value,0);
		}
		$this->_put($this->_root,$key,$value,0);
	}

	private function _put($node,string $key,$value,int $keyIndex){
		if(is_null($node)){
			$node=new Node();
		}
		if(strlen($key)==$keyIndex){
			$node->setVal($value);
			return $node;
		}
        
        $nextNodePos=$key[$keyIndex];
        $nextNode=$this->_put($node->getNextNode($nextNodePos),$key,$value,++$keyIndex);
		$node->setNextNode($nextNodePos,$nextNode);
		return $node;
	}

	public function keyWithPrefix(string $pre){

	}
}