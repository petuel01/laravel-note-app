<?php
//establish a database connection
include 'conect.php';              
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>user-mgt</title>
    <link rel="stylesheet" href="\fts\css\main.css">
    <link rel="stylesheet" href="\fts\source\fontawesome-free-5.15.4-web\fontawesome-free-5.15.4-web\css\all.css">
    <script src="\fts\js\jquery-3.7.1.min.js"></script>
    <script src="\fts\chart.umd.js"></script>
</head>

<body>
    <nav class="horizontal">
    <header><i class="fas fa-shopping-cart"></i>F.T.S</header>
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
            <li class="item "><a href="main-dashboard.html" class="hov itemLink "><i class="fas fa-tachometer-alt" id="icon"></i>Dashboard</a></li>
            <li class="item"><a href="hospital-dashboard.html" class="itemLink"><i class="fas fa-hospital" id="icon"></i>HOSPITAL</a>
                <li class="item"><a href="school-dashboard.html" class="itemLink"><i class="fas fa-school" id="icon"></i>SCHOOL</a>
                    <li class="item"><a href="users.php" class="itemLink"><i class="fas fa-users" id="icon"></i>MANAGE USERS</a>

            <li class="item"><a href="\fts\php\logout.php" class="itemLink"><i class="fas fa-sign-out-alt" id="icon"></i>LOg Out</a></li>
        </ul>
    </div> 
 <section>
    <div class="head-pro">
            <h4 class="haed">MANAGE USERS</h4>
            <button class="add"><a href="add-mem.php" style="color: white;">Add New Member</a></button>
            </div>
          <div class="main-products">
            <div class="search">
                <button type="submit" id="search" class="search-btn"><i class="fas fa-search"></i></button>
                <input type="text" placeholder="search" class="text-area">
            </div>
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
            
            <table>
                <tr class="headth">
                    <th>id</th>
                    <th>Users</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>

                  <?php 
                
                    $sql = "SELECT * FROM users";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                                echo '
                                <tbody>
                                <tr class="row">
                                    <td>'.$row['id'].'</td>
                                    <td>'.$row['username'].'</td>
                                    <td>'.$row['password'].'</td>
                                    <td>'.$row['role'].'</td>
                                    <td>
                                    <button id="edit"><a href="users.php?edit='.$row['id'].'" class="edit"><i class="fas fa-edit" style="color: white;" aria-hidden="true"></i></a></button>
                                    <button id="edit"><a href="users.php?message='.$row['id'].'" class="edit"><i class="fa fa-comment" style="color: white;" aria-hidden="true"></i></a></button>
                                    <button id="del"><a href="users.php?delete='.$row['id'].'" class="delete" onclick="return confirm("Do you really want to delete this product");"><i class="fa fa-trash" style="color: white;" aria-hidden="true"></a></button>
                                </td>
                                    </tr>
                            </tbody>';
                        }
                            }else{
                             echo 'connection failed';
                            }
                    
                $conn->close();
                
                
                  ?>
            </table>

        </div>
        <div class="edit-form1">
        <form action="addMembers.php" method="POST" id="editForm">
            <label >Name:</label>
            <input type="text" id="name" name="Name" placeholder="enter new members name" required>
            <label >password:</label>
            <input type="text" id="pass" name="Pass" placeholder="assign passsword to user" required>
            <label >Role:</label>
       
            <button type="submit" name="submit" class="sava" >Save</button>
            <button type="button" class="sav" onclick="cancelEdit()">Cancel</button>

        </form>

</div>
</div>
    </section>
    <div class="edit-form3">
        <form action="addMembers.php" method="POST" id="editForm">
            <label >Name:</label>
            <input type="text" id="name" name="Name" placeholder="enter new members name" required>
            <label >password:</label>
            <input type="text" id="pass" name="Pass" placeholder="assign passsword to user" required>
            <label >Role:</label>
            <select name="Role" style="height: 3rem;">
                <option value="admin">admin</option>
                <option value="mananger">mananger</option>
                <option value="mananger">seller</option>
                <option value="staff">staff</option>
                <option value="user">user</option>
            </select>
            <button type="submit" name="submit" class="sava" >Save</button>
            <button type="button" class="sav" onclick="cancelEdit()">Cancel</button>

        </form>
    </div>
    
    
        <div class="confirmation-dialog" id="confirmationDialog">
        <p class="col">Are you sure you want to delete this product?</p>
        <div class="poster">
        <button class="sava" onclick="deleteItem()">Yes</button>
        <button class="sav" onclick="cancelDelete()">No</button>
        </div>
    </div>
    <div class="overlay" id="overlay"></div>
    <script>
        function addMember(){
            document.querySelector('.edit-form3').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }
        
        function cancelEdit() {
            // Hide the edit form
            document.querySelector('.edit-form3').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }
        
</script>

<section class="update">
<?php  
include 'conect.php';
 if(isset($_GET['edit'])){
     $edit_id = $_GET['edit'];
    $edit_query = mysqli_query($conn, "SELECT * FROM users WHERE id = '$edit_id'") or die('query failed');
    if(mysqli_num_rows($edit_query)){
     while($fetch_edit = mysqli_fetch_assoc($edit_query)){
 ?>
 <h1 class="head">edit product</h1>
 <form action="edit.php" method="post">
 <input type="hidden" name="up_id" value="<?php echo $fetch_edit['id'] ?>">
 <input type="text" name="username" value="<?php echo $fetch_edit['username'] ?>">
 <input type="text" name="password" value="<?php echo $fetch_edit['password'] ?>">
 <input type="text" name="role" value="<?php echo $fetch_edit['role'] ?>">
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
   </section>
</body>
</html>