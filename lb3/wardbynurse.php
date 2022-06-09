<?php
include("bd.php");
$nurseToShow=$_POST['nurseToShow'];

$res = $mysqli->query("SELECT name FROM nurse");
		$res->data_seek(0);
		while ($myrow = $res->fetch_assoc())
		{
			$nurses=$nurses."<option>".$myrow['name']."</option>";
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
				var table="";
				let newLine=0;
				JSON.parse(this.responseText, function(k, v) {
					if (v.toString().indexOf(',')==-1){
					 	if (newLine==0){
							newLine = 1;
							table += "<tr><td>" +v+"</td>";
						}else{
							newLine = 0;
							table += "<td>" +v+"</td></tr>";
						}
						console.log("k="+k);
						console.log("v="+v);
					}

				}); 
                document.getElementById("myTable").innerHTML = table;
            }
        };
        xmlhttp.open("GET","bdJson.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>ЛБ 1(Ward by name)</title>
  <link href="external.css" rel="stylesheet">
 </head>
 <body>

<div class="navigation">
<form action="wardbynurse.php" method="post">
<a style="margin-left: 50px;">Выберите медсестра:</a><br>
<span style="margin-left: 140px;" class="custom-dropdown big">
    <select onchange="showUser(this.value)" name="nurseToShow">    
        <option selected="selected"  disabled>Медсестра</option>
		<?php echo $nurses ?>
    </select>
	</span>
</form>

<table id="myTable" class="table_dark">
   <tr>
    <th>Палата</th>
    <th>Медсестра</th>
   </tr>
</table><br>
</div>

 </body>
</html>
