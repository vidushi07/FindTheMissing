<?php
require '../includes/vendor/autoload.php';
include('../includes/dbconfig.php');
error_reporting(0);
session_start();
if (isset($_SESSION['image'])) {
	// AWS_CONNECTION
	$credentials = new Aws\Credentials\Credentials('AKIAXLWD64HCDCNSTE7F', 'm/YcD7qIzfvEFf/g3RVjzgWucnI/8Ct4+6iFB9t+');
	$args = ([
		'version' => 'latest',
		'region'  => 'us-east-2',
		'credentials' => $credentials
	]);
	$client = new Aws\Rekognition\RekognitionClient($args);


	// DATA_FETCHING
	$ref = "Registration/";
	$fetchdata = $database->getReference($ref)->getSnapshot()->getValue();  //--------------------------------> fetch ID from Registration 

	$array_key = array_keys($fetchdata);

	$session_image = $_SESSION['image'];
	$count = 0;
	foreach ($fetchdata as $key => $row) {
		if ($row['status'] == 1) {
			$pic =  $row['victim_photo'];
			$result = $client->compareFaces([
				'SimilarityThreshold' => 50,
				'SourceImage' => [ // REQUIRED
					'Bytes' => file_get_contents("https://firebasestorage.googleapis.com/v0/b/lostandfound-72457.appspot.com/o/suspect_images%2F$session_image?alt=media"),


				],
				'TargetImage' => [ // REQUIRED
					'Bytes' => file_get_contents("https://firebasestorage.googleapis.com/v0/b/lostandfound-72457.appspot.com/o/myImages%2F$pic?alt=media"),


				],
			]);
			$match_percent =  round($result['FaceMatches'][0]['Similarity']);
			if ($match_percent >= 50) {
				$percent = $match_percent;
				$matched_image = $pic;
				break;
			}
		}
		$count++;
	}
?>



	<h2><?php
		if ($percent >= 50) {
			echo ("Matched percent	= " . $percent . "%");
		?>
			<br>
		<?php
		} else {
			echo ("No match found for image.");
			// echo "<script>window.location.href='../../user_panel/suspect_form.php';</script>";
		}
		?>
	</h2>

	<div style="width:100%; display:flex;">
		<div style="border:1px solid;padding: 10px;">
			<h2 style="margin-top:0; text-align:center;">Suspect Image</h2>
			<center><img style="width:200px;" src="https://firebasestorage.googleapis.com/v0/b/lostandfound-72457.appspot.com/o/suspect_images%2F<?php echo $session_image; ?>?alt=media"></center>

			<!--<center><img style="width:200px;" src="https://firebasestorage.googleapis.com/v0/b/beproject-133ee.appspot.com/o/suspect_images%2F<?php echo $session_image; ?>?alt=media"></center>-->
		</div>
		<div style="border:1px solid;padding: 10px;">
			<h2 style="margin-top:0; text-align:center;">Matched Image</h2>
			<center>
				<?php if (isset($percent)) { ?>
					<img style="width:200px;" src="https://firebasestorage.googleapis.com/v0/b/lostandfound-72457.appspot.com/o/myImages%2F<?php echo $matched_image; ?>?alt=media">

					<!--<img style="width:200px;" src="https://firebasestorage.googleapis.com/v0/b/beproject-133ee.appspot.com/o/myImages%2F<?php echo $matched_image; ?>?alt=media">-->
				<?php } else { ?>
					<img style="width:200px;" src="no-picture-available-icon-8.png">
				<?php } ?>
			</center>
		</div>
	</div>


	<center><img src="redirect.gif" style="width:100%;margin-top:200px;"></center>
	<?php
	if (isset($percent)) {
	?>
		<script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-app.js"></script>
		<script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-auth.js"></script>
		<script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-database.js"></script>
		<script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-storage.js"></script>
		<script src="../../user_panel/assets/js/core/jquery.min.js"></script>
		<script src="../../js/index.js"></script>
		<script src="https://smtpjs.com/v3/smtp.js"></script>
		<script>


		</script>

		<script>
			// update data to send data from missing list to find list
			$(document).on('click', "#hi", function() {
				var insert_id = sessionStorage.getItem("insert_id");

				var matched_user_id = '<?php echo $array_key[$count]; ?>';
				var accuracy_percent = '<?php echo $percent; ?>';
				var rootRef = firebase.database().ref().child("Suspects").child(insert_id);

				var rootRefSecond = firebase.database().ref().child("Registration").child(matched_user_id);

				rootRef.update({
					'matched_user_id': matched_user_id,
					'accuracy': accuracy_percent + "%",
					'status': 0

				});


				rootRefSecond.update({
					'finder_id': insert_id,
					'status': 0
				});


				firebase.database().ref('Registration/' + matched_user_id).once('value').then(function(childSnapshot) {
					var victim_First_name = childSnapshot.val().fname;
					var victim_last_name = childSnapshot.val().lname;
					var police_user_id = childSnapshot.val().userId;
					var suspect_age = childSnapshot.val().dob;
					firebase.database().ref('Suspects/' + insert_id).once('value').then(function(snapshot) {
						var location = snapshot.val().address;
						var finder = snapshot.val().helper;
						var finder_no = snapshot.val().phone;
						var matched_photo = snapshot.val().victim_photo;
						firebase.database().ref('Users/' + police_user_id).once('value').then(function(snap) {
							var police_email_id = snap.val().email;
							alert(police_email_id);
							Email.send({
								SecureToken: "2f643a03-c241-4694-b8ff-c83821e2ab1e",
								To: police_email_id,
								From: "shuklavidushi15@gmail.com",
								Subject: victim_First_name + victim_last_name + " is found",

								Body: 'Name: ' + victim_First_name + victim_last_name + '_________Age:' + suspect_age +
									'____________Location: ' + location + '______________Finder: ' + finder +
									'______________Finder_no: ' + finder_no + '_____________Accuracy:' + accuracy_percent + '%'


							}).then(
								message => {
									// console.log (message);
									if (message == 'OK') {
										alert('mail has been sent to police successfully!');

									} else {
										console.error(message);
										alert('There is error at sending message. ')

									}

								}
							);
						});
					});
				});


			});
		</script>
		<button type="button" class="btn btn-primary pull-right" id="hi" style="display:none;">Update Profile</button>
		<script>
			setTimeout(function() {
				$("#hi").click();
			}, 2000);
		</script>

	<?php
	}
	// echo "<pre>";
	// print_r($result);
	// unset($_SESSION['image']);
	?>

<?php

} else {
	echo "<script>window.location.href='../../user_panel/suspect_form.php';</script>";
}
?>