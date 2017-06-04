<?php
namespace BinaryTree;
/**
 * 二叉树节点对象
 */
class Node {
	private $_key;
	private $_value;
	//该节点的子节点数
	private $_sonNodeNum = 1;

	//节点的左子树节点
	private $_left;
	//节点的右子树节点
	private $_right;

	/**
	 *
	 * @param mix $key   节点键
	 * @param mix $value 节点值
	 */
	public function __construct($key, $value) {
		$this->_key = $key;
		$this->_value = $value;
	}

	/**
	 * 获取节点的键
	 * @return void
	 */
	public function getKey() {
		return $this->_key;
	}

	/**
	 * 获取节点的值
	 * @return [type] [description]
	 */
	public function getValue() {
		return $this->_value;
	}

	/**
	 * 设置节点的值
	 * @param mix $value 节点要保存的值
	 * @return void
	 */
	public function setValue($value) {
		$this->_value = $value;
	}

	/**
	 * 设置当前节点的左子节点
	 * @param BinaryTree\Node $node  节点
	 * @return void
	 */
	public function setLeftSonNode($node) {
		$this->_left = $node;
	}

	/**
	 * 获取当前节点的左子节点
	 * @return BinaryTree\Node
	 */
	public function getLeftSonNode() {
		return $this->_left;
	}

	/**
	 * 设置当前节点的右子节点
	 * @param BinaryTree\Node $node 右子节点
	 */
	public function setRightSonNode($node) {
		$this->_right = $node;
	}

	/**
	 * 当前节点的右子节点
	 * @param BinaryTree\Node
	 */
	public function getRightSonNode() {
		return $this->_right;
	}

	/**
	 * 获取当前节点的子节点数
	 * @return int
	 */
	public function size() {
		return $this->_sonNodeNum;
	}

	public function setSonNodeSize(int $size) {
		$this->_sonNodeNum = $size;
	}
}