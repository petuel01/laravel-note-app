
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
            <li class="item"><a href="hospital-dashboard.html" class="itemLink"><i class="fa fa-money" aria-hidden="true" id="icon"></i>SALES</a>
            <li class="item"><a href="stockin.html" class="hov itemLink" ><i class="fa fa-product-hunt" id="icon"></i>STOCK IN<i class="fas fa-angle-down" id="angles"></i></a>
              <ul class="sublist">
                <li class="item"><a href="addstock.php" class=" hov sublink"><i class="fa fa-plus-circle" id="icon"></i>Add New</a></li>
                <li class="item"><a href="viewstock.php" class="sublink"><i class="fas fa-users" id="icon"></i>View Stock</a></li>
              </ul>
            </li>
            <li class="item"><a href="users.html" class="itemLink"><i class="fas fa-users" id="icon"></i>LOW STOCK</a></li>
            <li class="item"><a href="users.html" class="itemLink"><i class="fas fa-users" id="icon"></i>PHARMACY</a></li>
            <li class="item"><a href="users.html" class="itemLink"><i class="fas fa-users" id="icon"></i>EXPIRED STOCK</a></li>
            <li class="item"><a href="users.html" class="itemLink"><i class="fas fa-users" id="icon"></i>ACCOUNT</a></li>
            <li class="item"><a href="logout.html" class="itemLink"><i class="fas fa-sign-out-alt" id="icon"></i>LOg Out</a></li>

        </ul>
    </div> 
    <section>
    <h4 class="haed">Manage Products</h4>
    <button class="add"><a href="viewstock.php" style="color: white;">view store</a></button>
        <form class="man" action="addItem.php" method="post">
            <h1>Add New Item</h1>
            <label for="name">Name of Good:</label>
            <input type="text" id="Itemname" name="name" placeholder="Enter Item Name" required>
            <label for="name">Good price:</label>
            <input type="number" id="Quantity" name="price" placeholder="Enter Item Quantity" required>
            <label for="name">Good Quantity:</label>
            <input type="number" id="Quantity" name="quantity" placeholder="Enter Item Quantity" required>
            <label for="name">Date of Delivery:</label>
            <input type="date" id="dateBought" name="date" required>
            <label for="name">Expired Date of Good:</label>
            <input type="date" id="ExpiredDate" name="exdate" required>
            <label for="time">Arrival Time of Goods:</label>
            <input type="time" name="time" id="time" required>
            <button type="submit" name="submit">Save Changes</button>
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
    </section>
</body>
</html>