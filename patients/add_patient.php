<?php include("includes/header.php"); ?>

<?php

	if(isset($_POST['submit'])){

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

	}

?>

<div class=""  style="width: 80%">

  <div class="btn-danger" style=" padding: 1px; margin: 5px 0 20px 0; height: 70px; width:100%; border-radius: 2px">
    <h2><span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="margin-right: 5px"></span>Add Patient</h2>
  </div>
	<form class="form" action="" method="post" >

    <div class="form-group row">
      <div class="col-sm-6">
        <label for="inputEmail3" class="col-form-label">Patient Number</label>
        <input type="text" class="form-control" name="patient_no" placeholder="Folder Number">
      </div>
      <div class="col-sm-6">
        <label for="inputEmail3" class="col-form-label">Date</label>
        <input type="text" class="form-control" name="date_of_first_appointment" placeholder="date_of_first_appointment" value="<?php echo date("d-m-Y"); ?>">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-6">
        <label for="inputEmail3" class="col-form-label">First Name</label>
        <input type="text" class="form-control" name="firstname" placeholder="Given Name">
      </div> 
      <div class="col-sm-6">
        <label for="inputEmail3" class="col-form-label">Last Name</label>
        <input type="text" class="form-control" name="lastname" placeholder="Surname Name">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-6">
     
       <label for="inputEmail3" class="col-form-label">Sex</label> 
      <select class="form-control" id="exampleFormControlSelect1" name="sex">
          <option class="disabled">Select</option>
          <option>Male</option>
          <option>Female</option>
          
        </select>
      </div>
    
      <div class="col-sm-6">
       <label for="inputEmail3" class="col-form-label">Date of Birth</label>
        <input type="date" class="form-control" name="dob" placeholder="Date of Birth">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-3">
        <label for="inputEmail3" class="col-form-label">House Number</label>
        <input type="text" class="form-control" name="house_no" placeholder="Home Address">
      </div>
      <div class="col-sm-3">
        <label for="inputEmail3" class="col-form-label">Area</label>
        <input type="text" class="form-control" name="area" placeholder="Area">
      </div>
      <div class="col-sm-3">
        <label for="inputEmail3" class="col-form-label">Town/City</label>
        <input type="text" class="form-control" id="inputEmail3" placeholder="Village/Town/City" name="location" >
      </div>
      <div class="col-sm-3">
        <label for="inputEmail3" class="col-form-label">Phone Number</label>
        <input type="text" class="form-control" id="inputEmail3" placeholder="Phone Number" name="phone">
      </div>
    </div>
  	<div class="form-group row">		
  		<div class="col-sm-4">
        <label for="inputEmail3" class="col-form-label">Emergency Contact Person</label>
   	 		<input type="text" class="form-control" id="inputEmail3" placeholder= "Emergency Contact Person Name" name="contact_person">
 			</div>
      <div class="col-sm-4">
        <label for="inputEmail3" class="col-form-label">Relationship</label>
        <select class="form-control" id="exampleFormControlSelect1" name="relationship">
          <option class="disabled">Select</option>
          <option>Sibling</option>
          <option>Father</option>
          <option>Mother</option>
          <option>Son</option>
          <option>Daugther</option>
          <option>Spouse</option>
        </select>
      </div>
      <div class="col-sm-4">
        <label for="inputEmail3" class="col-form-label">Phone Number</label>
        <input type="text" class="form-control" id="inputEmail3" placeholder="Phone Number Of Relative" name="contact_person_phone">
      </div>
  	</div>
  	
  	<div class="form-group row">
      <div class="col-sm-4 col-sm-offset-4">
        <button class="btn btn-danger" type="submit" name="submit">Save Patient</button>
      </div>
  		
  	</div>
  	
	</form>
</div>