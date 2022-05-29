// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional

const firebaseConfig = {
	apiKey: "AIzaSyCghelmhIFBj1Kc6knwFxBvkcgVl9wVZdo",
	authDomain: "lostandfound-72457.firebaseapp.com",
	projectId: "lostandfound-72457",
	databaseURL: "https://lostandfound-72457-default-rtdb.firebaseio.com/",
	serviceAccount: "lostandfound-72457-firebase-adminsdk-dmtai-fab99b23d2.json",
	storageBucket: "lostandfound-72457.appspot.com",
	messagingSenderId: "98939325962",
	appId: "1:98939325962:web:6d217ab766ae83acb619f3"
};


// Initialize Firebase
firebase.initializeApp(firebaseConfig);


// login 
$("#login-btn").click(function () {
	var email = $("#email").val();
	var pass = $("#password").val();
	// var pass = document.getElementById("#password").value();


	if (email != '' && pass != '') {
		var result = firebase.auth().signInWithEmailAndPassword(email, pass);
		result.catch(function (error) {
			var errorCode = error.code;
			var errorMessage = error.message;

			console.log(errorCode);
			console.log(errorMessage);

			window.alert(errorMessage);
			// $("#login-err-msg").html(errorMessage);
		});
	}
	else {
		window.alert('fields are empty!');
	}
});

// sign up
$("#sign-up-btn").click(function () {
	// var name  = $("#police-name").val();
	var email = $("#police-email").val();
	var passw = $("#police-pass").val();
	var confirm_pass = $("#police-cnf-pass").val();
	var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	if (email != '' && passw != '' && confirm_pass != '') {
		if (!mailformat.test(email)) {
			// alert("please enter valid email id!\n e.g.= xyz123@abc.com");
		}
		if (passw == confirm_pass) {
			var result = firebase.auth().createUserWithEmailAndPassword(email, passw);

			result.catch(function (error) {
				var errorCode = error.code;
				var errorMessage = error.message;

				console.log(errorCode);
				console.log(errorMessage);
				window.alert("Message : " + errorMessage);
				// $("#login-err-msg").html(errorMessage);
			});

		}
		else {
			window.alert('Password do not match with confirm_password');
		}

	}
	else {
		window.alert('fields are empty!');
	}
});



// reset password
$("#reset-password-btn").click(function () {

	var email = $("#eml ").val();

	if (email != '') {
		var result = firebase.auth().sendPasswordResetEmail(email).then(function () {
			window.alert('Email has been sent to you,Please check and verify.');
			window.location.href = "police_login.php";
		})

		result.catch(function (error) {
			var errorCode = error.code;
			var errorMessage = error.message;

			console.log(errorCode);
			console.log(errorMessage);

			window.alert("Message : " + errorMessage);
			// $("#login-err-msg").html(errorMessage);
		});
	}
	else {
		window.alert('Please write your email id first!');
	}
});


// logout  
$("#logout-btn").click(function () {
	sessionStorage.removeItem('login_id');
	firebase.auth().signOut();
});


// to change date format
// function reformatDate(dateStr)
// {
  // dArr = dateStr.split("-");  // ex input "2010-01-18"
  // return dArr[2]+ "/" +dArr[1]+ "/" +dArr[0]; //ex out: "18/01/10"
// }   






