<?php
include("bd.php");
$q = $_GET['q'];
$dom = new DomDocument('1.0', 'UTF-8'); 
$cars = $dom->createElement('Nurses');
$res = $mysqli->query("SELECT * FROM nurse");
		$res->data_seek(0);
		while ($myrow = $res->fetch_assoc())
		{
			if ($q==$myrow['department']){
				$root = $dom->createElement('Nurse');
				$child_node_name = $dom->createElement('Name', $myrow['name']);
				$root->appendChild($child_node_name);
				$child_node_text = $dom->createElement('Department', $q);
				$root->appendChild($child_node_text);
				$cars->appendChild($root);
				//$table=$table."<tr><td>".$myrow['name']."</td><td>".$departmentToShow."</td></tr>";
				
			}
		}
	$dom->appendChild($cars);
    $dom->formatOutput = true;
    $test1 = $dom->saveXML(); // put string in test1
    $dom->save('data.xml'); // save as file
	echo $test1;
?>