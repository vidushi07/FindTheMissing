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
 <script>
	 document.getElementById("demo").innerHTML = sessionStorage.getItem("notification");
	 sessionStorage.removeItem("notification");
 </script>
  <?php include('includes/js.php'); ?>
</body>

</html>