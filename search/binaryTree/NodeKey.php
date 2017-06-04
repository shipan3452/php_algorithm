<?php
namespace BinaryTree;
use BinaryTree\CompareObj;

class NodeKey extends CompareObj {

	public function __construct($keyVal) {
		$this->_val = $keyVal;
	}

	public function compare(CompareObj $other) {
		return $this->getValue() <=> $other->getValue();
	}

	public function getValue() {
		return $this->_val;
	}
}