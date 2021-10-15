<?php
    session_start();

    include("../database/db_manager.php");

    //Product CSV
    if(isset($_POST["productCSV"])){

        if(isset($_FILES["productsInformation"])){

            $sql_statement = "INSERT INTO id11496636_donline.product (Product_Id, Product_Name, Product_Price) VALUES (?, ?, ?)";
            $sql_connect = "INSERT INTO id11496636_donline.product_material_connect(Product_Id, Material_Id) VALUES (?, ?)";
            $sql_raw_material = "INSERT INTO id11496636_donline.raw_material(Material_Id, Material_Name, Material_Price) VALUES (?, ?, ?)";

            $newFileName = "../uploads/csv/products_". $_FILES["productsInformation"]["name"];

            if(move_uploaded_file($_FILES["productsInformation"]["tmp_name"], $newFileName)){
                $file_read = fopen($newFileName, "r");

                $stmt = $db -> prepare($sql_statement);
                $connect_stmt = $db -> prepare($sql_connect);
                $material_stmt = $db -> prepare($sql_raw_material);
                    $first_row = fgetcsv($file_read, ",")[0];

                    if($first_row == "Product"){
                        while(($data = fgetcsv($file_read, ",")) != FALSE){
                            save_product($data, $stmt, $connect_stmt);
                        }
                        header("refresh:0; ../products.php?success=true");
                    }
                    else if($first_row == "Raw Material"){

                        while(($data = fgetcsv($file_read, ",")) != FALSE){
                            save_material($data, $material_stmt);

                        }
                        header("refresh:0; ../products.php?success=true");

                    }else{
                        header("refresh:0; ../products.php?success=false");
                    }

            }
            else{
                echo "Not moved";
                //header("Location:../products.php");
            }
        }
    }


     //Profile picture
    if(isset($_POST["change_picture"])){

        if(isset($_FILES["profile"])){

            $newFileName = "../user_images/profile/".str_replace(" ","_",$_SESSION['user']).$_FILES["profile"]["name"];
            $phone = $_SESSION["userPhoneNumber"];

            if(move_uploaded_file($_FILES["profile"]["tmp_name"], $newFileName)){

               $sql = "UPDATE `kibebe_Person` SET `profile_Picture` = ? WHERE `Phone_Number` = ?";
               $sql = "UPDATE `kibebe_Person` SET `profile_Picture`= ? WHERE Phone_Number = ?";
                $data = $db->prepare($sql);
                $newFileName = str_replace("../","",$newFileName);
                $input = $data->execute([$newFileName, $phone ]);

                if($input){
                    $_SESSION["userProfile"] = $newFileName;
                    $_SESSION['pictureUpload'] = "Image changed successful";
                    header("Location:../profile.php");

                }else{
                    $_SESSION['pictureUpload'] = "Not saved";
                    header("Location:../profile.php");
                }
            }
            else{
                    $_SESSION['pictureUpload'] = "Failed to move";
                header("Location:../profile.php");
            }
        }else{
                    $_SESSION['pictureUpload'] = "No picture";
                header("Location:../profile.php");
        }
    }

    if(isset($_FILES['files'])){
        #Name, Age, Gender, Nationality, Type of Arts, Phone Number, Group
         $newFileName = "../uploads/csv/artisan_". $_FILES["files"]["name"][0];

            if(move_uploaded_file($_FILES["files"]["tmp_name"][0], $newFileName)){
                $file_read = fopen($newFileName, "r");
                $first_row = fgetcsv($file_read, ",");

              //  var_dump($first_row);
                if(htmlspecialchars(trim($first_row[0])) == "Name" && htmlspecialchars(trim($first_row[4])) == "Type of Arts"){
                    while(($data = fgetcsv($file_read, ",")) != FALSE){
                        // Inserting Data
                        save_artisan($db, $data);
                        header("Location: ../user_control.php");
                    }
                }
            }
      //  echo "Arrived";
    }
    function save_product($data, $stmt, $connect_stmt){
        $stmt -> execute(
            [
                htmlspecialchars(trim($data[0])),
                htmlspecialchars(trim($data[1])),
                htmlspecialchars(trim($data[2]))
            ]);
                    $product_id = $data[0];

                    unset($data[0]);
                    unset($data[1]);
                    unset($data[2]);

                    $data = array_values($data);
                    $i = 0;
                    while($i < count($data)){
                        $connect_stmt -> execute([$product_id, htmlspecialchars(trim($data[$i]))]);
                        $i++;
                    }
    }
    function save_material($data, $stmt){
        $stmt -> execute([
            htmlspecialchars(trim($data[0])),
            htmlspecialchars(trim($data[1])),
            htmlspecialchars(trim($data[2]))]);

                    unset($data[0]);
                    unset($data[1]);
                    unset($data[2]);
    }
    function save_artisan($db, $data){
        //
        $sql = "INSERT INTO kibebe_artisan (`artisan_name`, `artisan_age`, `artisan_gender`, `artisan_nationality`,
          `artisan_type_of_arts`, `artisan_phone_number`, `artisan_group`, `artisan_timestamp`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $db -> prepare($sql);

        $stmt -> execute([
          htmlspecialchars(trim($data[0])),
          htmlspecialchars(trim($data[1])),
          htmlspecialchars(trim($data[2])),
          htmlspecialchars(trim($data[3])),
          htmlspecialchars(trim($data[4])),
          htmlspecialchars(trim($data[5])),
          htmlspecialchars(trim($data[6])),
          date("Y-m-d H:i:s"),]);
    }
?>
