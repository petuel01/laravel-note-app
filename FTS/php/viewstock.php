<?php
session_start();

// Check if the user is logged in and has a role set in the session
if(!isset($_SESSION['ROLE'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>viewstock</title>
    <link rel="stylesheet" href="\fts\css\main.css">
    <link rel="stylesheet" href="\fts\source\fontawesome-free-5.15.4-web\fontawesome-free-5.15.4-web\css\all.css">
    <script src="\fts\js\jquery-3.7.1.min.js"></script>
    <script src="\fts\chart.umd.js"></script>
</head>
<body>
    <nav class="horizontal">
        <header><i class="fas fa-shopping-cart"></i>HOSPITAL-DASHBOARD</header>
            <i class="fas fa-user" id="usser"  onclick="displayLog()"></i>
    
        <div class="user-box">
            <p>username<span></p>
            <p>role</span></p>
                <button type="submit" class="logout-btn">Log Out</button>
                <button onclick="cancelLog()" class="cancel">X</button>
        </div>
            <script>
                function displayLog(){
                    document.querySelector('.user-box').style.display = 'block';
                }  
                function cancelLog(){
                    document.querySelector('.user-box').style.display = 'none';
                } 
            </script>
        </nav>
    <div class="sidebar">
        <ul class="list">
            <li class="item "><a href="main-dashboard.html" class="itemLink "><i class="fas fa-tachometer-alt" id="icon"></i>MAIN DASHBOARD</a></li>
            <li class="item "><a href="main-dashboard.html" class="itemLink "><i class="fas fa-tachometer-alt" id="icon"></i>DASHBOARD</a></li>
            <li class="item"><a href="viewsales.php" class="itemLink"><i class="fas fa-product" id="icon"></i>SALES     <i class="fas fa-angle-right" id="angles"></i></a></li>
            <li class="item"><a href="viewstock.php" class="hov itemLink" ><i class="fas fa-product-hunt" id="icon"></i>STOCK IN<i class="fas fa-angle-down" id="angles"></i></a>
              <ul class="sublist">
                <li class="item"><a href="addstock.php" class="sublink"><i class="fas fa-plus-circle" id="icon"></i>Add New</a></li>
                <li class="item"><a href="viewstock.php" class="hov sublink"><i class="fas fa-eye" id="icon"></i>View Stock</a></li>
              </ul>
            </li>
            <li class="item"><a href="#" class="itemLink"><i class="fas fa-users" id="icon"></i>LOW STOCK</a></li>
            <li class="item"><a href="#" class="itemLink"><i class="fas fa-users" id="icon"></i>PHARMACY</a></li>
            <li class="item"><a href="#" class="itemLink"><i class="fas fa-users" id="icon"></i>EXPIRED STOCK</a></li>
            <li class="item"><a href="#" class="itemLink"><i class="fas fa-users" id="icon"></i>ACCOUNT</a></li>
            <li class="item"><a href="logout.php" class="itemLink"><i class="fas fa-sign-out-alt" id="icon"></i>LOg Out</a></li>

        </ul>
    </div> 

    <section class="down">
        <div class="head-pro">
            <h4 class="haed">Manage Products</h4>
            
        <?php if($_SESSION['ROLE'] == 'admin' || $_SESSION['ROLE'] == 'mananger' ) {
               echo'
            <button class="add"><a href="addstock.php" style="color: white;">add item</a></button>';
        } ?>
        </div>
        <div class="top-right">    
        </div>
        <div class="main-products">
            <form method="POST" class="search">
                <button name="submit" id="search" class="search-btn"><i class="fas fa-search"></i></button>
                <input type="text" placeholder="search" class="text-area" name="search">
          </form>
            <div class="butts">
                <button class="copy">Copy</button>
                <button class="copy">CSV</button>
                <button class="copy">Excel</button>
                <button class="copy">Print</button>
                <br>
                <br>
                <hr>
            </div>
            
            <br>
            
            <table id="tableId">
                <tr>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Qtt</th>
                    <th>Delivery</th>
                    <th>Time</th>
                    <th>Exp Date</th>
                    <?php if($_SESSION['ROLE'] == 'admin' || $_SESSION['ROLE'] == 'ceo' ) {
                  echo'
                    <th>Action</th>
                  </tr>'; } ?>
 <?php
 include 'conect.php';
 if(isset($_POST['submit'])){
    $search = $_POST['search'];
    $sql = "select * from items where id like '%$search%' or name like '%$search%'";
    $result = mysqli_query($conn, $sql);
    if($result){
        if(mysqli_num_rows($result)>0){
            while($row = $result->fetch_assoc()) {
                $quantity = $row['p_quantity'];
                $id = $row['id'];
                echo'
                <tbody>
                <tr class="row">
                    <td>'.$row['name'].'</td>
                    <td>'.$row['price'].'</td>
                    <td>'.$row['quantity'].'</td>
                    <td>'.$row['date'].'</td>
                    <td>'.$row['time'].'</td>
                    <td>'.$row['exdate'].'</td>'
                    ?>
                     <?php if($_SESSION['ROLE'] == 'admin' || $_SESSION['ROLE'] == 'mananger' ) {
               echo'
               <button id="edit"><a href="viewstock.php?edit='.$row['id'].'" class="edit">edit</a></button>
               <button id="del"><a href="viewstock.php?delete='.$row['id'].'" class="delete" onclick="return confirm(\'Do you really want to delete this product?\');">delete</a></button>';
                   
                     } ?>
                    <?php
                    echo'
                </td>
                    </tr>
            </tbody>
               ';
            }
        }else{
            echo'<h1 style="color: red;">item not found</h1>';
        }
    }
}else{
    $sql = "SELECT * FROM items";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $quantity = $row['quantity'];
        if($quantity < 10){
            echo'
            <tbody>
            <tr class="row">
                <td>'.$row['name'].'</td>
                <td>'.$row['price'].'</td>
                <td>'.$row['quantity'].'</td>
                <td>'.$row['date'].'</td>
                <td>'.$row['time'].'</td>
                <td>'.$row['exdate'].'</td>'
                    ?>
                       <?php if($_SESSION['ROLE'] == 'admin' || $_SESSION['ROLE'] == 'mananger' ) {
               echo'<td>
               <button id="edit"><a href="viewstock.php?edit='.$row['id'].'" class="edit">edit</a></button>
               <button id="del"><a href="viewstock.php?delete='.$row['id'].'" class="delete" onclick="return confirm(\'Do you really want to delete this product?\');">delete</a></button>  </td>';
                   
                     } ?>
                    <?php
                    echo'
               
                    </tr>
            </tbody>
               ';
        }else{
            if($quantity < 10){
                echo'
                <tbody>
                <tr class="row">
                    <td>'.$row['name'].'</td>
                    <td>'.$row['price'].'</td>
                    <td>'.$row['p_quantity'].'<span class="low">low</span></td>
                    <td>'.$row['date'].'</td>
                    <td>'.$row['time'].'</td>
                    <td>'.$row['exdate'].'</td>'
                        ?>
                                   <?php if($_SESSION['ROLE'] == 'admin' || $_SESSION['ROLE'] == 'mananger' ) {
               echo'
               <button id="edit"><a href="viewstock.php?edit='.$row['id'].'" class="edit">edit</a></button>
               <button id="del"><a href="viewstock.php?delete='.$row['id'].'" class="delete" onclick="return confirm(\'Do you really want to delete this product?\');">delete</a></button>';
                   
                     } ?>
                    <?php
                    echo'
                </td>
                    </tr>
            </tbody>
               ';
            }else{
                echo'
                <tbody>
                <tr class="row">
                    <td>'.$row['name'].'</td>
                    <td>'.$row['price'].'</td>
                    <td>'.$row['quantity'].'</td>
                    <td>'.$row['date'].'</td>
                    <td>'.$row['time'].'</td>
                    <td>'.$row['exdate'].'</td>'
                         ?>
                            <?php if($_SESSION['ROLE'] == 'admin' || $_SESSION['ROLE'] == 'mananger' ) {
               echo'<td>
               <button id="edit"><a href="viewstock.php?edit='.$row['id'].'" class="edit"><i class="fas fa-edit" style="color: white;" aria-hidden="true"></i></a></button>
               <button id="del">
               <a href="viewstock.php?delete=<?php echo '.$row['id'].'; ?>" class="delete" onclick="return confirm(\'Do you really want to delete this product?\');">
                   <i class="fas fa-trash" style="color: white;" aria-hidden="true"></i>
               </a>
           </button>';
                   
                     } ?>
                    <?php
                    echo'
                </td>
                    </tr>
            </tbody>
               ';
            }
        }
    }
}
}
    ?>
      
            </table>

        </div>
    </section>
<section class="update">
<?php  
 if(isset($_GET['edit'])){
     $edit_id = $_GET['edit'];
    $edit_query = mysqli_query($conn, "SELECT * FROM items WHERE id = '$edit_id'") or die('query failed');
    if(mysqli_num_rows($edit_query)){
     while($fetch_edit = mysqli_fetch_assoc($edit_query)){
 ?>
 <form action="edit.php" method="post">
 <input type="hidden" name="up_id" value="<?php echo $fetch_edit['id'] ?>">
 <input type="text" name="name" value="<?php echo $fetch_edit['name'] ?>">
 <input type="num" name="price" value="<?php echo $fetch_edit['price'] ?>">
 <input type="num" name="quantity" value="<?php echo $fetch_edit['quantity'] ?>">
 <input type="date" name="date" value="<?php echo $fetch_edit['date'] ?>">
 <input type="time" name="time" value="<?php echo $fetch_edit['time'] ?>">
 <input type="date" name="exdate" value="<?php echo $fetch_edit['exdate'] ?>">
 <input type="submit" mame="update" value="update" class="edit ">
 <input type="reset" mame="cancel" value="cancel" id="close_form" class="btn" onclick="canceledit()">
 </form>
 <?php
    }
  }
    echo "<script>document.querySelector('.update').style.display='block'</script>";
 }
      


   ?>
   <script>
    function canceledit(){
    document.querySelector('.update').style.display = 'none';
}
   </script>
</section>
<?php 
include 'conect.php';

     //delete products from database
     if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        mysqli_query($conn, "DELETE FROM items WHERE id = '$delete_id'") or die('query failed');
        
           header('location: items.php'); 
       }





?>
</body>
</html>