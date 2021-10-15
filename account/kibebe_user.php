<?php
    session_start();

    include("../database/db_manager.php");
    // $db = null;

    // try{
    //     $db = new PDO("mysql:host=localhost;dbname=id11496636_donline","id11496636_dzalekaonline","m0nk0ree");
    // }catch(Exception $e){

    // }

    $myI = explode('?', $_SERVER["REQUEST_URI"]);
    $values = end($myI);

    if(isset($_POST["login"])){
        //$_SESSION["user"] = "Flo Magambi";

        if(isset($_POST["phone_number"]) && isset($_POST["phone_number"])){

            $sql = "SELECT * FROM  id11496636_donline.kibebe_Person WHERE `Phone_Number`=? AND `Password` = ?";

            $call = $db->prepare($sql);
            $status = $call->execute([$_POST["phone_number"], $_POST["password"]]);

            if($call->rowCount() > 0){

                $data = $call->fetch(PDO::FETCH_ASSOC);
                $_SESSION["userId"] = $data["ID"];
                $_SESSION["user"] = $data["Full_Name"];
                $_SESSION["userProfile"] = $data["profile_Picture"];
                $_SESSION["userPhoneNumber"] = $data["Phone_Number"];

                header("Location:../index.php");
                //echo "<script language='javascript'>alert('".$status."');</script>";
                $json     = file_get_contents("http://ipinfo.io/".$_SERVER['REMOTE_ADDR']."/geo");
                $json     = json_decode($json, true);
                $country  = $json['country'];
                $region   = $json['region'];
                $city     = $json['city'];
                $location = $country ." - " . $region . " - ". $city;
                $sql = "INSERT INTO  id11496636_donline.kibebe_person ( `userPhone`, Location, `Date_logedIn`) VALUES (?,?,?)";
                $max = $db->prepare($sql);
                $close = $max->execute([$data['Phone_Number'],$location,  date('D, M d, Y - H:i:s')]);
            }
            else{
                header("Location:../login.php");
                //echo "<script language='javascript'>alert('".$status."');</script>";
            }
        }



    }


     if($values == "logout"){
        unset($_SESSION["user"]);
        unset($_SESSION["userProfile"]);
        unset($_SESSION["userPhoneNumber"]);
        header("Location:../login.php");
        //echo "Log out...";
    }



     if(isset($_POST["register"])){


        $full_name = $_POST["first_name"] ." ". $_POST["last_name"];
        $sql = "INSERT INTO  id11496636_donline.kibebe_Person ( Full_Name, Phone_Number, Password, profile_Picture , Date_Registered ) VALUES (?,?,?,?,?)";


        $data = $db->prepare($sql);
        $finalize = $data->execute([$full_name,$_POST["phone_number"],$_POST["password"],"user_images/profile/avatar_all.png", date(" D M d Y")]);

        if($finalize){

            header("Location:../login.php");


        }
        else{
            $_SESSION['r_name'] = $_POST['first_name'];
             $_SESSION['r_lname'] = $_POST['last_name'];
             $_SESSION['r_phone'] = $_POST['phone_number'];
             $_SESSION['r_pass'] = $_POST['password'];
            header("Location:../register.php");
        }
    }
?>
