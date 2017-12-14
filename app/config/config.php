<?PHP
    define('DB_SERVER', '140.123.175.101');
    define('DB_NAME', 'team08');
    define('DB_ACCOUNT', 'team08');
    define('DB_PASSWORD', 'hotdog');
    
    try{
        $db = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_NAME.';charset=utf8', DB_ACCOUNT, DB_PASSWORD);
        echo "Connection Successful";
    } catch ( PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
