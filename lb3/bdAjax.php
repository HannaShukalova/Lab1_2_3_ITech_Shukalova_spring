<!DOCTYPE html>
<html>
<head>
<link href="external.css" rel="stylesheet">
</head>
<body>

<?php
include("bd.php");
$q = $_GET['q'];
$res = $mysqli->query("SELECT nurse.name as 'nname', ward.name as 'wname' FROM ward LEFT JOIN nurse_ward ON ward.id_ward = nurse_ward.fid_ward LEFT JOIN nurse ON nurse_ward.fid_nurse = nurse.id_nurse WHERE shift='".$q."'");
$res->data_seek(0);
echo "<table id='myTable' class='table_dark'>
<tr>
<th>Медсестра</th>
<th>Палата</th>
<th>Смена</th>
</tr>";
while ($myrow = $res->fetch_assoc())
{
    echo "<tr>";
    echo "<td>" . $myrow['nname'] . "</td>";
    echo "<td>" . $myrow['wname'] . "</td>";
    echo "<td>" . $q . "</td>";
    echo "</tr>";

}
echo "</table>";

?>
</body>
</html>