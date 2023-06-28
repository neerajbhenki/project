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

public function store($p_key,$o_date,$company,$owner,$item,$qnty,$weight,$req_for_ship,$track_id,$ship_size,$box_cnt,$spec,$ch_qnty)
{
    $sql="INSERT INTO `customer`(`p_key`, `date`, `company`, `owner`, `item`, `qnty`, `weight`, `req_for_ship`,`track_id`,`ship_size`,`box_cnt`,`spec`,`ch_qnty`) VALUES ('$p_key', '$o_date','$company','$owner','$item','$qnty','$weight','$req_for_ship','$track_id','$ship_size','$box_cnt','$spec','$ch_qnty')";    
    $r = mysqli_query($this->db,$sql);
    return $r;

}

}

$user=new User();
$p_key=$_SESSION['uid']; 
if(!$user->get_session()) 
{ 
    header("location:user/user_login.php");
} 
if(isset($_GET['q'])) 
{ 
    $user->user_logout();
 header("location:login.php"); 
} 

// $roomname=$_GET['roomname'];
// $amt = $_GET['price'];
// $date = $_GET['date'];
if(isset($_REQUEST[ 'submit'])) 
{ 
    extract($_REQUEST);
    // echo "<script>alert('".$o_date."');</script>";
    $result=$user->store($p_key,$o_date,$company,$owner,$item,$qnty,$weight,$req_for_ship,$track_id,$ship_size,$box_cnt,$spec,$ch_qnty);
    // echo "<script>alert('".$result."');</script>";
    if($result)
    {
        echo "<script type='text/javascript'>
              alert('Stored');
         </script>";
    }

    
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <style>
   td{
        border:1px solid black; 
    }
    </style>
</head>

<body>
<form action="" method="post" name="customer">
<table >
    <tr>
        <td>order date</td>
        <td>
            <input type = "date" name = "o_date">
        </td>
    </tr>
    <tr>
        <td>Company</td>
        <td>
            <input type = "text" name = "company">
        </td>
    </tr>
    <tr>
        <td>Owner</td>
        <td>
            <input type = "text" name = "owner">
        </td>
    </tr>
    <tr>
        <td>Item</td>
        <td>
            <input type = "text" name = "item">
        </td>
    </tr>
    <tr>
        <td>Quantity</td>
        <td>
            <input type = "text" name = "qnty">
        </td>
    </tr>
    <tr>
        <td>Weight</td>
        <td>
            <input type = "text" name = "weight">
        </td>
    </tr>
    <tr>
        <td>Request for shipment</td>
        <td>
            <input type = "text" name = "req_for_ship">
        </td>
    </tr>
    <tr>
        <td>Tracking ID</td>
        <td>
            <input type = "text" name = "track_id">
        </td>
    </tr>
    <tr>
        <td>shipment size</td>
        <td>
            <input type = "text" name = "ship_size">
        </td>
    </tr>
    <tr>
        <td>Box count</td>
        <td>
            <input type = "text" name = "box_cnt">
        </td>
    </tr>
    <tr>
        <td>Specification</td>
        <td>
            <input type = "text" name = "spec">
        </td>
    </tr>
    <tr>
        <td>Checklist quantity</td>
        <td>
            <input type = "text" name = "ch_qnty">
        </td>
    </tr>
    <tr>
        <td></td>
        <td style = "background-color:blue">
        <button type="submit"  name="submit" style = "background-color:blue">Submit</button>
        </td>
    </tr>
    

</table>



<br>
</form>
</body>
</html>