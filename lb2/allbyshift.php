<?php
$departmentToShow=$_POST['departmentToShow'];
$shiftToShow=$_POST['shiftToShow'];
require_once __DIR__ . '/vendor/autoload.php';
$m = new MongoClient();
$db = $m->selectDB("dbforlab");
$rent =$db->duty;
$collections = $db->listCollections();

$cursor = $rent->find(
    [
    ]
);
//echo $timeToShow;
foreach ($cursor as $item) {
	if ($item["department"]==$departmentToShow){
		if ($item["shift"]==$shiftToShow){
			if (stripos($table, $item['nurse']."</td><td>".$item['ward'])===false)
			{
				$table=$table."<tr><td>".$item['nurse']."</td><td>".$item['ward']."</td><td>".$shiftToShow."</td><td>".$departmentToShow."</td></tr>";
			}
				
		}
	}
	if (stripos($departments, strval($item['department']))===false)
	$departments=$departments."<option>".$item['department']."</option>";
	if (stripos($shifts, strval($item['shift']))===false)
	$shifts=$shifts."<option>".$item['shift']."</option>";
}
?>
<!DOCTYPE HTML>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>ЛБ 2(All by shift and department)</title>
  <link href="external.css" rel="stylesheet">
 </head>
 <body>

<div class="navigation">
<form action="allbyshift.php" method="post">
<a style="margin-left: 10px;">Выберите смену и департамент:</a><br>
<span style="margin-left: 70px;" class="custom-dropdown big">
    <select name="shiftToShow">    
        <option selected="selected"  disabled>Смена</option>
		<?php echo $shifts ?>
    </select>
</span>
<span class="custom-dropdown big">
    <select name="departmentToShow">    
        <option selected="selected"  disabled>Департамент</option>
		<?php echo $departments ?>
    </select>
</span>
<input style="margin-left: 140px;" class="btn third" type="submit" value="Загрузить" />
</form>
<table id="myTable" class="table_dark">
   <tr>
    <th>Медсестра</th>
    <th>Палата</th>
    <th>Смена</th>
    <th>Отдел</th>
   </tr>
   <?php echo $table; ?>
</table>
</div>

 </body>
</html>