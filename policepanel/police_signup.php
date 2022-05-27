<!DOCTYPE html>
<html>

<head>
	<title>Police Signup</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="police_signup_style.css">
	<script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-auth.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-database.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-storage.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&family=Merriweather&family=Open+Sans:wght@300&family=Patua+One&family=Rubik:wght@300;600&family=Sacramento&family=Satisfy&family=Sniglet&family=Zen+Maru+Gothic:wght@300&display=swap" rel="stylesheet">

</head>

<body>
	<div class="wave-container">
		<svg id="wave" style="transform:rotate(180deg); transition: 0.3s" viewBox="0 0 1440 190" version="1.1" xmlns="http://www.w3.org/2000/svg">
			<defs>
				<linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0">
					<stop stop-color="rgba(169.4, 217.336, 255, 1)" offset="0%"></stop>
					<stop stop-color="rgba(219, 233, 244, 1)" offset="100%"></stop>
				</linearGradient>
			</defs>
			<path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,38L26.7,57C53.3,76,107,114,160,110.8C213.3,108,267,63,320,57C373.3,51,427,82,480,104.5C533.3,127,587,139,640,145.7C693.3,152,747,152,800,139.3C853.3,127,907,101,960,82.3C1013.3,63,1067,51,1120,63.3C1173.3,76,1227,114,1280,110.8C1333.3,108,1387,63,1440,47.5C1493.3,32,1547,44,1600,50.7C1653.3,57,1707,57,1760,60.2C1813.3,63,1867,70,1920,85.5C1973.3,101,2027,127,2080,133C2133.3,139,2187,127,2240,101.3C2293.3,76,2347,38,2400,25.3C2453.3,13,2507,25,2560,47.5C2613.3,70,2667,101,2720,123.5C2773.3,146,2827,158,2880,152C2933.3,146,2987,120,3040,98.2C3093.3,76,3147,57,3200,63.3C3253.3,70,3307,101,3360,104.5C3413.3,108,3467,82,3520,82.3C3573.3,82,3627,108,3680,104.5C3733.3,101,3787,70,3813,53.8L3840,38L3840,190L3813.3,190C3786.7,190,3733,190,3680,190C3626.7,190,3573,190,3520,190C3466.7,190,3413,190,3360,190C3306.7,190,3253,190,3200,190C3146.7,190,3093,190,3040,190C2986.7,190,2933,190,2880,190C2826.7,190,2773,190,2720,190C2666.7,190,2613,190,2560,190C2506.7,190,2453,190,2400,190C2346.7,190,2293,190,2240,190C2186.7,190,2133,190,2080,190C2026.7,190,1973,190,1920,190C1866.7,190,1813,190,1760,190C1706.7,190,1653,190,1600,190C1546.7,190,1493,190,1440,190C1386.7,190,1333,190,1280,190C1226.7,190,1173,190,1120,190C1066.7,190,1013,190,960,190C906.7,190,853,190,800,190C746.7,190,693,190,640,190C586.7,190,533,190,480,190C426.7,190,373,190,320,190C266.7,190,213,190,160,190C106.7,190,53,190,27,190L0,190Z"></path>
		</svg>
	</div>
	<center>
		<div class="container-logo">
			<a href="/findthemissing/index.php"><img src="/findthemissing/images/loho2.png" alt="Logo" width="60px" height="60px"></a>
		</div>
	</center>

	<div class="container1">
		<div class="form1">

			<!-- <form>
				<div class="topnav">
					<div class="row mb-5">
						<label for="inputEmail3" class="col-sm-3 col-form-label">Email:</label>
						<div class="col-sm-3">
							<input type="email" class="form-control" id="police-email">
						</div>
					</div>
					<div class="row mb-4">
						<label for="inputPassword3" class="col-sm-3 col-form-label">Password:</label>
						<div class="col-sm-3">
							<input type="password" class="form-control" id="police-pass" onkeyup="return passwordChanged()">
							<span style="font-size:13px; color:white;" id="strength">Set Your Password</span>
						</div>
					</div>
					<div class="row mb-4">
						<label for="inputPassword3" class="col-sm-3 col-form-label">Confirm Password:</label>
						<div class="col-sm-3">
							<input type="password" class="form-control" id="police-cnf-pass">
						</div>
					</div>
				</div>
			</form> -->

			<form>
				<center>
					<h1>Police Sign Up</h1>
					<br>
					<div class="topnav">
						<div class="row mb-5">
							<label for="inputEmail3" class="col-sm-6 col-form-label">Email :</label>
							<div class="col-sm-6">
								<input type="email" class="form-control" id="police-email">
							</div>
						</div>
						<div class="row mb-4">
							<label for="inputPassword3" class="col-sm-6 col-form-label">Password :</label>
							<div class="col-sm-6">
								<input type="password" class="form-control" id="police-pass" onkeyup="return passwordChanged()">
								<span style="font-size:13px; color:white;" id="strength">Set Your Password</span>
							</div>
						</div>
						<div class="row mb-4">
							<label for="inputPassword3" class="col-sm-6 col-form-label">Confirm Password :</label>
							<div class="col-sm-6">
								<input type="password" class="form-control" id="police-cnf-pass">
							</div>
						</div>
					</div>
				</center>
			</form>
			<center>
				<button type="submit" onMouseOver="this.style.color='#0288d1'" onMouseOut="this.style.color='#0d324d'" class="button" id="sign-up-btn">Sign up</button>
				<br>
				<br>
				<br>
				<div>
					<a href="/findthemissing/policepanel/police_login.php" style="color:azure; text-decoration:underline;">Already have an account? <br> Sign in </a>
				</div>
			</center>
		</div>
		<div class="image1">
			<img src="/findthemissing/images/police.png" alt="Icon" width="300px" height="300px">
		</div>
	</div>
	<br>
	<br>

	<br>
	<script src="js/index.js"></script>

	<script language="javascript">
		function passwordChanged() {
			// alert("hi");
			var strength = document.getElementById('strength');
			var strongRegex = new RegExp("^(?=.{10,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
			var mediumRegex = new RegExp("^(?=.{8,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
			var enoughRegex = new RegExp("(?=.{6,}).*", "g");
			var pwd = document.getElementById("police-pass");
			if (pwd.value.length == 0) {
				strength.innerHTML = 'Set Your Password';
			} else if (false == enoughRegex.test(pwd.value)) {
				strength.innerHTML = '<span style="color:#FF66FF">More Characters</span>';
			} else if (strongRegex.test(pwd.value)) {
				strength.innerHTML = '<span style="color:#39FF14">Strong!</span>';
			} else if (mediumRegex.test(pwd.value)) {
				strength.innerHTML = '<span style="color:#FFFF00">Medium!</span>';
			} else {
				strength.innerHTML = '<span style="color:#fd1c03">Weak!</span>';
			}
		}



		// function ValidateEmail(inputText){
		// var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
		// if(inputText.value.match(mailformat))
		// {
		// alert("Valid email address!");
		// document.form1.text1.focus();
		// return true;
		// }
		// else
		// {
		// alert("You have entered an invalid email address!");
		// document.form1.text1.focus();
		// return false;
		// }
		// }
	</script>

	<script>
		firebase.auth().onAuthStateChanged(function(user) {
			if (user) {
				var userId = firebase.auth().currentUser.uid;
				firebase.database().ref('Users/' + userId).once('value').then(function(snapshot) {
					if (!snapshot.val()) {
						window.location.href = "admin/profile.php";
					}
				});
			}
		});
	</script>

</body>

</html>