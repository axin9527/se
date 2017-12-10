<?php
header("Content-Type:text/html;charset=utf-8");

if ($_FILES['file']['error'] >  0){
   
    switch ($_FILES['file']['error']){
        case '1':
            echo "文件过大";
            break;
        case '2':
            echo "文件超出指定大小";
            break;
        case '3':
            echo "只有部分文件被上传";
            break;
        case '4':
            echo "文件没有被上传";
            break;
        case '6':
            echo "找不到指定文件夹";
            break;
        case '7':
            echo "文件写入失败";
            break;
        default :
            echo "上传出错";
            
    }
}else{
    //小于0的可以上传
    $MAX_FILE_SIZE = 500000;
    if ($_FILES['file']['size'] > $MAX_FILE_SIZE){
        exit("文件超出指定大小！");
    }
    $allowSuffix = array(
      "jpg",
      "jpeg",
      "pjpeg",
      "gif",
      "png"
        
    );
    $myImg = explode('.', $_FILES['file']['name']);
    $myImgSuffix = array_pop($myImg);
   if (!in_array($myImgSuffix, $allowSuffix)){
       exit('文件后缀名不符');
   }
   $allowMime = array(
       "image/jpg",
       "image/jpeg",
       "image/pjpeg",
       "image/gif",
       "image/png",
   );
   if (!in_array($_FILES['file']['type'], $allowMime)) exit("文件格式不正确，请检查");
   $path = "upload/";
   $name = $_FILES['file']['name'];
   
  // $name = date("Y").date('m').date('d').date('H').date('i').date('s').rand(0,9).'.'.$myImgSuffix;
    if (is_uploaded_file($_FILES['file']['tmp_name'])) {
        if (move_uploaded_file($_FILES['file']['tmp_name'], $path.$name)){
            echo "上传成功！";
            
        }else{
            echo "上传失败";
        }
    }
}



















