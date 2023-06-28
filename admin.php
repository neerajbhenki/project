<?php session_start();

define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_DATABASE','demo');

class user
{
public $db;
public function __construct()
{
    $this->db=new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,'demo');
if(mysqli_connect_errno())
{
        echo "Error: Could not connect to database.";
        exit;
}
}

public function get_session()
{
    return $_SESSION['login'];
}

public function user_logout()
{
    $_SESSION['login']=false;
    session_destroy();
}

}

$user=new User();
$uid=$_SESSION['uid']; 
if(!$user->get_session()) 
{ 
    header("location:user/user_login.php");
} 
if(isset($_GET['q'])) 
{ 
    $user->user_logout();
 header("location:login.php"); 
} 


$qt1 = 0; $qt2 = 0;
$w1 = 0; $w2 = 0;
$b1 = 0; $b2 = 0;

//customer 1
$sql1 = "SELECT * FROM customer WHERE p_key=2";
$r = mysqli_query($user->db,$sql1);
while($row = mysqli_fetch_array($r))
{
    $qt1 += $row['qnty'];
    $w1 += $row['weight'];
    $b1 += $row['box_cnt'];
}

//customer 2
$sql1 = "SELECT * FROM customer WHERE p_key=3";
$r = mysqli_query($user->db,$sql1);
while($row = mysqli_fetch_array($r))
{
    $qt2 += $row['qnty'];
    $w2 += $row['weight'];
    $b2 += $row['box_cnt'];
}
// echo "<script>alert('r=".$qt1."qt2=".$qt2."')</script>";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <style>
     th, td{
       
        padding:3px 20px;
        text-align:center;
    }
    td{
        background-color:light
    }
    .r2{
        background-color:cyan
    }
    th{
        background-color:skyblue; 
    }
    .th1{
        background-color:yellow;
    }
    </style>
</head>

<body>
<form action="" method="post" name="customer">

<table border = 3>
    <tr>
        <th class = 'r2'>Item/Customer</th>
        <th>Customer1</th>
        <th>Customer2</th>
        <th>Total</td>
    </tr>   
    <tr>
        <th class = "th1">Quantity</th>
        <td><?php echo $qt1 ?></td>
        <td><?php echo $qt2 ?></td>
        <td><?php echo $qt1 + $qt2 ?></td>
    </tr>  
    <tr class = 'r2'>
        <th class = "th1">Weight</th>
        <td><?php echo $w1 ?></td>
        <td><?php echo $w2 ?></td>
        <td><?php echo $w1+$w2 ?></td>        
    </tr>  
    <tr>
        <th class = "th1">Box count</th>
        <td><?php echo $b1 ?></td>
        <td><?php echo $b2 ?></td>
        <td><?php echo $b1+$b2 ?></td>
    </tr>  
</table>

<br>
</form>
</body>
</html>
