<!DOCTYPE html> 
<html lang="ja"> 
<head> 
<meta charset="UTF-8"/> 

<script type="text/javascript"> 
function clock(){
  var date = new Date();
  var week = [ "日", "月", "火", "水", "木", "金", "土" ] ;
  document.form.ordertime.value = 
  (date.getYear()+1900) + "年" + (date.getMonth()+1) + "月" + date.getDate() + "日(" + week[date.getDay()] + ")" + date.getHours() + "時" + date.getMinutes() + "分";
  setTimeout("clock()",1000);
}
function btnPressed(x){
location.href = "./homeE.php?date=" + x;
}
</script>
<?php
$date = $_GET['date'];
$param_json = json_encode($date);
?>
<script>
  var date = new Date();
  var get_day = date.getDate();
  var param = JSON.parse('<?php echo $param_json; ?>'); 
  if ( param == null ){
    param = get_day;
  }
  console.log(param);
</script>

<script type="text/javascript" src="https://zeptojs.com/zepto.min.js"></script>
<script type="text/javascript">
function list( date ){ 
 $.get("schedule.txt",function(data){ 
 var a = data.split("\n"); //改行で区切る 
 var table = "<table border=1 cellspacing=0 cellpadding=2 width='600' align='center'>";
 table += "<tr><td align='center' colspan=3>2022年7月" + date + "日の予定</td></tr>"
 for(i=0;i<a.length-1;i++){ 
 var b = a[i].split(","); //カンマで区切る
 if ( b[0] == '2022' && b[1] == '7' && b[2] == date ){ 
 table += "<tr><td width='20' align='center'><input type='checkbox' value='"+i+"' </input>" + "</td><td>" 
 + b[3] + "</td><td align='center' class='delete'><button type='button' value='"+i+"' onClick='Delete(this.value)'>削除</button>" + "</td></tr>"; 
 } 
 }
 table += "</table>"; 
 document.getElementById("schedule").innerHTML = table; 
 });
}

function Delete(num){
  var Url = "delete_list.html?num=" + num;
  location.href= Url;
} 
</script>

<script type="text/javascript" src="add.js">
</script>

<script type="text/javascript" src="detail.js">
</script>

<style type="text/css">
   .background{
        background: linear-gradient(#ffffff, #fffaf0);
        background: -moz-linear-gradient(#ffffff, #fffaf0);
        background: -webkit-linear-gradient(#ffffff, #efffaf0);
   }
   .date {
        width: 90px;
        padding: 30px;
        background: #faf0e6;
        font-size: 20px;
        cursor: pointer;
    }
    .sun{
        color:red;
             width: 90px;
        padding: 30px;
        background: #faf0e6;
        font-size: 20px;
        cursor: pointer;
    }
    .sat{
        color:blue;
        width: 90px;
        padding: 30px;
        background: #faf0e6;
        font-size: 20px;
        cursor: pointer;
    }
    .date:hover{
        background: #faebd7;
　　}
    .sun:hover{
        background: #faebd7;
　　}
    .sat:hover{
        background: #faebd7;
　　}
    .time{
        width:500px;
        height:50px;
        font-size:30px;
        text-align:center;
    }
    .day{
        width:23px;
        height:20px;
        font-size:20px;
        text-align:center;
    }
    .add{
        width:300px;
        height:50px;
        font-size:30px;
        text-align:center; 
        background:#faf0e6;
        margin-right:60px;
        cursor: pointer;
    }
    .add:hover{
        background: #faebd7;
    }
    .delete{
        width:100px;
        height:30px;
        font-size:15px;
        text-align:center; 
        background:#faf0e6;
        cursor: pointer;
    }
    .delete:hover{
        background: #faebd7;
    }
</style>
</head> 

<body>
<div id="e"></div>


<form name="form" action="3.php" method="POST"> 

<div class="background">
<div align="center">

<input type="text" style = border:none; name="ordertime" class="time" readonly>
<script type="text/javascript">
  clock(); 
</script>

<br>

<div align="right">
<input type="button" name="add" value="予定の追加" class="add" align="center" onclick="location.href='./add_list.html'">
</div>

<div style="font-size:20px;">
</div>
</div>
<br>
<script type="text/javascript"> 
 list(param); 
</script>

<div id="schedule"></div>
<div align="center">

<br>

<table border="1" style="border-collapse: collapse" bgcolor="white">
        <tr>
            <th align="center" colspan="7">
                <h1>July 2022</h1>
            </th>
        </tr>
        <tr>
            <th>Sun.</th>
            <th>Mon.</th>
            <th>Tue.</th>
            <th>Wed.</th>
            <th>Thu.</th>
            <th>Fri.</th>
            <th>Sat.</th>
        </tr>
        <tr>
            <td>
               &nbsp;
            </td>
            <td>
                &nbsp;
            </td>
            <td>
                &nbsp;
            </td>
            <td>
                &nbsp;
            </td>
            <td>
                &nbsp;
            </td>
            <td>
                <input type="button" value="1" onClick="btnPressed('1')" class="date">
            </td>
            <td>
                <input type="button" value="2" onClick="btnPressed('2')" class="sat">
            </td>       
        </tr>
        <tr>
            <td>
                <input type="button" value="3" onClick="btnPressed('3')" class="sun">
            </td>
            <td>
                <input type="button" value="4" onClick="btnPressed('4')" class="date">
            </td>
            <td>
                <input type="button" value="5" onClick="btnPressed('5')" class="date">
            </td>
            <td>
                <input type="button" value="6" onClick="btnPressed('6')" class="date">
            </td>
            <td>
                <input type="button" value="7" onClick="btnPressed('7')" class="date">
            </td>
            <td>
                <input type="button" value="8" onClick="btnPressed('8')" class="date">
            </td>
            <td>
                <input type="button" value="9" onClick="btnPressed('9')"  class="sat">
            </td>
        </tr>
        <tr>
            <td>
                <input type="button" value="10" onClick="btnPressed('10')" class="sun">
            </td>
            <td>
                <input type="button" value="11" onClick="btnPressed('11')" class="date">
            </td>
            <td>
                <input type="button" value="12" onClick="btnPressed('12')" class="date">
            </td>
            <td>
                <input type="button" value="13" onClick="btnPressed('13')" class="date">
            </td>
            <td>
                <input type="button" value="14" onClick="btnPressed('14')" class="date">
            </td>
            <td>
                <input type="button" value="15" onClick="btnPressed('15')" class="date">
            </td>
            <td>
                <input type="button" value="16" onClick="btnPressed('16')" class="sat">
            </td>
        </tr>
        <tr>
            <td>
                <input type="button" value="17" onClick="btnPressed('17')" class="sun">
            </td>
            <td>
                <input type="button" value="18" onClick="btnPressed('18')" class="date">
            </td>
            <td>
                <input type="button" value="19" onClick="btnPressed('19')" class="date">
            </td>
            <td>
                <input type="button" value="20" onClick="btnPressed('20')" class="date">
            </td>
            <td>
                <input type="button" value="21" onClick="btnPressed('21')" class="date">
            </td>
            <td>
                <input type="button" value="22" onClick="btnPressed('22')" class="date">
            </td>
            <td>
                <input type="button" value="23" onClick="btnPressed('23')"  class="sat">
            </td>
        </tr>
        <tr>
            <td>
                <input type="button" value="24" onClick="btnPressed('24')" class="sun">
            </td>
            <td>
                <input type="button" value="25" onClick="btnPressed('25')" class="date">
            </td>
            <td>
                <input type="button" value="26" onClick="btnPressed('26')" class="date">
            </td>
            <td>
                <input type="button" value="27" onClick="btnPressed('27')" class="date">
            </td>
            <td>
                <input type="button" value="28" onClick="btnPressed('28')" class="date">
            </td>
            <td>
                <input type="button" value="29" onClick="btnPressed('29')" class="date">
            </td>
            <td>
                <input type="button" value="30" onClick="btnPressed('30')" class="sat">
            </td>
        </tr>
        <tr>
            <td>
                <input type="button" value="31" onClick="btnPressed('31')" class="sun">
            </td>
            <td>
                &nbsp;
            </td>
            <td>
                &nbsp;
            </td>
            <td>
                &nbsp;
            </td>
            <td>
                &nbsp;
            </td>
            <td>
                &nbsp;
            </td>
            <td>
                &nbsp;
            </td>
        </tr>

    </table>
    
</form> 
</div>
</div>
</body> 
</html>


