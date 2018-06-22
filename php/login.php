<?php
// Always start this first
session_start();

$con = new mysqli("localhost", "root", "", "global_tours_and_events_ke");

if( isset($_SESSION['user_id'])){
    alert("Logged in as ".$_SESSION['fname']." ".$_SESSION['lname']);
    
    $package = $con->real_escape_string($_REQUEST['package']);
    $_SESSION['package']=$package;
    alert("Package variable set: ".$package);
    
     header("refresh: 0.5; url=booking.html");
    
}else{
     header("refresh: 0.5; url=login.html");
}




if ( ! empty( $_POST ) ) {
    if ( !empty($_POST['submitBtn'])) {
        // Getting submitted user data from database
        
        $stmt = $con->prepare("SELECT * FROM `registered-users` WHERE `email` = ?");
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $result = $stmt->get_result();
    	$user = $result->fetch_object();
    		
        if(mysqli_num_rows($result)==1){
            // Verify user password and set $_SESSION
            if ( password_verify( $_POST['password'], $user->password ) ) {
                    $_SESSION['user_id'] = $user->user_id;
                    $_SESSION['fname'] = $user->fname;
                    $_SESSION['lname'] = $user->lname;
                    
                    alert("Login Success");
                    header("refresh: 0.5; url=../home.html");
            }else{
                alert("Invalid password");
                 $_SESSION['username'] = $user->email;
                 $username=$_SESSION['username'];
                
                header("refresh: 0.5; url=login.html");
            }
               
        }else{
            alert("Invalid username");
            header("refresh: 0.5; url=login.html");
        }
    }
    
    if ( !empty($_POST['booking'])){
        $package = $mysqli->real_escape_string($_REQUEST['package']);
        $_SESSION['package']=$package;
        alert("Package variable set: ".$package);
    }
}


function alert($msg){
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

function confirm($msg){
    echo "<script type='text/javascript'>confirm('$msg');</script>";
}

?>
