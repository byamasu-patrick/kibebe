<?php
	
	include("database/db_manager.php");
	$sql = "SELECT * FROM id11496636_donline.product";
	$stmt = $db -> prepare($sql);

	$stmt -> execute();
	$product = "";
	while($data = $stmt -> fetch(PDO::FETCH_ASSOC)){
		$product .= '<option value="'. $data['Product_Name'] .'">'. $data['Product_Name'] .'</option>';
	}