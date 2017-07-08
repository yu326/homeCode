<?php
/**
 * Created by PhpStorm.
 * User: korey
 * Date: 2017/7/8
 * Time: 17:07
 */


try {
    $arr = array();
    $res = null;
    $arr = array(1, -1, 98, 6, 41, 32, 75, 235, 999, 661);
    if (count($arr) == 0) {
        throw new Exception("the RunTimeError: the array is empty");
    }
    $res = testMaoPao($arr);
    $res1 = testSelect($arr);
    $res2 = testInsert($arr);
    echo "the res is: ";
    var_export($res);
    echo "<br/>";
    echo "the res1 is: ";
    var_export($res1);
    echo "<br/>";
    echo "the res2 is: ";
    var_export($res2);
} catch (Exception $exception) {
    echo $exception->getMessage();
}


/**
 *  冒泡排序
 *
 * @param $arr 待排序的数组
 * @return array   排序过的数组
 */
function testMaoPao($arr)
{
    $size = count($arr);
    //  循环数组，比较前后两数的值，然后移位，大的放在后面。
    //  第一层限定循环次数，相较于size-1，是因为，我们是比较当前下标和当前下标+1的值，所以只需要比较$size -1次就好了
    //  第二层循环也依赖于第一层的$i,因为每一次循环都为会有一个最大的值，放到数组尾部，所以下次循环，无需在比较。
    for ($i = 0; $i < $size - 1; $i++) {    //   size =5    $i maxValue = 3          0   5
        for ($j = 0; $j < $size - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                $temp = $arr[$j + 1];
                $arr[$j + 1] = $arr[$j];
                $arr[$j] = $temp;
            }
        }
    }
    return $arr;
}

/**
 * 选择排序
 *
 * @param $arr    待排序的数组
 * @return mixed 排序后的数组
 */
function testSelect($arr)
{
    $size = count($arr);
    //第一层确定循环层数。
    //每一次循环，拿到最大的数的下标，并把这个下标值，和最大下标值互换，每次循环，最后的数都是最大的
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

/**
 *  插入排序
 *
 * @param $arr    待排序的数组
 * @return mixed  排序后的数组
 */
function testInsert($arr)
{
    $size = count($arr);
    // 第一层确认循环层数
    // 每次都把当前数和前面的数作比较，符合条件的交换值，维持一个有序集合。
    for ($i = 1; $i < $size; $i++) {
        for ($j = $i; $j > 0; $j--) {
            if ($arr[$j] < $arr[$j - 1]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j - 1];
                $arr[$j - 1] = $temp;
            }
        }
    }
    return $arr;
}









