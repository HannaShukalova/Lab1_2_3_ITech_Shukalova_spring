<?php
include("bd.php");
$shiftToShow=$_POST['shiftToShow'];

$res = $mysqli->query("SELECT DISTINCT shift FROM nurse");
		$res->data_seek(0);
		while ($myrow = $res->fetch_assoc())
		{
			$shifts=$shifts."<option>".$myrow['shift']."</option>";
		}

?>
<!DOCTYPE HTML>
<html>
 <head>
  <script>
function showUser(str) {
	//document.write(str+"q");
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","bdAjax.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>ЛБ 1(Nurse by ward)</title>
  <link href="external.css" rel="stylesheet">
 </head>
 <body>

<div class="navigation">
<form action="allbyshift.php" method="post">
<a style="margin-left: 50px;">Выберите shift:</a><br>
<span style="margin-left: 100px;" class="custom-dropdown big">
    <select onchange="showUser(this.value)" name="shiftToShow">    
        <option selected="selected"  disabled>Shift</option>
		<?php echo $shifts ?>
    </select>
</span>
</form>
<div id="txtHint"><b></b></div>
</div>

 </body>
</html>
