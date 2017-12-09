<?PHP
    define('DB_SERVER', '140.123.175.101:3036');
    define('DB_USERNAME', 'team08');
    define('DB_PASSWORD', 'hotdog');
    define('DB_DATABASE', 'team08');

    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    if(!$db){
        die("Connection Failed" . mysql_connect_error());
    }
?>