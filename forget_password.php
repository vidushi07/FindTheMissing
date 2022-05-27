<!DOCTYPE html>
<html>
	<head>
		<title>forget password</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1">	
		 <link rel="stylesheet" href="user_login_style.css">
		 <script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-app.js"></script>
		 <script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-auth.js"></script>
		 <script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-database.js"></script>
		 <script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-storage.js"></script>
		 <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="header">
			<div class="inner_header">
				<div class="logo">
					<a href="index.php" style="font-family: initial; color:#ffa500;">BE-CSE-B Group A</a>
				</div>
			</div>
		</div>
		<br><br><br>
		<center>
		<div style = "margin-top:180px">
			<h1 style="color:#ffa500">Forget Password</h1>
			<h5 class="text-danger" id="login-err-msg"></h5>
		</div>
		</center>
			<br>

	<form>
	<center><p style="color:orange">Please enter your email id below and we will send you information to recover your account.</p></center>
	<div class="xyz">
		 <div class="row mb-3">
			<label for="email" class="col-sm-2 col-form-label">Email Id:</label>
			<div class="col-sm-3">
			  <input type="email" class="form-control" id="eml">
			</div>
		  </div>
	</div>
	</form>
			<center>
				<button class="button" onMouseOver="this.style.color='orange'" onMouseOut="this.style.color='#fff'"id="reset-password-btn">Reset Password &nbsp; -></button>
			</center>
			
	<script src="js/index.js"></script>
	// <script>
		// firebase.auth().onAuthStateChanged(function(user){
			// if(user){
				// var userId = firebase.auth().currentUser.uid;
				// firebase.database().ref('Users/' + userId).once('value').then(function(snapshot){
					// if(snapshot.val()){
						// window.location.href="admin/dashboard.php";
					// }
					// else{
						// window.location.href="admin/profile.php";
					// }
				// });
			// }
		// });
	// </script>
	</body>
</html>