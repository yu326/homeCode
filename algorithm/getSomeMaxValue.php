<?php
/**
 * Created by PhpStorm.
 * User: korey
 * Date: 2017/7/24
 * Time: 8:12
 */


/**
 *   得到一个数组中最大的n个元素
 */


try {
    execute();
} catch (Exception $e) {
    echo $e->getMessage();
}

//执行
function execute()
{
    $arr = array();
    $n = 1000000;
    $nv = 200000;

    $randArr_time_start = microtime_float();
    $randArr = getRandArr($arr, $n);
    $randArr_time_end = microtime_float();
//    print_r($randArr);

    echo "\n生成随机数发费时间：" . ($randArr_time_end - $randArr_time_start) . "秒\n";
//    $sortArr = rightSort($randArr);
//    print_r($sortArr);
    echo "<br/>";

    $getRightValue_time_start = microtime_float();
    $resArr = getSomeMaxValue($randArr, $nv);
    $getRightValue_time_end = microtime_float();
    echo "\n得到需要的集合发费时间：" . ($getRightValue_time_end - $getRightValue_time_start) . "秒\n";
//    print_r($resArr);
}


function getRandArr($arr, $n = 10)
{
    for ($i = 0; $i < $n; $i++) {
        $tmp = rand(1, 1000);
        $arr[] = $tmp;
    }
    return $arr;
}

function getSomeMaxValue($arr, $nv = 1)
{
    $resArr = array();
    $size = count($arr);
    for ($i = 0; $i < $size; $i++) {
        $maxIndex = 0;
        for ($j = 1; $j < $size - $i; $j++) {
            if ($arr[$j] > $arr[$maxIndex]) {
                $maxIndex = $j;
            }
        }
        $temp = $arr[$maxIndex];
        $arr[$maxIndex] = $arr[$size - $i - 1];
        $arr[$size - $i - 1] = $temp;
        $resArr[] = $temp;
        if (count($resArr) >= $nv) {
            return $resArr;
        }
    }


}


function rightSort($arr)
{
    $size = count($arr);
    for ($i = 0; $i < $size; $i++) {
        $maxIndex = 0;
        for ($j = 1; $j < $size - $i; $j++) {
            if ($arr[$j] > $arr[$maxIndex]) {
                $maxIndex = $j;
            }
        }
        $temp = $arr[$maxIndex];
        $arr[$maxIndex] = $arr[$size - $i - 1];
        $arr[$size - $i - 1] = $temp;
    }
    return $arr;
}

function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

?>