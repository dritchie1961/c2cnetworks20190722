<?php

// .... GOLD .... last version of working code
// .... loadimage doesn't work, just uploadimage


@session_start();
$idd = session_id();
$dir = "files/";


//echo '<script>alert("111")</script>';


// this part is for loading image into item
if (@$_REQUEST["action"] == "loadImage") {

    
//   echo '<script>alert("action is loadImage")</script>';
    
    
    
 //default value .... or I can take value from 1.php...

 //   $i = md5("i3.jpg");    
    $k = @$_REQUEST["itemValue"];
    
//    $k = md5($k);
    
    if (file_exists($dir . $k) & ($k <> null)) {
        $i = $dir . $k;
   //     $i = $dir . $i;
    };  
    
    // output image
    header("Content-Type: image/jpg");
    print_r(file_get_contents($i));
    die();
}

if (@$_REQUEST["action"] == "uploadImage") {

  //  echo '<script>alert("action is uploadImage")</script>';
   
    
    $fnt = $_FILES["file"]["tmp_name"];
    $fn = $_FILES["file"]["name"];
    $fne = $_FILES['file']['error'];
    $fnx = substr($fn, strpos($fn, '.'), strlen($fn) - 1); // Get the extension from the filename.
    
    
    $fn = md5($fn) . $fnx;
    
    @unlink($dir.$fn.$fnx);
    move_uploaded_file($fnt, $dir . $fn);
    
    header("Content-Type: text/html; charset=utf-8");
    print_r(json_encode(array(
        "state" => true,
        "itemId" => @$_REQUEST["itemId"],
        "itemValue" => $fn,
        "extra" => $fn
    )));
    
}

?>