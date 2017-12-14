<?PHP
    require_once('../config/config.php');

    extract($_POST);
    
    if(isset($login)){
        try{
            $stmt = $db->prepare("SELECT * FROM account WHERE username = ? AND password = ?");
            $stmt->execute(array("123", "456"));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            echo "Database Error:" . $e->getMessage();
        }
        
        session_start();
        if($stmt->execute() && !empty($result)){
            $_SESSION["login_user"] = $username;
            echo "Login Successful";
            header("Location:");
        }
    }
    else if(isset($register)){
        try{
            $stmt = $db->prepare("INSERT INTO account VALUES (?, ?, ?, ?)");
            $stmt->execute(array($username, $password, $email, $phone));
        } catch (PDOException $e){
            echo "Database Error:" . $e->getMessage();
        }

        if($stmt->execute()){
            echo "Sign Up Successful";
        }
        header("Location:");
    }
    else{
        header("Location:");
    }
?>