<?php
  header("Content-Type: text/html;charset=UTF-8");
  error_reporting(E_ALL);
  ini_set('display_errors',1);

  $conn = mysqli_connect("127.0.0.1","root","capstone","myclothes");
  if (mysqli_connect_errno($conn))
  {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $top=isset($_GET['top']) ? $_GET['top'] : '';
  $bottom=isset($_GET['bottom']) ? $_GET['bottom'] : '';

  if ($top !="" and $bottom !=""){
    $sql = "delete from bookmarks where top='$top' and bottom='$bottom'";
    $result = mysqli_query($conn, $sql);
    if($result){
       echo 'success';
    }
    else{
       echo $sql;
       echo "<br />";
       echo 'failure';
    }
  }
  mysqli_close($conn);
?>
