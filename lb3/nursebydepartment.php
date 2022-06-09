<?php
include("bd.php");
$departmentToShow=$_POST['departmentToShow'];

$res = $mysqli->query("SELECT DISTINCT department FROM nurse");
		$res->data_seek(0);
		while ($myrow = $res->fetch_assoc())
		{
			$department=$department."<option>".$myrow['department']."</option>";
		}
?>
<!DOCTYPE HTML>
<html>
 <head>
  <script>
function loadDoc(str) {
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
                var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						myFunction(this);
					}
				};
				xhttp.open("GET", "data.xml", true);
				xhttp.send();
            }
        };
        xmlhttp.open("GET","bdXML.php?q="+str,true);
        xmlhttp.send();
    }

}
function myFunction(xml) {
  var i;
  var xmlDoc = xml.responseXML;
  var table="<tr><th>Медсестра</th><th>Департамент</th></tr>";
  var x = xmlDoc.getElementsByTagName("Nurse");
  for (i = 0; i <x.length; i++) { 
    table += "<tr><td>" +
    x[i].getElementsByTagName("Name")[0].childNodes[0].nodeValue +
    "</td><td>";
    table +=x[i].getElementsByTagName("Department")[0].childNodes[0].nodeValue+"</td></tr>";
  }
  document.getElementById("myTable").innerHTML = table;
}
</script>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>ЛБ 1(Nurse by department)</title>
  <link href="external.css" rel="stylesheet">
 </head>
 <body>

<div class="navigation">
<form action="nursebydepartment.php" method="post">
<a style="margin-left: 50px;">Выберите Department:</a><br>
<span style="margin-left: 140px;" class="custom-dropdown big">
    <select onchange="loadDoc(this.value)"  name="departmentToShow">    
        <option selected="selected" disabled>Department</option>
		<?php echo $department ?>
    </select>
</span>
</form>
<table id="myTable" class="table_dark">
</table><br>

</div>

 </body>
</html>
