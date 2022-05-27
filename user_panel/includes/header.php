<style>
.sidebar .nav li:hover>a, .sidebar .nav li .dropdown-menu a:hover, .sidebar .nav li .dropdown-menu a:focus, .sidebar .nav li.active>[data-toggle="collapse"] {
    background: linear-gradient(60deg, #f5700c, #ff9800);
	color: #fff;
}
</style>
<div class="sidebar" data-background-color="black" data-image="assets/img/sidebar-2.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="../index.php" class="simple-text logo-normal">
          Find the Missing
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href="dashboard.php">
              <i class="material-icons">dashboard</i>
              <p  style="color:#a9afbbd1">Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="profile.php">
              <i class="material-icons">person</i>
              <p>User Profile</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="suspect_form.php">
              <i class="material-icons">mode_edit</i>
              <p>Suspect Form</p>
            </a>
          </li>
		
          <!--<li class="nav-item ">
            <a class="nav-link" href="./notifications.php">
              <i class="material-icons">notifications</i>
              <p>Notifications</p>
            </a>
          </li>-->
		  
		   <li class="nav-item ">
            <a class="nav-link" href="./matched_result.php">
              <i class="material-icons">event_available</i>
              <p>Matched Result</p>
            </a>
          </li>
         
        </ul>
      </div>
    </div>