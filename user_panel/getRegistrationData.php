<?php
	$array = $_POST['array'];
	// print_r($array);
	$b = json_decode(json_encode($array), true);
	print_r($b);
	foreach($b as $a){
		echo $a['fname'];
	}
	exit();
	
?>
<table id="m_table" class="table table-hover">
  <thead class="text-primary">
	<tr>
		<td>#</td>
		<td >First Name</td> 
		<td >Last Name</td>
		<td >DOB</td>
		<td >Parent Name</td>
		<td >Address</td>
		<td >Phone</td>
		<td >Pin</td>
		<td >City</td>
		<td >Country</td>
		<td >Photo</td>
	</tr>
  </thead>
  <tbody>
	<?php $i=1; foreach($array as $value){ ?>; 
	<tr>
		<td><?= $i; ?></td>
		<td><?= $value['fname']; ?></td>
		<td><?= $value['lname']; ?></td>
		<td><?= $value['dob']; ?></td>
		<td><?= $value['parent_name']; ?></td>
		<td><?= $value['address']; ?></td>
		<td><?= $value['phone']; ?></td>
		<td><?= $value['pincode']; ?></td>
		<td><?= $value['city']; ?></td>
		<td><?= $value['country']; ?></td>
		<td><?= $value['victim_photo']; ?></td>
	</tr>
	<?php $i++; } ?>
  </tbody>
</table>