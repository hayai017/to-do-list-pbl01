<!DOCTYPE html> 
<html lang="ja"> 
<head> 
<meta charset="UTF-8"/> 
</head> 
<body>
<?php

$fw = fopen("emailaddress.txt", "w");
foreach ($_GET as $key => $val){
  fwrite( $fw, $val . "\n");
}
fclose($fw);
?>
<script type="text/javascript">
location.href="homeE.php"; //ホーム画面のファイル名に変えてください
</script>
</body> 
</html>
