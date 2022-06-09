<?php
include("bd.php");
$arrayMoney = array();
$q = $_GET['q'];
		$res = $mysqli->query("SELECT nurse.name as 'nname', ward.name as 'wname' FROM ward LEFT JOIN nurse_ward ON ward.id_ward = nurse_ward.fid_ward LEFT JOIN nurse ON nurse_ward.fid_nurse = nurse.id_nurse");
		$res->data_seek(0);
		while ($myrow = $res->fetch_assoc())
		{
			if ($q==$myrow['nname']){
				rray_push($arrayMoney, "Ward", $myrow['wname']);
				rray_push($arrayMoney, "Nurse", $nurseToShow);
				$table=$table."<tr><td>".$myrow['wname']."</td><td>".$nurseToShow."</td></tr>";
				
			}
		}

		echo json_encode($arrayMoney);

?>
