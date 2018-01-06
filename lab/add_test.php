<?php include("includes/header.php"); ?>

<?php

	if(isset($_POST['submit'])){

    $test_name            = trim($_POST['test_name']);
    $description          = trim($_POST['description']);
    $test_sample          = trim($_POST['test_sample']);
    $fee                  = trim($_POST['fee']);

	

		$insert_test = new Lat_tests();
          ///insert to inventory table
   
     $insert_test->test_name          = $test_name;
     $insert_test->description        = $description;
     $insert_test->test_sample        = $test_sample;
     $insert_test->fee                = $fee;

     $insert_test->create();
      redirect("laboratory.php");

	}

?>

<div class=""  style="width: 80%">

  <div class="btn-danger" style=" padding: 1px; margin: 5px 0 20px 0; height: 70px; width:100%; border-radius: 2px">
    <h2><span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="margin-right: 5px"></span>Add New Test</h2>
  </div>
	<form class="form" action="" method="post" >

    <div class="form-group row">
      <div class="col-sm-6">
        <label class="col-form-label">Test Name</label>
        <input type="text" class="form-control" name="test_name">
      </div>
      <div class="col-sm-6">
        <label class="col-form-label">Description</label>
        <input type="text" class="form-control" name="description" >
      </div>
    </div>
   
    <div class="form-group row">
      <div class="col-sm-6">
       	<label class="col-form-label">Test Sample</label> 
     		<input type="text" class="form-control" name="test_sample" placeholder="" >
      </div>
    
      <div class="col-sm-6">
       <label class="col-form-label">Fee</label>
        <input type="text" name="fee" class="form-control">
      </div>
    </div>
  	
  	<div class="form-group row">
      <div class="col-sm-4 col-sm-offset-4">
      	<a href="laboratory.php" role="button" class="btn btn-danger">Cancel</a>
        <button class="btn btn-danger" type="submit" name="submit">Save Item</button>
      </div>
  		
  	</div>
  	
	</form>
</div>