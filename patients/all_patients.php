<?php //include("includes/header.php"); ?>



<div class="well"  style="width: 70%">
  <table class="table">
    <thead>
    <tr>
    
      <th scope="col">Patient Number</th>
      <th scope="col">Full Name</th>
      <th scope="col">Sex</th>
      <th scope="col">Age</th>
      <th scope="col">Address</th>      
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php  

     $patient = Patient::find_all();

        foreach ($patient as $a_patient): ?>

        
     <tr>
     
      

      <td><?php  echo $a_patient->patient_no; ?></td>
      <td><?php  echo $a_patient->firstname . " " . $a_patient->lastname; ?></td>
      <td><?php  echo $a_patient->sex; ?></td>
      <td><?php  echo $a_patient->dob; ?></td>
      <td><?php  echo $a_patient->house_no . " " . $a_patient->area . " " . $a_patient->location; ?></td>
      <td>
          <a href="patients/view_patient.php?id=<?php echo $a_patient->id ?>& patient_no=<?php echo $a_patient->patient_no ?>" role="button" class="btn btn-info">
            View
          </a>
      </td>
       
    </tr>

   
  <?php  endforeach; ?>
    
  </tbody>
  </table>
</div>