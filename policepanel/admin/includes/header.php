<style>
  .sidebar .nav li:hover>a,
  .sidebar .nav li .dropdown-menu a:hover,
  .sidebar .nav li .dropdown-menu a:focus,
  .sidebar .nav li.active>[data-toggle="collapse"] {
    background: linear-gradient(60deg, #f5700c, #ff9800);
    color: #fff;
  }
</style>
<style>
  .notification {

    color: white;
    text-decoration: none;
    padding: 15px 26px;
    position: relative;
    border-radius: 2px;
  }

  .notification .badge {
    position: absolute;
    top: 5px;
    right: 185px;
    padding: 4px 6px;
    border-radius: 60%;
    background: linear-gradient(60deg, #f5700c, #ff9800);
    color: white;
  }
</style>
<div class="sidebar" data-background-color="black" data-image="assets/img/sidebar-2.jpg">
  <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
  <div class="logo"><a href="/index.php" class="simple-text logo-normal">
      Find the Missing
    </a></div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="material-icons">dashboard</i>
          <p style="color:#a9afbbd1">Dashboard</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="profile.php">
          <i class="material-icons">person</i>
          <p>User Profile</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="registration.php">
          <i class="material-icons">mode_edit</i>
          <p>Register New Complaint</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="missing.php">
          <i class="material-icons">content_paste</i>
          <p>Missing List</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="found.php">
          <i class="material-icons">event_available</i>
          <p>Found List</p>
        </a>
      </li>
      <!--<li class="nav-item ">
		<a class="nav-link notification" href="./notifications.php">
		  <i class="material-icons">notifications</i>
		  <span class="badge">6</span>
		  <p>Notifications</p>
		</a>
	  </li>-->
    </ul>
  </div>
</div>