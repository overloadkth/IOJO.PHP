<?php
  header("Content-Type: text/html;charset=UTF-8");
  error_reporting(E_ALL);
  ini_set('display_errors',1);

  $conn = mysqli_connect("127.0.0.1","root","capstone","myclothes");
  if (mysqli_connect_errno($conn))
  {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $type=isset($_GET['type']) ? $_GET['type'] : '';
  $uri=isset($_GET['uri']) ? $_GET['uri'] : '';

  if ($type !="" and $uri !=""){
    $sql = "delete from my$type where uri='$uri'";
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

<html>
   <body>
      <form action="<?php $_PHP_SELF ?>" method="POST">
         TYPE : <input type = "text" name = "type" />
         URI : <input type = "text" name = "uri" />
         <input type = "submit" />
      </form>
   </body>
</html>
