<?php
include("bd.php");
$shiftToShow=$_POST['shiftToShow'];

$res = $mysqli->query("SELECT DISTINCT shift FROM nurse");
		$res->data_seek(0);
		while ($myrow = $res->fetch_assoc())
		{
			$shifts=$shifts."<option>".$myrow['shift']."</option>";
		}
		$res = $mysqli->query("SELECT nurse.name as 'nname', ward.name as 'wname' FROM ward LEFT JOIN nurse_ward ON ward.id_ward = nurse_ward.fid_ward LEFT JOIN nurse ON nurse_ward.fid_nurse = nurse.id_nurse WHERE shift='".$shiftToShow."'");
		$res->data_seek(0);
		while ($myrow = $res->fetch_assoc())
		{
			
			$table=$table."<tr><td>".$myrow['nname']."</td><td>".$myrow['wname']."</td><td>".$shiftToShow."</td></tr>";

		}
?>
<!DOCTYPE HTML>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>ЛБ 1(Nurse by ward)</title>
  <link href="external.css" rel="stylesheet">
 </head>
 <body>

<div class="navigation">
<form action="allbyshift.php" method="post">
<a style="margin-left: 50px;">Выберите shift:</a><br>
<span class="custom-dropdown big">
    <select name="shiftToShow">    
        <option selected="selected"  disabled>Shift</option>
		<?php echo $shifts ?>
    </select>
</span><input class="btn third" type="submit" value="Загрузить" />
</form>
<table id="myTable" class="table_dark">
   <tr>
    <th>Медсестра</th>
    <th>Палата</th>
    <th>Смена</th>
   </tr>
   <?php echo $table; ?>
</table><br>
<?php echo $out;?>
</div>

 </body>
</html>
