<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Dashboard</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <?php include('includes/css.php'); ?>
</head>

<body class="dark-edition" onload="getProfle()">
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
                          <input type="text" class="form-control" id="phone" onkeypress="return isNumber(event)">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email Id</label>
                          <input type="email" class="form-control" id="ed">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" class="form-control" id="add">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Branch Name</label>
                          <input type="text" class="form-control" id="branch-name">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">State Name</label>
                          <input type="text" class="form-control" id="state-name">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input type="text" class="form-control" id="city-name">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Country</label>
                          <input type="text" class="form-control" id="country-name">
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
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="assets/img/faces/paanduandpaandi.webp" />
                  </a>
                </div>
                <!-- <div class="card-body">
                  <h6 class="card-category">CEO / Co-Founder</h6>
                  <h4 class="card-title">Alec Thompson</h4>
                  <p class="card-description">
                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                  </p>
                  <a href="#pablo" class="btn btn-primary btn-round" style="    background: linear-gradient(60deg, #0da2ff, #0da2ff);">Follow</a>
                </div>-->
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- middle content end -->


      <?php //include('includes/footer.php'); 
      ?>
    </div>
  </div>

  <?php include('includes/js.php'); ?>

  <script>
    // edit_profile
    $("#update-btn").click(function() {
      var user_name = $("#user_name").val();
      var phone = $("#phone").val();
      var address = $("#add").val();
      var branch = $("#branch-name").val();
      var state = $("#state-name").val();
      var pin = $("#pin-code").val();
      var city = $("#city-name").val();
      var country = $("#country-name").val();
      var email = $("#ed").val();

      var rootRef = firebase.database().ref().child("Users");
      var userId = firebase.auth().currentUser.uid;
      // var current_user_mail=firebase.auth().currentUser.email;
      var userRef = rootRef.child(userId);

      if (user_name == '') {
        alert("please enter the User name !");
      } else if (phone == '') {
        alert("please enter the phone no. !")
      } else if (email == '') {
        alert("please enter the phone no. !")
      } else if (phone.length != 10) {
        alert("please enter the valid phone no. !")
      } else if (address == '') {
        alert("please enter the Address !");
      } else if (branch == '') {
        alert("please enter the Branch name !");
      } else if (state == '') {
        alert("please enter the state name !");
      } else if (city == '') {
        alert("please enter the city name !")
      } else if (country == '') {
        alert("please enter the country name !")
      } else if (pin == '') {
        alert("please enter the pin code !")
      } else if (pin.length != 6) {
        alert("please enter the valid pin code !")
      } else if (user_name != '' && phone != '' && email != '' && address != '' && branch != '' && state != '' && pin != '' && city != '' && country != '') {
        var userData = {
          "user_name": user_name,
          "phone": phone,
          "email": email,
          "address": address,
          "branch": branch,
          "state": state,
          "pincode": pin,
          "city": city,
          "country": country,
        };

        userRef.set(userData, function(error) {
          if (error) {
            var errorCode = error.code;
            var errorMessage = error.message;

            console.log(errorCode);
            console.log(errorMessage);
            window.alert("Message : " + errorMessage);
          } else {
            window.location.href = "profile.php";
            alert("Your profile has been updated successfully");
          }
        });
      } else {
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
    function getProfle() {
      var userId = sessionStorage.getItem("login_id");
      firebase.database().ref('Users/' + userId).once('value').then(function(snapshot) {

        // console.log(snapshot.val());
        var uname = snapshot.val().user_name;
        var addr = snapshot.val().address;
        var ph = snapshot.val().phone;
        var mail = snapshot.val().email;
        var br = snapshot.val().branch;
        var st = snapshot.val().state;
        var pn = snapshot.val().pincode;
        var cty = snapshot.val().city;
        var cntry = snapshot.val().country;

        document.getElementById("user_name").value = uname;
        document.getElementById("phone").value = ph;
        document.getElementById("ed").value = mail;
        document.getElementById("add").value = addr;
        document.getElementById("branch-name").value = br;
        document.getElementById("state-name").value = st;
        document.getElementById("pin-code").value = pn;
        document.getElementById("city-name").value = cty;
        document.getElementById("country-name").value = cntry;

      });
    }
  </script>

</body>

</html>