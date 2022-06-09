<?php
$nurseToShow=$_POST['nurseToShow'];
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
	if ($item["nurse"]==$nurseToShow){
		$table=$table."<tr><td>".$item['ward']."</td><td>".$nurseToShow."</td></tr>";
	}
	if (stripos($nurses, $item['nurse'])===false)
	$nurses=$nurses."<option>".$item['nurse']."</option>";
}
?>
<!DOCTYPE HTML>
<html>
 <head>
    <script>
function addData(str) {
	
	if (localStorage.TempSave==null){
		localStorage.setItem("TempSave", str);
	}else{
		localStorage.setItem("TempSave", localStorage.TempSave+","+str);
	}
	
	
}
 </script>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>ЛБ 2(Палата по медсестре)</title>
  <link href="external.css" rel="stylesheet">
 </head>
 <body>

<div class="navigation">
<form action="wardbynurse.php" method="post">
<a style="margin-left: 50px;">Выберите медсестра:</a><br>
<span class="custom-dropdown big">
    <select name="nurseToShow" onchange="addData(this.value)">    
        <option selected="selected"  disabled>Медсестра</option>
		<?php echo $nurses ?>
    </select>
</span>
<span class="custom-dropdown big">
    <select id="mySelect" name="test" >    
        <option  selected="selected" disabled>Saved</option>
    </select>
</span>
<script>
  if (localStorage.getItem('TempSave')!=null){
	
	//alert(localStorage.getItem('TempSave'));
	var arrayOfStrings = localStorage.getItem('TempSave').split(",");
	//alert(arrayOfStrings);
	arrayOfStrings.forEach(addDataOption);

  }

function addDataOption(item) {
	//alert(item);
var x = document.getElementById("mySelect");
var option = document.createElement("option");
option.text = item;
x.add(option);
}
</script>
<input class="btn third" type="submit" value="Загрузить" />
</form>
<table id="myTable" class="table_dark">
   <tr>
    <th>Палата</th>
    <th>Медсестра</th>
   </tr>
   <?php echo $table; ?>
</table>
</div>

 </body>
</html>
