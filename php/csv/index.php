<?php
/**
 * author: talent4636@gmail.com
 *   date: 2016/8/11 17:40
 */
$start = time();
$filePath = './data/areas.csv';

$file = fopen($filePath,'r');
$id = 110100;
while ($data = fgetcsv($file)) {
    if($id<110400 && $id>110100){
        $areaArr[] = array(
            'id'=>$id,
            'old_id'=>$data[0],
            'value'=>$data[1],
            'old_parentId'=>$data[2],
            'parentId'=>'',
            'children'=>null,
        );
        //[id,areaname,parentid,shortname,lng,lat,level,position,sort]
        /*Array(
            [0] => id
            [1] => areaname
            [2] => parentid
            [3] => shortname
            [4] => lng
            [5] => lat
            [6] => level
            [7] => position
            [8] => sort
        )*/
        //target  [id,value,parentId]
    }
    $id++;
}

$tmp_arr_1 = array();
foreach($areaArr as $k=>$area){
    if($area['old_parentId'] == 0){
        $tmp_arr_1[$k] = array(
            'level'=>1,
            'id'=>$area['old_id'],
            'value'=>$area['value'],
            'parentid'=>$area['id'],
            'children'=>array(),
        );
    }else{
        $tmp_arr_1[$area['old_parentId']]['children'] = array(
            $k=>array(
                'level'=>2,
                'id'=>$area['old_id'],
                'value'=>$area['value'],
                'parentid'=>$area['id'],
                'children'=>array(),
            )
        );//把所有的父类ID放一起去
    }
}

$tmp_arr_2 = array();
foreach($tmp_arr_1 as $k=>$v){
    if(isset($v['id'])){
        $tmp_arr_2[$k]['children'] = $tmp_arr_1[$v['id']];
        unset($tmp_arr_1[$v['id']]);
    }
}


//$tmp_arr_1 = array();
//foreach($areaArr as $area){
//    $tmp_arr_1[$area['old_parentId']][]=$area['old_id'];//把所有的父类ID放一起去
//    //TODO
//}

header("Content-type: text/html; charset=gbk");
$end = time();
$time = $end-$start;
echo "<pre>";
print_r($tmp_arr_2);exit;
exit(count($areaArr)."， 用时：{$time}");
fclose($file);