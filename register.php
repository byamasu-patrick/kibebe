<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - Kibebe</title>
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
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-register-image" style="background-image: url(&quot;assets/img/31154317_1703477709717471_8175937003506892800_n.jpg&quot;);"></div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Create an Account!</h4>
                            </div>
                            <form class="user" method="post" action="account/kibebe_user.php">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" id="FirstName"  minlength="3" required="" placeholder="First Name" name="first_name"></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="text" id="FirstName" required="" minlength="3" placeholder="Last Name" name="last_name"></div>
                                </div>
                                <div class="form-group"><input class="form-control form-control-user" type="number" id="phone" placeholder="PhoneNumber" name="phone_number" required="" minlength="10"></div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="password" required="" minlength="6" id="password" placeholder="Password" name="password"></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="password" id="RepeatPasswordInput" minlength="6" placeholder="Repeat Password" oninput="validateConfirmation(this)" name="password_repeat"></div>
                                </div><button class="btn btn-primary btn-block text-white btn-user" type="submit" name="register">Register Account</button>
                                <hr>
                            </form>
                            <div class="text-center"><a class="small" href="forgot-password.php">Forgot Password?</a></div>
                            <div class="text-center"><a class="small" href="login.php">Already have an account? Login!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script language="javascript">
	function validateConfirmation(input){
		if(input.value != document.getElementById('password').value){
			input.setCustomValidity("the two password doesnt match");
		}
		else{
			input.setCustomValidity('');
		}
	}
</script>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-charts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/Table-with-search-1.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>