<?php session_start(); if(!isset( $_SESSION["user"])){ header("Location:login.php"); }?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Kibebe</title>
    <link rel="icon" type="image/jpeg" sizes="200x200" href="assets/img/31154317_1703477709717471_8175937003506892800_n.jpg">
    <link rel="icon" type="image/jpeg" sizes="200x200" href="assets/img/31154317_1703477709717471_8175937003506892800_n.jpg">
    <link rel="icon" type="image/jpeg" sizes="200x200" href="assets/img/31154317_1703477709717471_8175937003506892800_n.jpg">
    <link rel="icon" type="image/jpeg" sizes="200x200" href="assets/img/31154317_1703477709717471_8175937003506892800_n.jpg">
    <link rel="icon" type="image/jpeg" sizes="200x200" href="assets/img/31154317_1703477709717471_8175937003506892800_n.jpg">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Drag--Drop-Upload-Form.css">
    <link rel="stylesheet" href="assets/css/Table-with-search-1-1.css">
    <link rel="stylesheet" href="assets/css/Table-with-search-1.css">
    <link rel="stylesheet" href="assets/css/custom-css.css">
    <script type="text/javascript">
       function setTotalAmount(quantityId){
            let productName = $("#product_name").val();
            let quantityNumber = $("#"+ quantityId).val();
            console.log(productName);
            $.ajax({
                url: "account/kibebe_new_job.php",
                data: {
                    "product": productName,
                    "quantity_number": quantityNumber
                },
                type: "POST",
                success: function(result){
                    let parsed_result = parseFloat(""+ result);
                    $("#total").text(" | Total amount : "+ parsed_result +" Mkw");
                    //console.log("Total amount is : "+ result);
                }
            });
        }
    </script>
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-shopping-bag"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Kibebe</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link <?php if($_SERVER["FILENAME"] == ""){echo 'active';}?>" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Home Page</span></a><a class="nav-link" href="new_job.php"><i class="fas fa-tasks"></i><span>New Job</span></a><a class="nav-link" href="user_control.php"><i class="fas fa-user-plus"></i><span>Import Artisan</span></a>
                        <a
                            class="nav-link" href="users.php"><i class="fas fa-users-cog"></i><span>Artisan Manage</span></a><a class="nav-link" href="products.php"><i class="fas fa-cart-plus"></i><span>Products Control</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
