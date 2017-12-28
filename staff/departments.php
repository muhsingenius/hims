<?php include("includes/header.php"); ?>

<?php

	if(isset($_POST['submit'])){
		 
		$department = trim($_POST['department']);


		$departments = new Department();

          
          $departments->department = $department;

        
          $departments->create();

          redirect("staff.php?departments");

	}

?>

<div class="well"  style="width: 70%">
  <table class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
    
      <th scope="col">#</th>
      <th scope="col">Department</th>      
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php  

     $departments = Department::find_all();

        foreach ($departments as $department): ?> 
     <tr>
     
    
      <td><?php  echo $department->id; ?></td>
      <td ><?php  echo $department->department; ?></td>


        <td> 
        	<a href="" role="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></a>
        	<a href="" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>

        </td>
       
    </tr>

  <?php  endforeach; ?>

   
  </tbody>
  </table>

   <button class="btn btn-primary" onclick="formFunction()" ><span class="glyphicon glyphicon-plus"></span>Add</button>
</div>

<div class="well"  style="width: 70%; display: none" id="department_form">

<h2 style="height: 50px; margin-left: 40%">Staff Departments</h2>
	<form action="" method="post" >

		<div class="form-group row">
	  		<label for="inputEmail3" class="col-sm-2 col-form-label">Department</label>
	  		<div class="col-sm-8">
   	 		<input type="text" class="form-control" id="inputEmail3" name="department">
 			</div>
 			<div class="form-group col-sm-2">
  		<button class="btn btn-danger" type="submit" name="submit">Save</button>
  	</div>
  		</div>
  	
  	
  	
	</form>
</div>


    <script type="text/javascript">
    				function formFunction() {
    					var x = document.getElementById("department_form");

    					if(x.style.display==="none") {
    						x.style.display = "block";

    					}else{

    						x.style.display="none";
    					}
    				}
    </script>