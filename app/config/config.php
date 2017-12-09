<?PHP
    define('DB_SERVER', '140.123.175.101');
    define('DB_DATABASE', 'team08');
    define('DB_USERNAME', 'team08');
    define('DB_PASSWORD', 'hotdog');
    
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    
    if(!$db){
        die("Connection Failed: " .mysqli_error());
    }
    mysqli_set_charset($db, "utf8");
?>
