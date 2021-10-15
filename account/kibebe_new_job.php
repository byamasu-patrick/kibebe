<?php
	session_start();
	include("../database/db_manager.php");

	if(isset($_POST['product_name']) && isset($_POST['quantity']) && isset($_POST['customer_type']) && isset($_POST['finish_date']) && isset($_POST['led_by']) && isset($_POST['group_id'])){
		//sql statement for inserting new data
		$sql = "INSERT INTO id11496636_donline.kibebe_jobs(Job_Product_Name, Job_Customer_Type, Job_Leader_Name, Job_Quantity, Job_Complete_On, Job_Group_By, Job_Timestamp) VALUES (?, ?, ?, ?, ?, ?, ?)";

		$product_name = htmlspecialchars(trim($_POST['product_name']));
		$quantity = (int) htmlspecialchars(trim($_POST['quantity']));
		$customer_type = htmlspecialchars(trim($_POST['customer_type']));
		$finish_date = htmlspecialchars(trim($_POST['finish_date']));
		$led_by = htmlspecialchars(trim($_POST['led_by']));
		$group_id = htmlspecialchars(trim($_POST['group_id']));
		$current_time = date("y-m-d H:i:s");

		$stmt = $db -> prepare($sql);
		#
		$stmt -> execute([
			$product_name,
			$customer_type,
			$led_by,
			$quantity,
			$finish_date,
			$group_id,
			$current_time
		]);
		//var_dump($_POST);
		header("Location: ../index.php");
	}
	# product_name, quantity, customer_type, finish_date, led_by, group_id
	if(isset($_POST['product']) && isset($_POST['quantity_number'])){
		$product_name = htmlspecialchars(trim($_POST['product']));
		$quantity_number = (int) htmlspecialchars(trim($_POST['quantity_number']));

		$sql = "SELECT * FROM id11496636_donline.product WHERE Product_Name = ?";

		$stmt = $db -> prepare($sql);
		$stmt -> execute([$product_name]);

		//echo $product_name;
		if($data = $stmt -> fetch(PDO::FETCH_ASSOC)){
			$total_amount = $data['Product_Price'] * $quantity_number;
			echo $total_amount;
		}
	}