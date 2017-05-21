<?php
/**
* 快速排序算法
*/
class QuickSort
{
	static public function sort(&$arr,$low,$high){
		if($high<=$low){
			return;
		}
		//打乱数组略
		
		$cutPos=self::_cut($arr,$low,$high);
		self::sort($arr,$low,$cutPos-1);
		self::sort($arr,$cutPos+1,$high);
	}

	static private function _cut(&$arr,$low,$high){
		//切分位置，默认选第一个元素
		$cutPos=$low;
		$cutVal=$arr[$cutPos];
        
                //从左向右依次找出大于切分元素的指针；
		$i=$low;
		//从右向左依次找出小于切分元素的指针；(最高位加一，是为下面--j操作时，实际从high位来收)
		$j=$high+1;

		while (true) {
			//从左到右，直到找到一个大于切分元素的值
			while ($arr[++$i]<=$cutVal) {
				if($i==$high){
					break;
				}
			}
			//从右到左，直到找到一个小于切分元素的值
			while ($arr[--$j]>=$cutVal) {
				if($j==$low){
					break;
				}
			}

			if($i>=$j){
		               break;
			}

			self::_each($arr,$i,$j);
		}
		//将切分元素放在正确的位置
		self::_each($arr,$low,$j);
		return $j;
	}

    /**
     * 互相交换数组两个指定元素的位置
     * @param  [type] &$arr 
     * @param  [type] $i    元素1的索引位置
     * @param  [type] $j    元素2的索引位置
     * @return [type]       [description]
     */
	static private function _each(&$arr,$i,$j){
		$tmp=$arr[$i];
		$arr[$i]=$arr[$j];
		$arr[$j]=$tmp;
	}
}

$arr=[4,1,2,0,6,-1];
$low=0;
$high=count($arr)-1;
QuickSort::sort($arr,$low,$high);
var_dump($arr);
