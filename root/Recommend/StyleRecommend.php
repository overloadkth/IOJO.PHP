<?php
  function unistr_to_xnstr($str){
      return preg_replace('/\\\u([a-z0-9]{4})/i', "&#x\\1;", $str);
  }

  $conn = mysqli_connect("127.0.0.1","root","capstone","myclothes");

  if (mysqli_connect_errno($conn))
  {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $weather=isset($_GET['weather']) ? $_GET['weather'] : '';
  $high_temp=isset($_GET['high_temp']) ? $_GET['high_temp'] : '';

  $sql = "SELECT t.uri as top, b.uri as bottom
          FROM mytop t
          JOIN (SELECT top_style, top_color, bottom_style, bottom_color
                FROM category
                WHERE weather = '$weather' AND high_temp = '$high_temp'
                ORDER BY RAND() ) c ON t.style = c.top_style
                                             AND t.color = c.top_color
                                             JOIN mybottom b ON c.bottom_style = b.style
                                                             AND c.bottom_color = b.color
                                                             ORDER BY RAND() ";
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
