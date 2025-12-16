<?php
function connecte()
{
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $db = "courses";
    $conn = new mysqli($serverName, $userName, $password, $db);
    return $conn;
}
function register()
{
    session_start();
    $conn = connecte();
    $message = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userName = $_POST["username"];
        $email = $_POST["email"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $checkstmt = $conn->prepare("SELECT email FROM users where email=?");
        $checkstmt->bind_param("s", $email);
        $checkstmt->execute();
        $checkstmt->store_result();
        if ($checkstmt->num_rows > 0) {
            $_SESSION['message'] = "Email already exist";
            header("Location: registration.php");
            exit;
        } else {
            $sql = $conn->prepare("INSERT INTO users (username,email,password)VALUES(?,?,?)");
            $sql->bind_param("sss", $userName, $email, $password);
            if ($sql->execute()) {
                header("location:login.php");
                exit;
            } else {
                $message = "Error creating account";
            }
            $sql->close();

        }
        $checkstmt->close();
        $conn->close();


    }
}

//Login
function loginCheck($email, $password)
{
    /*  session_start();
     $conn=connecte();
     if($_SERVER['REQUEST_METHOD']=="POST"){
         $sql=$conn->prepare("SELECT id,password FROM users where email=?");
         $sql->bind_param("s",$email);
         $sql->execute();
         $result=$sql->get_result();
         if($result->num_rows===1){
             $user=$result->fetch_assoc();
             if(password_verify($password,$user['password'])){
                 $_SESSION['userId']=$user['id'];
                 $_SESSION['email']=$email;
                 header("location:index.php");
                 exit;
             }
         }
     } */
    $conn = connecte();
    $sql = $conn->prepare("SELECT id,password FROM users where email=?");
    $sql->bind_param("s", $email);
    $sql->execute();
    $result = $sql->get_result();
    if($result->num_rows===1){
        $user=$result->fetch_assoc();
        if(password_verify($password,$user['password'])){
            return[
                'success'=>true,
                'userId'=>$user['id'],
                'email'=>$email,
            ];
        }
    }
    return[
        'success'=>false,
        'message'=>'Email ou mot de passe incorrect'
    ];
}