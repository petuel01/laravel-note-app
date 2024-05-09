<?php
        include 'conect.php';
             //updatting product after editinh
             $update_id = $_POST['up_id'];
             $name = $_POST['name'];
             $price = $_POST['price'];
             $quantity = $_POST['quantity'];
             $date = $_POST['date'];
             $time = $_POST['time'];
             $exdate =  $_POST['exdate'];

             $update_query = mysqli_query($conn, "UPDATE items SET name='$name', price='$price',
             quantity='$quantity', date='$date', time='$time', exdate='$exdate' WHERE id='$update_id' ") or die('query failed');
      
     if($update_query === TRUE){;
          header("location: viewstock.php");
      }else{
         echo "something went wrong";
      }
?>
