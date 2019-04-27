<?php

include_once ('../connection.php');

$status = array("status" => false, "message" => "");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['student_name']) && isset($_POST['student_email']) && isset($_POST['student_phone'])) {

		$name = $_POST['student_name'];
		$email = $_POST['student_email'];
		$phone = $_POST['student_phone'];

		if (!empty($name) && !empty($email) && !empty($phone)) {

			$query = "INSERT INTO students (name, email, phone) VALUES ('$name', '$email', $phone)";

			$result = mysqli_query($connection, $query);

			if ($result != false) {
				$status["status"] = true;
				$status["message"] = "Added Successfully";
				echo json_encode($status);
			} else {
				$status["message"] = "Internal Server Error";
				echo json_encode($status);
			}
		} else {
			$status["message"] = "Some Data are Missing";
			echo json_encode($status);
		}
	} else {
		$status["message"] = "Some Data are Missing";
		echo json_encode($status);
	}
} else {
	$status["message"] = "Method is not Allowed";
	echo json_encode($status);
}
?>