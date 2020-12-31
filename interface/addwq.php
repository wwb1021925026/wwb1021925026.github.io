<?php
require('./model/_connect.php');
//获取前端的参数
$master = $_REQUEST['master'];//获取当前购物车的主人
$color = $_REQUEST['color'];//颜色
$versions = $_REQUEST['versions'];
$id = $_REQUEST['id'];//商品id
$name = $_REQUEST['name'];//商品name
$img = $_REQUEST['img'];//商品img
$price = $_REQUEST['price'];//商品price
$num = $_REQUEST['num'];//商品数量
// $master = "wwbdsg666";//获取当前购物车的主人
// $color = "";//颜色
// $versions = "6+128G";
// $id = "100649643";//商品id
// $name = "荣耀(honor)荣耀30青春版6GB+128GB全网通版幻夜黑";//商品name
// $img = "https://gfs17.gomein.net.cn/T1d0K5By_v1RCvBVdK_450.jpg";//商品img
// $price = "￥999";//商品price
// $num = "1";//商品数量
$sql = "SELECT * FROM `cart` WHERE `serial`='$id' AND `master`='$master' AND `color`='$color' AND `versions`='$versions'";
    // $sql = "INSERT INTO `cart`  VALUES (null,'$id','$master','$color','$versions','$name','$img','$price','$num')";
    $res = mysqli_query($conn,$sql);
    $date = mysqli_fetch_all($res,MYSQLI_ASSOC);
    if(count($date)>0){
        $sql1 = "UPDATE `cart` SET `num`='$num' WHERE `serial`='$id' AND `master`='$master' AND `color`='$color' AND `versions`='$versions'";
        $res1 = mysqli_query($conn,$sql1);
    }else {
        $sql1 = "INSERT INTO `cart`  VALUES (null,'$id','$master','$color','$versions','$name','$img','$price','$num')";
        $res1 = mysqli_query($conn,$sql1);
    }
    mysqli_close($conn);
        if($res1){
    	echo json_encode(array("code"=>1));
    }else{
    	echo json_encode(array("code"=>0));
    }

?>