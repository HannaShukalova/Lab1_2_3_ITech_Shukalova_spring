<?php
include("bd.php");
$nurseToShow=$_POST['nurseToShow'];

$res = $mysqli->query("SELECT name FROM nurse");
		$res->data_seek(0);
		while ($myrow = $res->fetch_assoc())
		{
			$nurses=$nurses."<option>".$myrow['name']."</option>";
		}
		$res = $mysqli->query("SELECT nurse.name as 'nname', ward.name as 'wname' FROM ward LEFT JOIN nurse_ward ON ward.id_ward = nurse_ward.fid_ward LEFT JOIN nurse ON nurse_ward.fid_nurse = nurse.id_nurse");
		$res->data_seek(0);
		while ($myrow = $res->fetch_assoc())
		{
			if ($nurseToShow==$myrow['nname']){
				$table=$table."<tr><td>".$myrow['wname']."</td><td>".$nurseToShow."</td></tr>";
				
			}
		}
?>
<!DOCTYPE HTML>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>ЛБ 1(Ward by name)</title>
  <link href="external.css" rel="stylesheet">
 </head>
 <body>

<div class="navigation">
<form action="wardbynurse.php" method="post">
<a style="margin-left: 50px;">Выберите медсестра:</a><br>
<span class="custom-dropdown big">
    <select name="nurseToShow">    
        <option selected="selected"  disabled>Медсестра</option>
		<?php echo $nurses ?>
    </select>
</span><input class="btn third" type="submit" value="Загрузить" />
</form>
<table id="myTable" class="table_dark">
   <tr>
    <th>Палата</th>
    <th>Медсестра</th>
   </tr>
   <?php echo $table; ?>
</table><br>
<?php echo $out;?>
</div>

 </body>
</html>
