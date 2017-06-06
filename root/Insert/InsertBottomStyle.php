<?php
  header("Content-Type: text/html;charset=UTF-8");
  error_reporting(E_ALL);
  ini_set('display_errors',1);

  $conn = mysqli_connect("127.0.0.1","root","capstone","myclothes");
  if (mysqli_connect_errno($conn))
  {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $style=isset($_POST['style']) ? $_POST['style'] : '';
  $color=isset($_POST['color']) ? $_POST['color'] : '';
  $uri=isset($_POST['uri']) ? $_POST['uri'] : '';

  if ($style !="" and $color !="" and $uri != ""){
      $sql = "insert into mybottom(style, color, uri) values('$style', '$color', '$uri')";
      $result=mysqli_query($conn,$sql);

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
         Style: <input type = "text" name = "style" />
         Color: <input type = "text" name = "color" />
         Uri: <input type = "text" name = "uri" />
         <input type = "submit" />
      </form>

   </body>
</html>
