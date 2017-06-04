<?php
namespace BinaryTree;
use BinaryTree\Node;

/**
 * 二叉树
 */
class Tree {
	private $_root;

	/**
	 * 给树添加节点
	 * @param  mix $key   键
	 * @param  mix $value 值
	 * @return void
	 */
	public function put($key, $value) {
		$this->_root = $this->_put($this->_root, $key, $value);
	}

	/**
	 *添加节点
	 * @param  Node $node  要添加节点的父节点
	 * @param  NodeKey $key   添加的节点的键
	 * @param  mix $value 添加节点的值
	 * @return Node
	 */
	private function _put($node, $key, $value) {
		if (is_null($node)) {
			return new Node($key, $value);
		}

		$compareRe = $key->compare($node->getKey());
		if ($compareRe < 0) {
			$node->setLeftSonNode($this->_put($node->getLeftSonNode(), $key, $value));
		} elseif ($compareRe > 0) {
			$node->setRightSonNode($this->_put($node->getRightSonNode(), $key, $value));
		} else {
			$node->setValue($value);
		}

		$_leftSonNode = $node->getLeftSonNode();
		$_rightSonNode = $node->getRightSonNode();
		$nodeSonNodeNum = ((is_null($_leftSonNode)) ? 0 : $_leftSonNode->size()) + ((is_null($_rightSonNode)) ? 0 : $_rightSonNode->size()) + (1);

		$node->setSonNodeSize($nodeSonNodeNum);
		return $node;
	}

	/**
	 * 查找
	 * @param  NodeKey $key 查找的键值
	 * @return mix
	 */
	public function search($key) {
		return $this->_search($this->_root, $key);
	}

	/**
	 * 在以node节点为根的树上查找key
	 * @param  Node $node  node节点
	 * @param  key  $key   要查找的key
	 * @return mix
	 */
	private function _search($node, $key) {
		if (is_null($node)) {
			return null;
		}

		$compareRe = $key->compare($node->getKey());
		if ($compareRe > 0) {
			return $this->_search($node->getRightSonNode(), $key);
		} elseif ($compareRe < 0) {
			return $this->_search($node->getLeftSonNode(), $key);
		} else {
			var_dump($node);
			return $node->getValue();
		}
	}

    /**
     * 查找树中的最小值
     * @return [type] [description]
     */
	public function min(){
		$minNode=$this->_min($this->_root);
		if($minNode){
			return $minNode->getKey();
		}
		return null;
	}

	private function _min($node){
		$_leftSonNode=$node->getLeftSonNode();
		if(is_null($_leftSonNode)){
			return $node;
		}

		return $this->_min($_leftSonNode)
	}

    /**
     * 删除树种最小键值节点
     *
     * 
     * @return [type] [description]
     */
	public function deleteMin() {
		return $this->_root=$this->_deleteMin($this->_root);
	}

    /**
     * 删除以node节点为根的树上的最小节点
     *
     * 如果node节点存在左子树，最小节点一定在左子树，否则就是当前节点
     * @param  [type] $node [description]
     * @return [type]       [description]
     */
	private function _deleteMin($node) {
		if (is_null($node)) {
			return null;
		}
        
        //如果没有左节点，当前节点就是最小值，删除当前节点(父节点指向右节点）
        $_leftSonNode=$node->getLeftSonNode();
		if(is_null($_leftSonNode){
			return $node->getRightSonNode();
		}
		//如果有左节点，递归查找左子树
		return $this->_deleteMin($_leftSonNode);
	}

    /**
     * 删除节点
     * @param  [type] $key [description]
     * @return [type]      [description]
     */
	public function delete($key){
		$this->_root=$this->_delete($this->_root,$key);
	}

	private function _delete($node,$key){
		if(is_null($node)){
			return null;
		}
        
        $compareRe=$key->compare($node->getKey());
        if($compareRe>0){
        	$node->setRightSonNode($this->_delete($node->getRightSonNode(),$key));
        } elseif($compareRe<0){
        	$node->setLeftSonNode($this->_delete($node->getLeftSonNode(),$key));
        }else{
        	if(is_null($node->getLeftSonNode())){
        		return $node->getRightSonNode();
        	}elseif(is_null($node->getRightSonNode())){
        		return $node->getLeftSonNode();
        	}else{
        		$tmp=$node;
        		$rightSonTreeMinNode=$this->_min($node->getRightSonNode());
                $node=$rightSonTreeMinNode;
        		$node->setLeftSonNode($tmp->getLeftSonNode());
                $node->setRightSonNode($this->_deleteMin($tmp->getRightSonNode());
        	}
        }

        //更新子节点数
        $_leftSonNode=$node->getLeftSonNode();
        $_rightSonNode=$node->getRightSonNode();
       	$nodeSonNodeNum = ((is_null($_leftSonNode)) ? 0 : $_leftSonNode->size()) + ((is_null($_rightSonNode)) ? 0 : $_rightSonNode->size()) + (1);
		$node->setSonNodeSize($nodeSonNodeNum);
        return $node;
	}
}