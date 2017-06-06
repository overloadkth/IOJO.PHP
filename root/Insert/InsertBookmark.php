<?php
  header("Content-Type: text/html;charset=UTF-8");
  error_reporting(E_ALL);
  ini_set('display_errors',1);


  $conn = mysqli_connect("127.0.0.1","root","capstone","myclothes");
  if (mysqli_connect_errno($conn))
  {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $top=isset($_POST['top']) ? $_POST['top'] : '';
  $bottom=isset($_POST['bottom']) ? $_POST['bottom'] : '';

  if ($top !="" and $bottom !=""){
      $sql = "insert into bookmarks(top, bottom) values('$top', '$bottom')";
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
         Top: <input type = "text" name = "top" />
         Bottom: <input type = "text" name = "bottom" />
         <input type = "submit" />
      </form>
   </body>
</html>
