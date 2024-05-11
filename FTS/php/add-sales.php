
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add stock</title>
    <link rel="stylesheet" href="\fts\css\main.css">
    <link rel="stylesheet" href="\fts\source\fontawesome-free-5.15.4-web\fontawesome-free-5.15.4-web\css\all.css">
    <script src="\fts\js\jquery-3.7.1.min.js"></script>
    <script src="\fts\chart.umd.js"></script>
    <style>
    .man select{
    border: none;
    font-family: 'Times New Roman', Times, serif;
    font-weight: bold;
    font-size: 23px;
    background: rgb(147, 199, 225);
    padding: .95rem;
    width: 82%;
    border-radius: 10px;

    }
    option{
        width: 50%;
        height: 1.6rem
    }
    </style>
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
            <li class="item "><a href="main-dashboard.html" class="itemLink "><i class="fas fa-school" id="icon"></i>DASHBOARD</a></li>
            <li class="item"><a href="viewsales.php" class="hov itemLink" ><i class="fa fa-product-hunt" id="icon"></i>STOCK IN<i class="fas fa-angle-down" id="angles"></i></a>
              <ul class="sublist">
                <li class="item"><a href="addsales.php" class="hov sublink"><i class="fa fa-plus-circle" id="icon"></i>Add New</a></li>
                <li class="item"><a href="viewsales.php" class="sublink"><i class="fas fa-eye" id="icon"></i>View Sales</a></li>
              </ul>
            </li>
            <li class="item"><a href="viewstock.php" class="itemLink"><i class="fas fa-product" id="icon"></i>STOCK IN      <i class="fas fa-angle-right" id="angles"></i></a></li>
            <li class="item"><a href="#" class="itemLink"><i class="fas fa-users" id="icon"></i>LOW STOCK</a></li>
            <li class="item"><a href="#" class="itemLink"><i class="fas fa-users" id="icon"></i>PHARMACY</a></li>
            <li class="item"><a href="#" class="itemLink"><i class="fas fa-users" id="icon"></i>EXPIRED STOCK</a></li>
            <li class="item"><a href="#" class="itemLink"><i class="fas fa-users" id="icon"></i>ACCOUNT</a></li>
            <li class="item"><a href="logout.php" class="itemLink"><i class="fas fa-sign-out-alt" id="icon"></i>LOg Out</a></li>

        </ul>
    </div> 
    <section>
    <h4 class="haed">Add Sales</h4>
    <button class="add"><a href="viewstock.php" style="color: white;">view sales</a></button>
    <div class="main-products">
        <form class="man" action="phpsales.php" method="post">
            <h1>Add New sales</h1>
            <label for="name">Name of Good:</label>
            <select name="name" id="select1">
                <?php 
                
                include 'conect.php';
                 
                $sql = "SELECT name FROM items";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo '<option value='.$row['name'].' >'.$row['name'].'</option>';
                    }
                }else{
                    echo '<option>no data found</option>';
                }
                $conn->close();
                ?>
            </select>
            <label for="price"> price:</label>
            <input type="number" id="Quantity" name="price" placeholder="Enter Item Quantity" required>
            <label for="qtt">Quantity:</label>
            <input type="number" id="Quantity" name="quantity" placeholder="Enter Item Quantity" required>
            <label for="name">Date of Delivery:</label>
            <input type="datetime-local" name="date">
        
        <hr>
        <br>
        <hr>
        <div class="btns">
        <button class="save" name="submit" type="submit">Add sale</button>
        <button class="back">back</button>
            <div id="danger">item added successfully   <span onclick="hideDanger();">X</span></div>
        <script>
            function showDanger() {
                document.getElementById('danger').style.display = 'block';
            }

            function hideDanger() {
                document.getElementById('danger').style.display = 'none';
            }
           
        </script>
        </form>
    </div>
    </section>
</body>
</html>