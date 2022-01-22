
<?php
session_start();
//$_SESSION['name1']='ali';

if( isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] == 'noname'){
    unset($_SESSION['name1']);//unset ||Remove Single session variable
    //session_unset();
}
$name=$_SESSION['name1'] ?? "unname"; //no coalescing
//unset($_SESSION['name1']);

//get cookie
$gender=$_COOKIE['gender'] ??'unknown';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<style type="text/css">
.btn, .btn-large, .btn-small {
    float:right;
    margin-top: 15px;
}
a.brand-logo{
    color: darkslategrey;
    }
.card {
    float: left;}
.card .card-content {
    padding: 3px;
    border-radius:5px;
}
.center, .center-align {
    padding: 2px;
    text-align: center;
}
a.brand-text:hover{
    color:black;
    background-color:#ffab40;
    border: 2px solid #ffab40;
    border-radius: 6px;
    padding: 0px 2px;
    }
</style>
</head>
<body class="grey lighten-4">
    <h5 style="border-radius: 3px;
    margin-top: 17px;
    position: absolute;
    margin-left: 30px;
    background-color: #f2d384;
    padding: 5px 20px;">Hello <?php echo htmlspecialchars($name);?></h5>
    <p style="border-radius: 3px;
    margin-top: 17px;
    position: absolute;
    margin-left: 490px;
    background-color: #f2d384;
    padding: 5px 20px;"><?php echo htmlspecialchars($gender);?></p>

<nav class="white z-depth-0">
    <div class="container">
        <a href="#" class="brand-logo brand-text" style="border-radius: 3px;
    margin-top: 17px;
    position: absolute;
    margin-left: 890px; margin-top: -5px;">pizza hut</a>

     <ul id="nav-mobile" class="right hide-on-small-and-down"></ul>
        <li><a href="../add.php" class="btn brand z-depth-0">add a pizza</a>
    </li>
    <!-- <ul id="nav-mobile" class="right hide-on-small-and-down">
        <li><form action="add.php" method="POST" class="white">
             <input type="submit" name="submit" value="Add Pizza" class="btn brand z-depth-0">
        </form></li>
   </ul> Funny Code-->
    </div>

</nav>


