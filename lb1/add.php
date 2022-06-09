<?php
include("bd.php");
$nurseToChange=$_POST['nurseToChange'];
$wardToChange=$_POST['wardToChange'];
$nname=$_POST['nname'];
$department=$_POST['department'];
$shift=$_POST['shift'];
$wname=$_POST['wname'];
$maxidnurse=0;
$maxidward=0;
//echo $raceDist;
$date = date("Y-m-d");
$res = $mysqli->query("SELECT * FROM nurse");
		$res->data_seek(0);
		while ($myrow = $res->fetch_assoc())
		{
			if ($nurseToChange==$myrow['name'])
				$nurseToChange=$myrow['id_nurse'];
			if ($maxidnurse<=$myrow['id_nurse'])
				$maxidnurse=$myrow['id_nurse']+1;
		}
		$res = $mysqli->query("SELECT * FROM ward");
		$res->data_seek(0);
		while ($myrow = $res->fetch_assoc())
		{
			if ($wardToChange==$myrow['name'])
				$wardToChange=$myrow['id_ward'];
			if ($nurseToChange==$myrow['name'])
				$nurseToChange=$myrow['id_nurse'];
		}
if ($nname!=""){
	//echo "INSERT INTO nurse (id_nurse,name,date,department,shift) VALUES (".$maxidnurse.",'".$nname."','".$date."',".$department.",'".$shift."')";
	$mysqli->query("INSERT INTO nurse (id_nurse,name,date,department,shift) VALUES (".$maxidnurse.",'".$nname."','".$date."',".$department.",'".$shift."')");
}
if ($wname!=""){
	$mysqli->query("INSERT INTO ward (id_ward,name) VALUES (".$maxidward.",'".$wname."')");
}
if ($nurseToChange!=""){
	//echo "INSERT INTO nurse_ward (fid_nurse,fid_ward) VALUES (".$nurseToChange.",".$wardToChange.")";
	$mysqli->query("INSERT INTO nurse_ward (fid_nurse,fid_ward) VALUES (".$nurseToChange.",".$wardToChange.")");
}
$res = $mysqli->query("SELECT * FROM nurse");
		$res->data_seek(0);
		while ($myrow = $res->fetch_assoc())
		{
			if ($maxidnurse<$myrow['id_nurse'])
				$maxidnurse=$myrow['id_nurse'];
			$nurses=$nurses."<option>".$myrow['name']."</option>";
		}
		$res = $mysqli->query("SELECT * FROM ward");
		$res->data_seek(0);
		while ($myrow = $res->fetch_assoc())
		{
			$wards=$wards."<option>".$myrow['name']."</option>";
		}

?>
<!DOCTYPE HTML>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>ЛБ 1(Add)</title>
  <link href="external.css" rel="stylesheet">
 </head>
 <body>

<div class="navigation">

<form action="add.php" method="post">
<a style="margin-left: 100px;">Добавить медсестру:</a><br>
<input style="margin-left: 120px;" name="nname"  type="text" placeholder="Имя" /><br>
<input style="margin-left: 120px;" name="department"  type="text" placeholder="Департамент" pattern="-?[0-9]*(\.[0-9]+)?" /><br>
<span style="margin-left: 156px;" class="custom-dropdown big">
    <select name="shift">    
        <option selected="selected"  disabled>Shift</option>
        <option >First</option>
        <option >Second</option>
        <option >Third</option>
    </select>
</span>
<input class="btn third" style="margin-left: 130px;" type="submit" value="Добавить" />
</form>
<form action="add.php" method="post">
<a style="margin-left: 100px;">Добавить палату:</a><br>
<input style="margin-left: 120px;" name="wname"  type="text" placeholder="Имя" /><br>
<input class="btn third" style="margin-left: 130px;" type="submit" value="Добавить" />
</form>
<form action="add.php" method="post">
<a style="margin-left: 100px;">Добавить дежурство:</a><br>
<span style="margin-left: 60px;" class="custom-dropdown big">
    <select name="nurseToChange">    
        <option selected="selected"  disabled>Nurse</option>
		<?php echo $nurses ?>
    </select>
</span>
<span style="margin-left: 60px;" class="custom-dropdown big">
    <select name="wardToChange">    
        <option selected="selected"  disabled>Ward</option>
		<?php echo $wards ?>
    </select>
</span>
<input class="btn third" style="margin-left: 130px;" type="submit" value="Добавить" />
</form>
</div>

 </body>
</html>
