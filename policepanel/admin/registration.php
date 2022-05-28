<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>registration</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<?php include('includes/css.php'); ?>
</head>

<body class="dark-edition">
	<div class="wrapper ">
		<?php include('includes/header.php'); ?>
		<div class="main-panel">
			<!-- Navbar -->
			<?php include('includes/topnav.php'); ?>

			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-8">
							<div class="card">
								<div class="card-header card-header-primary" style="    background: linear-gradient(60deg, #f5700c, #ff9800);">
									<h4 class="card-title">Registration</h4>
									<p class="card-category">New Complaint</p>
								</div>
								<div class="card-body">
									<form id="registrationForm">
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label class="bmd-label-floating">First Name</label>
													<input type="text" class="form-control" id="fname">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label class="bmd-label-floating">Last Name</label>
													<input type="text" class="form-control" id="lname">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label class="bmd-label-floating">Age</label>
													<input type="text" class="form-control" id="dob" style="padding-left: 38px;" onkeypress="return isNumber(event)">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="bmd-label-floating">Family Member Name</label>
													<input type="text" class="form-control" id="parentsName">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="bmd-label-floating">Address</label>
													<input type="text" class="form-control" id="address">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label class="bmd-label-floating">Phone Number</label>
													<input type="text" class="form-control" id="phone" onkeypress="return isNumber(event)">
												</div>
											</div>

											<div class="col-md-4">
												<div class="form-group">
													<label class="bmd-label-floating">Pin Code</label>
													<input type="text" class="form-control" id="pin" onkeypress="return isNumber(event)">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label class="bmd-label-floating">City</label>
													<input type="text" class="form-control" id="city">
												</div>
											</div>
											<!--<div class="col-md-4">
							<div class="form-group">
							  <label class="bmd-label-floating">Country</label>
							  <input type="text" class="form-control" id="country">
							</div>
						  </div>-->
											<div class="col-md-6">

												<div class="file-field">
													<label class="bmd-label-floating" style="color: #a9afbbd1;">Upload Photo</label>
													<input type="file" id="pic" onchange="ValidateFileUpload()">
													<input type="hidden" id="imgValidate" value="0">
												</div>


											</div>
											<div id="imgUploadStatus"></div>
										</div>
										<div class="progress">
											<div class="progress-bar" id="uploadProgress" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<button type="button" class="btn btn-primary pull-right" id="registration-btn" style="    background: linear-gradient(60deg, #f5700c, #ff9800); cursor: not-allowed;" disabled>Submit</button>
											</div>
										</div>
								</div>

								<div class="clearfix"></div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php //include('includes/footer.php'); 
			?>
		</div>
	</div>

	<?php include('includes/js.php'); ?>
	<script>
		// complain register 
		$("#registration-btn").click(function() {
			var fname = $("#fname").val();
			var lname = $("#lname").val();
			var dob = $("#dob").val();
			var parentsName = $("#parentsName").val();
			var address = $("#address").val();
			var phone = $("#phone").val();
			var pin = $("#pin").val();
			var city = $("#city").val();
			// var country = $("#country").val();
			var img = document.getElementById("pic").files[0];
			var imgValidate = $("#imgValidate").val();






			var rootRef = firebase.database().ref().child("Registration");
			var userId = firebase.auth().currentUser.uid;
			var userRef = rootRef.push();

			if (fname == '') {
				// $("#fname").focus();
				// $("#fname").css('border', '1px solid red');
				alert("please enter the First Name !");
			} else if (lname == '') {
				alert("please enter the Last Name !");
			} else if (dob == '') {
				alert("please enter the DOB !");
			} else if (parentsName == '') {
				alert("please enter the parentsName !");
			} else if (address == '') {
				alert("please enter the Address !");
			} else if (phone == '') {
				alert("please enter the phone no. !")
			} else if (phone.length != 10) {
				alert("please enter the valid phone no. !")
			} else if (pin == '') {
				alert("please enter the pin code !")
			} else if (pin.length != 6) {
				alert("please enter the valid pin code !")
			} else if (city == '') {
				alert("please enter the city name !")
			}
			// else if(country==''){
			// alert("please enter the country name !")
			// }
			else if (imgValidate == 0) {
				alert('Please Choose Image!')
			} else {
				var imageName = img.name;
				var ext = imageName.substr(imageName.lastIndexOf('.') + 1);
				var r = Math.random().toString(36).substring(7);
				var new_name = r + '.' + ext;
				var registrationData = {
					"userId": userId,
					"fname": fname,
					"lname": lname,
					"dob": dob,
					"parent_name": parentsName,
					"address": address,
					"phone": phone,
					"pincode": pin,
					"city": city,
					// "country":country,
					"victim_photo": new_name,
					"status": 1,
					"finder_id": 0
				};


				// alert(new_name);
				var storageRef = firebase.storage().ref('myImages/' + new_name);
				var uploadTask = storageRef.put(img);

				uploadTask.on('state_changed', function(snapshot) {
					var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
					$("#uploadProgress").html(Math.round(progress) + "%");
					$("#uploadProgress").css('width', Math.round(progress) + "%");

					if (progress == '100') {
						document.getElementById("registrationForm").reset();
						$("#uploadProgress").html("");
						$("#uploadProgress").css('width', "0%");
						alert('Registration Successfull');
					}
				}, function(error) {
					console.log(error.message);
				}, function() {
					uploadTask.snapshot.ref.getDownloadURL().then(function(downloadURL) {

						console.log(downloadURL);
					});
				});

				userRef.set(registrationData, function(error) {
					if (error) {
						var errorCode = error.code;
						var errorMessage = error.message;

						console.log(errorCode);
						console.log(errorMessage);
						window.alert("Message : " + errorMessage);
					}
				});
			}

		});


		function isNumber(evt) {
			evt = (evt) ? evt : window.event;
			var charCode = (evt.which) ? evt.which : evt.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57)) {
				return false;
			}
			return true;
		}

		function ValidateFileUpload() {
			var fuData = document.getElementById('pic');
			var FileUploadPath = fuData.value;

			//To check if user upload any file
			if (FileUploadPath == '') {
				alert("Please upload an image");

			} else {
				var Extension = FileUploadPath.substring(
					FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

				//The file uploaded is an image


				if (Extension == "jpeg" || Extension == "jpg") {

					// To Display
					if (fuData.files && fuData.files[0]) {
						var reader = new FileReader();

						reader.onload = function(e) {
							$('#blah').attr('src', e.target.result);
						}

						reader.readAsDataURL(fuData.files[0]);
						$("#registration-btn").attr('disabled', false);
						$("#registration-btn").css('cursor', 'pointer');
					}


				}

				//The file upload is NOT an image
				else {
					alert("Photo only allows file types of JPG and JPEG");
					$("#registration-btn").attr('disabled', true);
					$("#registration-btn").css('cursor', 'not-allowed');

				}
			}
			// Alertsize	
			if (window.ActiveXObject) {
				var fso = new ActiveXObject("Scripting.FileSystemObject");
				var filepath = document.getElementById('pic').value;
				var thefile = fso.getFile(filepath);
				var sizeinbytes = thefile.size;
			} else {
				var sizeinbytes = document.getElementById('pic').files[0].size;
			}
			fSize = sizeinbytes;

			if (fSize < 5000000) {
				$("#imgValidate").val(1);
			} else {
				alert("Image size should be under 5MB!");
			}

		}
	</script>
	<script>
		firebase.auth().onAuthStateChanged(function(user) {
			if (user) {
				var userId = firebase.auth().currentUser.uid;
				firebase.database().ref('Users/' + userId).once('value').then(function(snapshot) {
					if (!snapshot.val()) {
						window.location.href = "profile.php";
					}
				});
			}
		});
	</script>
</body>

</html>