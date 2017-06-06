<?php
  function unistr_to_xnstr($str){
      return preg_replace('/\\\u([a-z0-9]{4})/i', "&#x\\1;", $str);
  }

  $conn = mysqli_connect("127.0.0.1","root","capstone","myclothes");

  if (mysqli_connect_errno($conn))
  {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $sql = "select top, bottom from bookmarks";
  $res = mysqli_query($conn, $sql);
  $result = array();

  while($row= mysqli_fetch_array($res)){
    array_push($result, array('top'=>$row[0]));
    array_push($result, array('bottom'=>$row[1]));
  }

  $json = json_encode(array("result"=>$result));
  echo $json;

  mysqli_close($conn);
?>
