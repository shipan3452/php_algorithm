<?php
/**
*合并排序算法
*/
class  MergeSort
{
	
	static public function sort(array &$arr,$low,$high){
		if($high<=$low){
			return;
		}
		$mid=$low+floor(($high-$low)/2);
	
	    //将左侧子数组排序
		self::sort($arr,$low,$mid);
		//将右侧子数组排序
		self::sort($arr,$mid+1,$high);
		//归并已排好序的左右数数字
        return self::_merge($arr,$low,$mid,$high);
	}

	static private function _merge(&$arr,$low,$mid,$high){
        $tmp=[];
		for ($i=$low; $i <=$high ; $i++) { 
			$tmp[$i]=$arr[$i];
		}

        $halfL=$low;
        $halfR=$mid+1;

        //从左右子数组中一次取出一个数，比较大小，取较小者，如此继续
        for ($k=$low; $k <=$high ; $k++) { 
            if($halfL>$mid){
			  $arr[$k]=$tmp[$halfR++];
		    }elseif($halfR>$high){
		      $arr[$k]=$tmp[$halfL++];
		    }elseif($tmp[$halfL]<$tmp[$halfR]){
		      $arr[$k]=$tmp[$halfL++];
		    }else{
		      $arr[$k]=$tmp[$halfR++];
		    }
        }
	}
}

$arr=[4,1,2,0,4,6,-1];
$low=0;
$high=count($arr)-1;
MergeSort::sort($arr,$low,$high);
var_dump($arr);