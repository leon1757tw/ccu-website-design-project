<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="member_password.css" type="text/css">
</head>
<body>		
	<div>
        <h1>會員專區</h1>        
        <a href = "member_information.html">修改資料</a><br>
        <a href = "member_password.html">修改密碼</a><br>
        <form action="" method="post">
            請輸入原密碼 : <input type="password"><br><!--判斷密碼是否正確-->
            請輸入新密碼 : <input type="password"><br>
            確認新密碼 : <input type="password"><br><!--錯誤顯示"輸入錯誤 請重新輸入"-->
            <input type="submit" value="修改"> 
        </form>
	</div>
</body>
</html>


