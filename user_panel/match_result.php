<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Matched Result</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <?php include 'includes/css.php';?>
  <link href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
<style>
	  table.dataTable tbody tr{
		  background: none;
	  }

		#f_table th{ font-weight:500; text-align: center; color: #0da2ff; }

		.button {
			  padding: 10px 5px 5px 5px;
			  font-size: 15px;
			  text-align: center;
			  cursor: pointer;
			  outline: none;
			  color: #fff;
			  background-color: #4CAF50;
			  border: none;
			  border-radius: 15px;
			  box-shadow: 0 9px #999;
		}

		.button:hover {background-color: #3e8e41}

		.button:active {
			  background-color: #3e8e41;
			  box-shadow: 0 5px #666;
			  transform: translateY(4px);
		}
</style>

</head>

<body class="dark-edition">

    <?php include 'includes/header.php';?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php include 'includes/topnav.php';?>


	 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary" style="    background: linear-gradient(60deg, #0da2ff, #0da2ff);">
                  <h4 class="card-title ">Matched Result</h4>
                  <p class="card-category">following is the match found</p>
                </div>
                <div class="card-body">






<?php
require '../compare_faces/includes/vendor/autoload.php';
include '../compare_faces/includes/dbconfig.php';

if (isset($_SESSION['image'])) {
    // AWS_CONNECTION
    $credentials = new Aws\Credentials\Credentials('AKIAYFOINJL3G3HJIK37', '5qJ+xUeSHk6d/sTjCO1ArrEk3Tvris3npMsVXNyQ');
    $args = ([
        'version' => 'latest',
        'region' => 'us-east-2',
        'credentials' => $credentials,
    ]);
    $client = new Aws\Rekognition\RekognitionClient($args);

    // DATA_FETCHING
    $ref = "Registration/";
    $fetchdata = $database->getReference($ref)->getSnapshot()->getValue();

    $array_key = array_keys($fetchdata);
    // echo "<img style='width:120px;' src='https://firebasestorage.googleapis.com/v0/b/lostandfound-72457.appspot.com/o/myImages%2F$pic?alt=media'>";
    // file_put_contents("../images/img5.jpg", file_get_contents('https://firebasestorage.googleapis.com/v0/b/lostandfound-72457.appspot.com/o/suspect_mages%2F'));
    $session_image = $_SESSION['image'];
    $count = 0;
    foreach ($fetchdata as $key => $row) {
        // if($row['status']==1){
        $pic = $row['victim_photo'];
        $result = $client->compareFaces([
            'SimilarityThreshold' => 70,
            'SourceImage' => [ // REQUIRED
                'Bytes' => file_get_contents("https://firebasestorage.googleapis.com/v0/b/lostandfound-72457.appspot.com/o/suspect_images%2F$session_image?alt=media"),

            ],
            'TargetImage' => [ // REQUIRED
                'Bytes' => file_get_contents("https://firebasestorage.googleapis.com/v0/b/lostandfound-72457.appspot.com/o/myImages%2F$pic?alt=media"),

            ],
        ]);
        $match_percent = round($result['FaceMatches'][0]['Similarity']);
        if ($match_percent >= 70) {
            $percent = $match_percent;
            $matched_image = $pic;
            break;
        }
        $count++;
        // }
    }}
    else {
      console.log("No image found in session")
    }
    ?>
<?php
if (isset($percent)) {
        ?>
<script>
sessionStorage.setItem("notification", "someone is found");
</script>
<?php
}
    ?>
<div style="margin-left:500px;margin-top:200px">
<h2><?php
if ($percent >= 70) {
        echo "<font color=orange> Matched percent	= " . $percent . "%";
    } else {

        echo "<font color=orange> No match found for below image";
    }
    ?></h2>
<div style="width:100%; display:flex;">
	<div style="border:1px solid;padding: 10px;">
		<h2 style="margin-top:0; text-align:center;color:orange">Suspect Image</h2>
		<center><img style="width:200px;" src="https://firebasestorage.googleapis.com/v0/b/lostandfound-72457.appspot.com/o/suspect_images%2F<?php echo $session_image; ?>?alt=media"></center>
	</div>
	<div  style="border:1px solid;padding: 10px;">
		<h2 style="margin-top:0; text-align:center;color:orange">Matched Image</h2>
		<center>
		<?php if (isset($percent)) {?>
			<img style="width:200px;" src="https://firebasestorage.googleapis.com/v0/b/lostandfound-72457.appspot.com/o/myImages%2F<?php echo $matched_image; ?>?alt=media">
		<?php } else {?>
			<img style="width:200px;" src="no-picture-available-icon-8.png">
		<?php }?>
		</center>
</div>

<?php
if (isset($percent)) {
        ?>
<script>
sessionStorage.setItem("notification", "someone is found");
</script>
<?php
}
    ?>
<div style="margin-left:500px;margin-top:200px">
<h2><?php
if ($percent >= 70) {
        echo "<font color=orange> Matched percent	= " . $percent . "%";
    } else {

        echo "<font size=50> No match found for below image";
    }
    ?></h2>
<div style="width:100%; display:flex;">
	<div style="border:1px solid;padding: 10px;">
		<h2 style="margin-top:0; text-align:center;color:orange">Suspect Image</h2>
		<center><img style="width:200px;" src="https://firebasestorage.googleapis.com/v0/b/lostandfound-72457.appspot.com/o/suspect_images%2F<?php echo $session_image; ?>?alt=media"></center>
	</div>
	<div  style="border:1px solid;padding: 10px;">
		<h2 style="margin-top:0; text-align:center;color:orange">Matched Image</h2>
		<center>
		<?php if (isset($percent)) {?>
			<img style="width:200px;" src="https://firebasestorage.googleapis.com/v0/b/lostandfound-72457.appspot.com/o/myImages%2F<?php echo $matched_image; ?>?alt=media">
		<?php } else {?>
			<img style="width:200px;" src="no-picture-available-icon-8.png">
		<?php }?>
		</center>
</div>
<?php
if (isset($percent)) {
        ?>
  <script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-app.js"></script>
 <script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-auth.js"></script>
 <script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-database.js"></script>
 <script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-storage.js"></script>
<script src="assets/js/core/jquery.min.js"></script>
<!--<script src="../js/index.js"></script>-->


<script>
// update data to send data from missing list to find list
$(document).on('click', "#hi", function() {
	var insert_id = sessionStorage.getItem("insert_id");
	var rootRef = firebase.database().ref().child("Suspects");
	var userRef = rootRef.child(insert_id);

	var matched_user_id = '<?php echo $array_key[$count]; ?>';
	//alert(matched_user_id);
	userRef.update({
		"matched_user_id":matched_user_id,
		"status":0
	});

	var rootRef = firebase.database().ref().child("Registration");
	var userRef = rootRef.child(matched_user_id);
	userRef.update({
		"status":0,
		"finder_id":insert_id
	});


});
</script>
<button type="button" class="btn btn-primary pull-right" id="hi" style="display:none;">Update Profile</button>
<script>
setTimeout(function(){ $("#hi").click(); }, 2000);
</script>
<?php
}
// echo "<pre>";
// print_r($result);

// unset($_SESSION['image']);
} else {
    echo "<script>window.location.href='suspect_form.php';</script>";
}
?>




				</div>

      <?php //include('includes/footer.php'); ?>
    </div>
  </div>

  <?php include 'includes/js.php';?>


    <script>
  </script>
  <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
</body>

</html>