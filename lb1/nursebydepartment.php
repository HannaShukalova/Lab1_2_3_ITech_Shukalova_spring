<?php
include("bd.php");
$departmentToShow=$_POST['departmentToShow'];

$res = $mysqli->query("SELECT DISTINCT department FROM nurse");
		$res->data_seek(0);
		while ($myrow = $res->fetch_assoc())
		{

			$department=$department."<option>".$myrow['department']."</option>";
		}
if ($stmt = $mysqli->prepare("SELECT name FROM nurse WHERE department=?")) {

$stmt->bind_param("s", $departmentToShow); /* связываем параметр */
$stmt->execute(); /* исполняем запрос */
//var_dump($stmt);
$stmt->bind_result($nurse); /* прикрепляем результаты*/
while ($stmt->fetch()) {
	$table=$table."<tr><td>".$nurse."</td><td>".$departmentToShow."</td></tr>";
}
$stmt->fetch(); //printf("%s находится в %s\n", $city, $district);
$stmt->close();
}
?>
<!DOCTYPE HTML>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>ЛБ 1(Nurse by department)</title>
  <link href="external.css" rel="stylesheet">
 </head>
 <body>

<div class="navigation">
<form action="nursebydepartment.php" method="post">
<a style="margin-left: 50px;">Выберите Department:</a><br>
<span class="custom-dropdown big">
    <select name="departmentToShow">    
        <option selected="selected"  disabled>Department</option>
		<?php echo $department ?>
    </select>
</span><input class="btn third" type="submit" value="Загрузить" />
</form>
<table id="myTable" class="table_dark">
   <tr>
    <th>Медсестра</th>
    <th>Департамент</th>
   </tr>
   <?php echo $table; ?>
</table><br>
<?php echo $out;?>
</div>

 </body>
</html>
