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

    public function check_login($idname,$password)
    {
        //$password=md5($password);
        $sql2="SELECT p_key from auth WHERE idname='$idname' and password='$password'";
        $result=mysqli_query($this->db,$sql2);
        $user_data=mysqli_fetch_array($result);
        $count_row=$result->num_rows;
        
        if($count_row==1)
        {
            $_SESSION['login']=true;
            $_SESSION['uid']=$user_data['p_key'];
            return $user_data['p_key'];    
        }
        else
        {
            return false;
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>demo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css" type="text/css">

    <script language="javascript" type="text/javascript">
        function submitlogin() {
            var form = document.login;
            if (form.idname.value == "") {
                alert("Enter email or username.");
                return false;
            } else if (form.password.value == ) {
                alert("Enter Password.");
                return false;
            }
        }

       
    </script>
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <h2>Log In</h2>
            

            <hr>
            <form action="" method="post" name="login">
                <div class="form-group">
                    <label for="ID">ID:</label>
                    <input type="text" name="idname" class="form-control" value="
" placeholder = "ID" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" value="" placeholder = "password" required>
                </div>
                <!--For showing error for wrong input  -->
                <p id="wrong_id" style=" color:red; font-size:12px; "></p>


                <button type="submit" name="submit" value="Login" onclick="retrun(submitlogin());" class="btn btn-lg btn-primary btn-block">Sign In</button>
                
                <br>             
                

                <?php if(isset($_REQUEST[ 'submit'])) { extract($_REQUEST); $login=$user->check_login($idname, $password); 
                    if($login == 1) { 
                        echo "<script>location='admin.php'</script>";
                        // echo "<script>alert('login')</script>";
                    }
                    else if($login == 2 || $login == 3){
                        echo "<script>location='custom.php'</script>";
                    }
                else{?>

                <script type="text/javascript">
                    document.getElementById("wrong_id").innerHTML = "Wrong id or password";
                </script>

                <?php } }?>

            </form>
        </div>
    </div>

</body>

</html>