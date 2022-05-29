<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>User Profile</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <?php include('includes/css.php'); ?>
</head>

<body class="dark-edition">
  <div class="wrapper ">
    <?php include('includes/header.php'); ?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php include('includes/topnav.php'); ?>
      <!-- End Navbar -->
      
	<!-- middle content start -->
	  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary" style="    background: linear-gradient(60deg, #0da2ff, #0da2ff);">
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                  <form>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" class="form-control" id="user_name">
                        </div>
                      </div>
					  <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Phone No.</label>
                          <input type="text" class="form-control"id="phone" onkeypress="return isNumber(event)">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input type="text" class="form-control"id="city-name">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Country</label>
                          <input type="text" class="form-control"id="country-name">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Pin Code</label>
                          <input type="text" class="form-control" id="pin-code" onkeypress="return isNumber(event)">
                        </div>
                      </div>
                    </div>
                    <button type="button" class="btn btn-primary pull-right" id="update-btn" style="    background: linear-gradient(60deg, #0da2ff, #0da2ff);">Update Profile</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
	  
	<!-- middle content end -->  
	  
	  
      <?php //include('includes/footer.php'); ?>
    </div>
  </div>
 
  <?php include('includes/js.php'); ?>
  
  <script>
   
 // edit_profile
 $("#update-btn").click(function(){
	var user_name = $("#user_name").val();
	var phone = $("#phone").val();
	var pin = $("#pin-code").val();
	var city = $("#city-name").val();
	var country = $("#country-name").val();

	
	var rootRef = firebase.database().ref().child("Finders");
	var userId = firebase.auth().currentUser.uid;
	var userRef = rootRef.child(userId);
	
		if(user_name==''){
			alert("please enter the User name !");
		}
		else if(phone ==''){
			alert("please enter the phone no. !")
		}
		else if(phone.length!=10){
				alert("please enter the valid phone no. !")
			}
		else if(city==''){
			alert("please enter the city name !")
		}
		else if(country==''){
			alert("please enter the country name !")
		}
		else if(pin==''){
			alert("please enter the pin code !")
		}
		else if(pin.length != 6){
			alert("please enter the valid pin code !")
		}
		
	
		else if(user_name!='' && phone!=''&& pin!='' && city!='' && country!=''){
			var userData = {
					"user_name":user_name,
					"phone":phone,
					"pincode":pin,
					"city":city,
					"country":country,
				};
			
			userRef.set(userData, function(error){
				if(error){
					var errorCode = error.code;
					var errorMessage = error.message;
					
					console.log(errorCode);
					console.log(errorMessage);
					window.alert("Message : "+ errorMessage);
				}
				else{
					window.location.href="profile.php";
					alert("Your profile has been updated successfully");
				}
			});
		}
		else{
			alert("Fields are empty!");
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
</script>
  
  
<script>
window.onload = function(){
	 var userId = sessionStorage.getItem("login_id");
	firebase.database().ref('Finders/' + userId).once('value').then(function(snapshot){

		console.log(snapshot.val());
		var uname = snapshot.val().user_name;
		var ph = snapshot.val().phone;
		var pn = snapshot.val().pincode;
		var cty = snapshot.val().city;
		var cntry = snapshot.val().country;		
		document.getElementById("user_name").value = uname;
		document.getElementById("phone").value = ph;
		document.getElementById("pin-code").value = pn;
		document.getElementById("city-name").value = cty;
		document.getElementById("country-name").value = cntry;
		
	});
}


</script>
  
</body>

</html>