<link rel="shortcut icon" href="../assets/icons/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="/Users/alphinjude/Documents/Projects/Sri-Shakthi-FTL/assets/css/style.css">  

<header class="page-header" style="margin: 0px">
    <nav>
        <div class="logo"><img src="../assets/images/logo.png" alt=""></div>
        <ul>
            <li onclick="location.href='chemicals-list.php';" id="chemicals">
                <img src="../assets/icons/chemical.svg" alt="">
                <p>Chemicals</p>
            </li>
            <li onclick="location.href='clients.php';">
                <img src="../assets/icons/client.svg" alt="">
                <p>Clients</p>
            </li>
            <li onclick="location.href='tests.php';">
                <img src="../assets/icons/test.svg" alt="">
                <p>Tests</p>
            </li>
            <li onclick="location.href='suppliers.php';">
                <img src="../assets/icons/supplier.svg" alt="">
                <p>Suppliers</p>
            </li>
            <li  onclick="location.href='in-stock.php';">
                <img src="../assets/icons/stock.svg" alt="">
                <p>In Stock</p>
            </li> 
            <li onclick="location.href='update-stock.php';" id="update-stock">
                <img src="../assets/icons/update.svg" alt="">
                <p>Update Stock</p>
            </li>
            <li onclick="location.href='usage.php';">
                <img src="../assets/icons/done.svg" alt="">
                <p>Usage Entry</p>
            </li>
            <li  onclick="location.href='report.php';">
                <img src="../assets/icons/report.svg" alt="">
                <p>Report</p>
            </li> 
        </ul>
        <div class="logout-button"  onclick="displayLogoutWarning()">
            <img src="../assets/icons/logout.svg" alt="">
            <p>Logout</p>
        </div>
    </nav>
</header>

<div class="header">
<img src="../assets\images\header-img.png" alt="" class="header-logo">
</div>
<div class="footer">Designed and developed by Alphin Jude and Dhanush under the guidance of Mr. R Karthiban Assistant Professor, <br> Deptartment of CSE, <br> Sri Shakthi Institute of Engineering and Technology.</div>

<div id="logout-warning" class="logout-warning">
    <div class="title">Are you sure you want to logout?</div>
    <center>
        <img src="../assets/icons/logout.svg" alt="">
    </center>
    <div class="buttons-row">
        <div class="button"> 
            <button type="button" id="add-stock-item" class="cancel-button" name="add-stock-item" onclick="closeLogoutWarning()">
                <p>Cancel</p>
            </button>
        </div>
        <div class="button">
            <button type="button" name="logout" value="" onclick="location.href='../php/logout.php';">
                <p>Yes</p>
            </button>
        </div>
    </div>
</div>