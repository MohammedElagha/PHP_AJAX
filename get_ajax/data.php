<?php

include_once('../connection.php');

$query = "SELECT * FROM students";
$result = mysqli_query($connection, $query);

$data = array();

if ($result != false) {
	if ($result->num_rows > 0) {
		$count = 0;
		while ($row = $result->fetch_assoc()) {
			$data[$count]["id"] = $row["id"];
			$data[$count]["name"] = $row["name"];
			$data[$count]["email"] = $row["email"];
			$data[$count]["phone"] = $row["phone"];

			$count++;
		}
	}
}

echo json_encode($data);

?>