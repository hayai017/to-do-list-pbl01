<!DOCTYPE html> 
<html lang="ja"> 
<head> 
<meta charset="UTF-8"/> 
</head> 
<body>  
<?php
$num = $_GET['num']; 
$f = file('schedule.txt');
unset($f[$num]);
file_put_contents('schedule.txt', $f);
?> 
削除が完了しました。<br><br> 
<a href="homeE.php">ホーム画面に戻る</a><br><br> 
</body> 
</html>
