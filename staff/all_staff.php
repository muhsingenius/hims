<?php include("includes/header.php"); ?>


<div class="well"  style="width: 70%">
  <table class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
    
      <th scope="col">Full Name</th>
      <th scope="col">Sex</th>
      <th scope="col">Department</th>
      <th scope="col">Will Sign In</th>      
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php  

     $staff = Staff::find_all();

        foreach ($staff as $a_staff): ?>

        
     <tr>
     
    
      <td><?php  echo $a_staff->full_name; ?></td>
      <td><?php  echo $a_staff->sex; ?></td>
      <td><?php  echo $a_staff->department; ?></td>
      <td><?php  echo $a_staff->will_sign_in; ?></td>

        <td> 
          <a href="view_staff.php?id=<?php echo $a_staff->id; ?>" role="button" class="btn btn-success"><span class="glyphicon glyphicon-folder-open"></span> </a>
          <a href="" role="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></a>
          <a href="" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
        </td>
       
    </tr>

   
  <?php  endforeach; ?>
    
  </tbody>
  </table>
</div>