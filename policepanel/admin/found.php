<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>found</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <?php include('includes/css.php'); ?>
  <link href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
<style>
	  table.dataTable tbody tr{
		  background: none;
	  }

		#f_table th{ font-weight:500; text-align: center; color: #f5700c; }
  
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
  
    <?php include('includes/header.php'); ?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php include('includes/topnav.php'); ?>
	 
	 
	 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary" style="    background: linear-gradient(60deg, #f5700c, #ff9800);">
                  <h4 class="card-title ">Found list</h4>
                  <p class="card-category">following are candidates who are found</p>
                </div>
                <div class="card-body">
                 <div class="table-responsive">
                    <table id="f_table" class="table table-hover table-bordered">
                      <thead class=" text-primary">
						<tr>
							<th>#</th>
							<th>F_Name</th> 
							<th >L_Name</th>
							<th >Age</th>
							<th >Parent</th>
							<th >Address</th>
							<th >Parent_No.</th>
							<th >Pin</th>
							<th >City</th>
							<th >Victim Photo</th>
							<th >Matched Photo</th>
							<th >Accuracy</th>
							<th >Location Found</th>
							<th >Finder</th>
							<th >Finder_no.</th>
						</tr>
                      </thead>
                      <tbody id="tabledata">
                        
                      </tbody>
				 </table>
              </div>
            </div>
      
      <?php //include('includes/footer.php'); ?>
    </div>
  </div>
 
  <?php include('includes/js.php'); ?>
  
    <script>
window.onload = function(){
	 // alert('hi')
	 var i = 1;
	 
	 firebase.database().ref('Suspects/').once('value').then(function(snapshots){
		 snapshots.forEach(function(snapshots) {
				var finder_name = snapshots.val().helper;
				var finder_no = snapshots.val().phone;
				var matched_photo = snapshots.val().victim_photo;
				var location = snapshots.val().address;
				var matched_id = snapshots.val().matched_user_id;
				var accuracy = snapshots.val().accuracy;
		firebase.database().ref('Registration/'+ matched_id).once('value').then(function(childSnapshot){
				var status = childSnapshot.val().status; 
				var finder = childSnapshot.val().finder_id;

			if(status==0){
				// var dob = reformatDate(childSnapshot.val().dob);
				var dob = childSnapshot.val().dob;
				var  fields = '<tr><td>'+i+'</td><td>'+childSnapshot.val().fname+'</td><td>'+childSnapshot.val().lname+'</td><td>'+dob+'</td><td>'+childSnapshot.val().parent_name+'</td><td>'+childSnapshot.val().address+'</td><td>'+childSnapshot.val().phone+'</td><td>'+childSnapshot.val().pincode+'</td><td>'+childSnapshot.val().city+'</td><td><a href="https://firebasestorage.googleapis.com/v0/b/lostandfound-72457.appspot.com/o/myImages%2F'+childSnapshot.val().victim_photo+'?alt=media" target="_blank"><img src="https://firebasestorage.googleapis.com/v0/b/lostandfound-72457.appspot.com/o/myImages%2F'+childSnapshot.val().victim_photo+'?alt=media" style="width:100px;"></a></td><td><a href="https://firebasestorage.googleapis.com/v0/b/lostandfound-72457.appspot.com/o/suspect_images%2F'+matched_photo+'?alt=media" target="_blank"><img src="https://firebasestorage.googleapis.com/v0/b/lostandfound-72457.appspot.com/o/suspect_images%2F'+matched_photo+'?alt=media" style="width:100px;"></a></td><td>'+accuracy+'</td><td>'+location+'</td><td>'+finder_name+'</td><td>'+finder_no+'</td></tr>';
				
	
				$("#tabledata").append(fields);
				i++;
					}
			});
			
		});
	  });
	}
	
  </script>
  
    <script>
  </script>
  <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
</body>

</html>