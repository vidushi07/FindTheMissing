<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Notifications</title>
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
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Notifications</h4>
              <p class="card-category">Handcrafted by our friend
                <a target="_blank" href="https://github.com/mouse0270">Robert McIntosh</a>. Please checkout the
                <a href="http://bootstrap-notify.remabledesigns.com/" target="_blank">full documentation.</a>
              </p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <h4 class="card-title">Notifications Style</h4>
                  <div class="alert alert-info">
                    <p id="demo"></p>
                  </div>
                  
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Navbar -->
      
      <?php //include('includes/footer.php'); ?>
    </div>
  </div>
 
  <?php include('includes/js.php'); ?>
  
  <script src=
    "https://smtpjs.com/v3/smtp.js">
  </script>
  <script>
  // Email.send({
				// SecureToken:"fbf31702-bb7f-4a4e-9c1c-4ccf17ee777f",
				// To: "lalitgwalior99@gmail.com",
				// From: "findingmissingperson2021@gmail.com",
				// Subject: "agya kya",
				// Body: "Hi, there"
			// }).then(
				// message =>{
					console.log (message);
					// if(message=='OK'){
					// alert('Your mail has been sent successfully!');
					// <!-- $("#msg").html("Your mail has been sent successfully!"); -->
					// window.location.href="index.html";
					// }
					// else{
						// console.error (message);
						// alert('There is error at sending message. ')
						
					// }

				// }
			// );
			</script>
</body>
</html>



<!--
$(document).on('click', "#hi", function() {
								var insert_id = sessionStorage.getItem("insert_id");
								
								//var currentUser = firebase.auth().currentUser;
								
								
								var rootRef = firebase.database().ref().child("Suspects");
								alert(rootRef);
								var userRef = rootRef.child(insert_id);
								// alert(userRef);
								
								var matched_user_id12 = 
								// alert(matched_user_id);
								
								var matched_user_id_js = matched_user_id12;
								var updates = {};
								updates['matched_user_id'] = matched_user_id_js;
								updates['status'] = 0;
								
								
								userRef.set(updates);
							
							var rootRef = firebase.database().ref().child("Registration");
							var userRef12 = rootRef.child(matched_user_id12);
							userRef12.update({
								"status":0,
								"finder_id":insert_id-->