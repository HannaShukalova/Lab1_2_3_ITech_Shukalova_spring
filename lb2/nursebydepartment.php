<?php
$departmentToShow=$_POST['departmentToShow'];
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
		if (stripos($table, $item['nurse'])===false)
			$table=$table."<tr><td>".$item['nurse']."</td><td>".$departmentToShow."</td></tr>";
	}
	if (stripos($departments, strval($item['department']))===false)
	$departments=$departments."<option>".$item['department']."</option>";
}
?>
<!DOCTYPE HTML>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>ЛБ 2(Медсестра по департаменту)</title>
  <link href="external.css" rel="stylesheet">
 </head>
 <body>

<div class="navigation">
<form action="nursebydepartment.php" method="post">
<a style="margin-left: 50px;">Выберите департамент:</a><br>
<span class="custom-dropdown big">
    <select name="departmentToShow">    
        <option selected="selected"  disabled>Департамент</option>
		<?php echo $departments ?>
    </select>
</span><input class="btn third" type="submit" value="Загрузить" />
</form>
<table id="myTable" class="table_dark">
   <tr>
    <th>Медсестра</th>
    <th>Департамент</th>
   </tr>
   <?php echo $table; ?>
</table>
</div>

 </body>
</html>