<?php 
// header('Access-Control-Allow-Origin: *');
// if ($_SERVER['HTTP_ORIGIN'] !== 'https://mywebsite.com') {
//     header('HTTP/1.1 403 Forbidden');
//     echo 'Access denied';
//     exit;
// }

include 'connect.php';

function sanitize_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['signUp'])){
    $firstName = sanitize_input($_POST['fName']);
    $lastName = sanitize_input($_POST['lName']);
    $email = sanitize_input($_POST['email']);
    $password = sanitize_input($_POST['password']);
    $password = password_hash($password, PASSWORD_BCRYPT);

    $checkEmail = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $result = $checkEmail->get_result();

    if($result->num_rows > 0){
        header("location: ../pages/loginresponse/fewemail.php");
    } else {
        $insertQuery = $conn->prepare("INSERT INTO users (firstName, lastName, email, password) VALUES (?, ?, ?, ?)");
        $insertQuery->bind_param("ssss", $firstName, $lastName, $email, $password);

        if($insertQuery->execute()){
            header("location: ../pages/loginresponse/registersucses.php");
        } else {
            header("location: ../pages/loginresponse/error.php");
        }
    }
}

if(isset($_POST['signIn'])){
    session_start();

    $email = sanitize_input($_POST['email']);
    $password = sanitize_input($_POST['password']);
    $sql = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $sql->bind_param("s", $email);
    $sql->execute();
    $result = $sql->get_result();

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();

        if(password_verify($password, $row['password'])){
            $_SESSION['email'] = $row['email'];

            $sessionCheck = $conn->prepare("SELECT * FROM active_sessions WHERE email = ?");
            $sessionCheck->bind_param("s", $email);
            $sessionCheck->execute();
            $activeSessions = $sessionCheck->get_result();

            $isDeviceUnique = true;
            while($session = $activeSessions->fetch_assoc()){
                if($session['device_id'] == session_id()){
                    $isDeviceUnique = false;
                    break;
                }
            }    

            if($isDeviceUnique){
                $sessionCheck = $conn->prepare("SELECT * FROM active_sessions WHERE email = ?");
                $sessionCheck->bind_param("s", $email);
                $sessionCheck->execute();
                $activeSessionsDevice = $sessionCheck->get_result()->num_rows;
                if( $activeSessionsDevice< 2){ // Check if number of devices is less than 2
                    $insertSession = $conn->prepare("INSERT INTO active_sessions (email, device_id) VALUES (?, ?)");
                    $insertSession->bind_param("ss", $row['email'], session_id());
                    $insertSession->execute();
                
                    // Set device_id as a cookie
                    setcookie("device_id", session_id(), [
                        'expires' => time() + 31536000,
                        'path' => '/',
                        'domain' => '',
                        'secure' => true,
                        'httponly' => true,
                        'samesite' => 'Strict'
                    ]);
                
                    header("Location: ../pages/diagnozlistpage.php");
                    exit();
                }else{
              
                session_destroy();
                setcookie("device_id", "", time() - 3600, '/');
                setcookie("PHPSESSID", "", time() - 3600, '/');
                header("Location: ../pages/loginresponse/maxdevices.php");
                exit();};
            } else {
                header("Location: ../pages/diagnozlistpage.php");
            }
        } else {
            header("Location: ../pages/loginresponse/incorrectpwd.php");
        }
    } else {
        header("Location: ../pages/loginresponse/incorrectpwd.php");
    }
}

?>
