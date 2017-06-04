<?php
namespace BinaryTree;
/**
 * 可比较对象基类
 *
 */
abstract class CompareObj {
	public function __construct() {

	}
	abstract public function compare(CompareObj $other);
}