<?php include("includes/header.php"); ?>

<?php
   if(isset($_GET['id'])){


   $appointment = Appointment::find_by_id($_GET['id']);

   }
            
?>

<?php

	/*if(isset($_POST['submit'])){

    $patient_no                = trim($_POST['patient_no']);
		$date_of_first_appointment = trim($_POST['date_of_first_appointment']);
    $firstname                 = trim($_POST['firstname']);
    $lasttname                 = trim($_POST['lastname']);
    $sex                       = trim($_POST['sex']);
    $dob                       = trim($_POST['dob']);
    $house_no                  = trim($_POST['house_no']);
    $area                      = trim($_POST['area']);
    $location                  = trim($_POST['location']);
    $phone                     = trim($_POST['phone']);
    $contact_person            = trim($_POST['contact_person']);
    $relationship              = trim($_POST['relationship']);
    $contact_person_phone      = trim($_POST['contact_person_phone']);

		$patient = new Patient();

          $patient->patient_no               = $patient_no;
          $patient->date_of_first_appointment= $date_of_first_appointment;
          $patient->firstname                = $firstname;
          $patient->lasttname                = $lasttname;
          $patient->sex                      = $sex;
          $patient->dob                      = $dob;
          $patient->house_no                 = $house_no;
          $patient->area                     = $area;
          $patient->location                 = $location;
          $patient->phone                    = $phone;
          $patient->contact_person           = $contact_person;
          $patient->relationship             = $relationship;
          $patient->contact_person_phone     = $contact_person_phone;
         

        
          $patient->create();

	}*/

?>

<div class=""  style="width: 80%">

  <div class="btn-danger" style=" padding: 1px; margin: 5px 0 20px 0; height: 70px; width:100%; border-radius: 2px">
    <h2><span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="margin-right: 5px"></span>Patient Vitals</h2>
  </div>
	<form class="form" action="" method="post" >

    <div class="form-group row">
      <div class="col-sm-6">
        <label class="col-form-label">Blood Presure</label>
        <input type="text" class="form-control" name="bp">
      </div>
      <div class="col-sm-6">
        <label class="col-form-label">Temperature</label>
        <input type="text" class="form-control" name="temperature">
      </div>
    </div>
    <div class="form-group row">
       
      <div class="col-sm-6">
        <label class="col-form-label">Weight</label>
        <input type="text" class="form-control" name="weight" >
      </div>
    </div>
  	
  	<div class="form-group row">
      <div class="col-sm-4 col-sm-offset-4">
        <button class="btn btn-danger" type="submit" name="submit">Update</button>
      </div>	
  	</div>
  	
	</form>
</div>