<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Dashboard</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="\source\fontawesome-free-5.15.4-web\fontawesome-free-5.15.4-web\css\all.css">
    <script src="\fts\js\jquery-3.7.1.min.js"></script>
    <script src="chart.umd.js"></script>
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
        <form action="add-user.php" method="POST" id="editForm" style="display: grid;">
            <label >Name:</label>
            <input type="text" id="name" name="Name" placeholder="enter new members name" required>
            <label >password:</label>
            <input type="text" id="pass" name="Pass" placeholder="assign passsword to user" required>
            <label >Role:</label>
            <select name="Role" style="height: 3rem;">
                <option value="admin">admin</option>
                <option value="principal">principal</option>
                <option value="matron">matron</option>
                <option value="pharmacist">staff</option>
                <option value="accountant">user</option>
                <option value="busar">user</option>
                <option value="store-accountant">user</option>
            </select>
            <button type="submit" name="submit" class="sava" >Save</button>
            <button type="button" class="sav" onclick="cancelEdit()">Cancel</button>

        </form>
   </section>
</body>
</html>