<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>missing</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <?php include('includes/css.php'); ?>
  <link href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
  <style>
  table.dataTable tbody tr{
	  background: none;
  }
  </style>
  <style>
	#m_table th{ font-weight:500; text-align: center; color: #0da2ff; }
  </style>
   <style>
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
  <div class="wrapper ">
    <?php include('includes/header.php'); ?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php include('includes/topnav.php'); ?>
	 <div class="content">
        <div class="container-fluid">
          <div class="row">
			 <div class="col-md-12">
					  <div class="card card-plain">
						<div class="card-header card-header-primary" style="    background: linear-gradient(60deg, #0da2ff, #0da2ff);">
						  <h4 class="card-title">Missing List</h4>
						  <p class="card-category">following are candidates who are still missing</p>
						</div>
						<div class="card-body">
						  <div class="table-responsive" id="getData">
							<table id="m_table" class="table table-hover table-bordered">
							  <thead>
								<tr>
									<th>#</th>
									<th>First Name</th> 
									<th >Last Name</th>
									<th >Age</th>
									<th >Parent Name</th>
									<th >Address</th>
									<th >Phone</th>
									<th >Pin</th>
									<th >City</th>
									<!--<th >Country</th>-->
									<th >Photo</th>
								</tr>
							  </thead>
							  <tbody id="tabledata">
							  
							  </tbody>
						  </div>
							<button class="button" id="abc" style="display:none;">Get missing list</button>
						</div>
						</table>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			  </div>
			 </div>
			</div>
		</div>
      <?php //include('includes/footer.php'); ?>
    </div>
  </div>
 
  <?php include('includes/js.php'); ?> 
  <script>
window.onload = function(){
	 var i = 1;
	
	  firebase.database().ref('Registration/').once('value').then(function(snapshot){
		snapshot.forEach(function(childSnapshot) {
		
		  var status = childSnapshot.val().status; 
		
			if(status==1){
				// var dob = reformatDate(childSnapshot.val().dob);
				var dob = childSnapshot.val().dob;
				
				var  fields = '<tr><td>'+i+'</td><td>'+childSnapshot.val().fname+'</td><td>'+childSnapshot.val().lname+'</td><td>'+dob+'</td><td>'+childSnapshot.val().parent_name+'</td><td>'+childSnapshot.val().address+'</td><td>'+childSnapshot.val().phone+'</td><td>'+childSnapshot.val().pincode+'</td><td>'+childSnapshot.val().city+'</td><td><a href="https://firebasestorage.googleapis.com/v0/b/lostandfound-72457.appspot.com/o/myImages%2F'+childSnapshot.val().victim_photo+'?alt=media" target="_blank"><img src="https://firebasestorage.googleapis.com/v0/b/lostandfound-72457.appspot.com/o/myImages%2F'+childSnapshot.val().victim_photo+'?alt=media" style="width:100px;height:100px;"></a></td></tr>';
				
				
				$("#tabledata").append(fields);	
				i++;	
			}
	
	  });
	});
		
	

 }
 var userId = sessionStorage.getItem("login_id");
 // setTimeout(function(){ $("#abc").click(); }, 1000);
  </script>

  <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
</body>

</html>