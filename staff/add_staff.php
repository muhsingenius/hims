<?php include("includes/header.php"); ?>

<?php

	if(isset($_POST['submit'])){
		$full_name = trim($_POST['full_name']);
		$sex = trim($_POST['sex']);
		$department = trim($_POST['department']);
		$will_sign_in = trim($_POST['will_sign_in']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$repeat_password = trim($_POST['repeat_password']); 
		$role = trim($_POST['role']);


		$staff = new Staff();

          $staff->full_name = $full_name;
          $staff->sex = $sex;
          $staff->department = $department;
          $staff->will_sign_in = $will_sign_in;
          $staff->username = $username;
          $staff->password = $password;
          $staff->role = $role;

        
          $staff->create();
          redirect("staff.php?all_staff");

	}

?>

<div class="well"  style="width: 70%">

<h2 style="height: 50px; margin-left: 40%">Add Staff</h2>
	<form action="" method="post" >

		<div class="form-group row">
  		<label for="inputEmail3" class="col-sm-2 col-form-label">Full Name</label>
  		<div class="col-sm-10">
   	 		<input type="text" class="form-control" id="inputEmail3" name="full_name">
 			</div>
  	</div>
  	<div class="form-group row">
  		<label for="inputEmail3" class="col-sm-2 col-form-label">Sex</label>
  		<div class="col-sm-10">
   	 		<select class="form-control" id="exampleFormControlSelect1" name="sex">
		      <option class="disabled">Select</option>
		      <option>Male</option>
		      <option>Female</option>
    		</select>
 			</div>
  	</div>
  	<div class="form-group row">

       <?php    
          $departments = Department::find_all();
       ?>
  		<label for="inputEmail3" class="col-sm-2 col-form-label">Department</label>
  		<div class="col-sm-10">
   	 		<select class="form-control" id="exampleFormControlSelect1" name="department">
		      <option class="disabled">---Select---</option>
		      <?php
            foreach ($departments as $department) {
              echo "

                <option>{$department->department}</option>
              ";
            }
          ?>
    		</select>
 			</div>
  	</div>
  	<div class="form-group row">
  		<label for="inputEmail3" class="col-sm-2 col-form-label">Will Sign In?</label>
  		<div class="col-sm-10">
   	 		<select class="form-control" id="exampleFormControlSelect1" name="will_sign_in" id="will_sign_in">
		      <option class="disabled">---Select---</option>
		      <option>Yes</option>
		      <option>No</option>
    		</select>
 			</div>
  	</div>

  	<div id="login_fields" style="display: none;" >
  
  		<div class="form-group row" >
    		<label for="inputEmail3" class="col-sm-2 col-form-label">User Name</label>
    		<div class="col-sm-10">
     	 		<input type="text" class="form-control" id="inputEmail3"  name="username" >
   			</div>
  	 </div>
  	<div class="form-group row">
  		<label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
  		<div class="col-sm-10">
   	 		<input type="text" class="form-control" id="inputEmail3" name="password" id="password" value="">
 			</div>
  	</div>
  	<div class="form-group row">
    <?php    
      $roles = Role::find_all();
    ?>
  		<label for="inputEmail3" class="col-sm-2 col-form-label">role</label>
  		<div class="col-sm-10">
   	 		<select class="form-control" id="exampleFormControlSelect1" name="role">
		      <option class="disabled">---Select---</option>

          <?php
            foreach ($roles as $role) {
              echo "
                <option>{$role->role}</option>
              ";
            }
          ?>      
    		</select>
 			</div>
  	</div>

  	</div>
  	
  	<div class="form-group row">
  		<button class="btn btn-danger" type="submit" name="submit">Save Staff</button>
  	</div>
  	
	</form>
</div>