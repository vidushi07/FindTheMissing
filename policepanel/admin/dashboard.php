<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Dashboard</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <?php include('includes/css.php'); ?>
</head>

<body class="dark-edition">
  <div class="wrapper ">
    <?php include('includes/header.php'); ?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php include('includes/topnav.php'); ?>
	 
	 
	 <center> <h3 style="margin-top:300px;font-size:120px">WELCOME</h3></center>
      <!-- End Navbar -->
      
      <?php //include('includes/footer.php'); ?>
    </div>
  </div>
 
  <?php include('includes/js.php'); ?>
   <script>
		firebase.auth().onAuthStateChanged(function(user){
			if(user){
				var userId = firebase.auth().currentUser.uid;
				firebase.database().ref('Users/' + userId).once('value').then(function(snapshot){
					if(!snapshot.val()){
						window.location.href="profile.php";
					}
				});
			}
			else{
				window.location.href="../police_login.php";
			}
		});
	</script>
</body>

</html>