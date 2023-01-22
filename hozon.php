<!DOCTYPE html> 
<html lang="ja"> 
<head> 
<meta charset="UTF-8"/> 
</head> 
<body>
<?php
if( isset($_POST['year']) &&isset($_POST['month']) &&isset($_POST['date']) &&isset($_POST['schedule']) ){
$fw = fopen("schedule.txt", "a"); // 追記する 
fwrite( $fw, $_POST['year'].",".$_POST['month'].",".$_POST['date'].",".$_POST['schedule']."\n"); 
fclose($fw);
} 
?>
<script type="text/javascript">
location.href="homeE.php"; //ホーム画面のファイル名に変えてください
</script>
</body> 
</html>
