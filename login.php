<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Login/Register in Tabbed Interface - Bootsnipp.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">

    <style type="text/css">
        .modal-body {
			position: relative;
			overflow-y: auto;
			max-height: 700px;
			padding: 15px;
		}
		.row {
			margin:0px;
		}
		.col-md-6 {
			margin:0px;
			width:50% !important;
		}
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
	<script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>

    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
        <div class="span12">
    		<div class="" id="loginModal">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3>Have an Account?</h3>
				<?php echo "<p class='".((isset($_GET['s'])?"text-success":"text-error"))."'><b>".((isset($_GET['s'])?"Account created successfully.":"")).((isset($_GET['e'])?"Something went wrong, Try again later.":"")).((isset($_GET['le'])?"User credentials not match our record.":""))."</b></p>";?>
              </div>
              <div class="modal-body">
                <div class="well">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
                    <li><a href="#create" data-toggle="tab">Create Account</a></li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="login">
                      <form class="form-horizontal" id="login" action='index.php' method="POST">
                        <fieldset>
                          <div id="legend">
                            <legend class="">Login</legend>
                          </div>    
                          <div class="control-group">
                            <!-- Username -->
                            <label class="control-label"  for="username">Email</label>
                            <div class="controls">
                              <input type="email" id="username" name="Email" placeholder="" class="input-xlarge" required>
                            </div>
                          </div>     
                          <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" for="Password">Password</label>
                            <div class="controls">
                              <input type="Password" id="password" name="Password" placeholder="" class="input-xlarge" required>
                            </div>
                          </div>
                          <div class="control-group">
                            <!-- Button -->
                            <div class="controls">
                              <button type="submit" name="Submit" value="Login" class="btn btn-success pull-right">Login</button>
                            </div>
                          </div>
                        </fieldset>
                      </form>                
                    </div>
                    <div class="tab-pane fade" id="create">
                      <form id="tab" method="post" action="index.php" enctype="multipart/form-data">
						<div class="row">
						<div class="col-md-6">
                        <label>Profile Image</label>
                        <input type="file" name="Image" id="Image" value="" class="input-xlarge" required>
                        <label>First Name</label>
                        <input type="text" name="FirstName" id="FirstName"  value="" class="input-xlarge" required>
                        <label>Last Name</label>
                        <input type="text" value="" name="LastName" id="LastName" class="input-xlarge" required>
                        <label>Email</label>
                        <input type="email" name="Email" id="Email"  value="" class="input-xlarge" required>
						<label>Password</label>
                        <input type="passsword" name="Password" id="Password" value="" class="input-xlarge" required>
						<label>Confirm Password</label>
                        <input type="password" name="ConfirmPassword" id="ConfirmPassword" value="" class="input-xlarge"data-fv-identical="true" data-fv-identical-field="password" data-fv-identical-message="The password and its confirm are not the same" required>
						<label>Gender</label>
                        <input type="radio" name="Gender" id="Gender1"  value="Male" class="input-xlarge" checked>Male
						<input type="radio" name="Gender" id="Gender2"  value="Female" class="input-xlarge" checked>Female
                       
						</div>
						<div class="col-md-6">
						 <label>Address</label>
                        <textarea name="Address" rows="3" class="input-xlarge"></textarea>
						<label>Department</label>
                        <input type="text" name="Department" id="Department" value="" class="input-xlarge" required>
                        <label>Hire Date</label>
                        <input type="date" value="" name="HireDate" id="HireDate" class="input-xlarge" required>
                        <label>Date of Birth</label>
                        <input type="date" name="DateofBirth" id="DateofBirth"  value="" class="input-xlarge" required>
						<label>Phone No</label>
                        <input type="text" name="PhoneNo" id="PhoneNo" value="" class="input-xlarge" required>
						</div>
						</div>
                        <div>
                          <button type="submit" name="Submit" value="Register" class="btn btn-primary pull-right">Create Account</button>
                        </div>
                      </form>
                    </div>
                </div>
              </div>
            </div>
        </div>
	</div>
</div>
<script type="text/javascript">
$( "#tab" ).validate({
	errorElement: 'span', //default input error message container
	errorClass: 'error', // default input error message class
	focusInvalid: false, // do not focus the last invalid input
  rules: {   
	FirstName: {
		required: true,
    },
	LastName: {
		required: true,
    },
	Email: {
		required: true,
		check_email:true
    },
	Password: {
		required: true,
		equalTo:"#Password"
    },
	ConfirmPassword: {
		required: true,
		equalTo:"#Password"
    },
	Gender: {
      required: true,
    },
	Address: {
      required: true,
    },
	Department: {
      required: true,
    },
	HireDate: {
      required: true,
    },
	DateofBirth: {
      required: true,
    },
	PhoneNo: {
		required: true,
    }
  }

 });

jQuery.validator.addMethod('check_email', function (value) {
var isSuccess;
$.ajax({ url: "index.php?check_email", 
	type: "post",
	data: {
		Email: function() {
		return $("#Email").val();
		}
	},
	async: false, 
	success: 
		  function(msg) { console.log(msg);isSuccess = msg === "true" ? true : false }
	  });
return isSuccess;
},"Email Already Exist");
</script>
</body>
</html>
