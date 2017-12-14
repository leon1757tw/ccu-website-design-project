<?PHP
    require_once('../database.php');

    $db = new DBController();

    extract($_POST);
    
    if(isset($login)){
        $result = $db->queryDB("SELECT * FROM account WHERE username = ? AND password = ?", 
                                array($username, $password));
        session_start();
        if(!empty($result)){
            $_SESSION["login_user"] = $username;
            header("Location:");
            echo "Login Successful";
        }
    }
    else if(isset($register)){
        $result = $db->executeDB("INSERT INTO account VALUES (?, ?, ?, ?)", 
                                array($username, $password, $email, $phone));
        if($result){
            header("Location:");
            echo "Sign Up Successful";
        }      
    }
    else{
        header("Location:");
    }

?>