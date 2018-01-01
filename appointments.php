<?php include("includes/header.php"); ?>


  <!-- Navigation -->
  <nav class="navbar navbar-fixed-top" role="navigation">
   
      <?php include("includes/top_nav.php") ?>

<?php			
	if(empty($_GET['id'])) {
		redirect("patients.php?all_patients");
	}else{

		$appointment = Appointment::find_by_id($_GET['id']);

		if(isset($_POST['update'])) {
			if($appointment) {
				$appointment->bp = $_POST['bp'];
				$appointment->weight = $_POST['weight'];
				$appointment->temperature = $_POST['temperature'];

				$appointment->save();
				redirect("appointments.php?id={$appointment->id}&patient_no={$appointment->patient_no}");
			}
		}
	}
?>


<?php

				$staff = Staff::find_by_id($_SESSION['user_id']);
				$patient = Patient::find_by_patient_no($_GET['patient_no']);

				if(isset($_POST['save_diagnose'])){
					$date = $_POST['date'];
					$time = $_POST['time'];
					$patient_no = $patient->patient_no;
					$appointment_id = $appointment->id;
					$doctor = $staff->full_name;
					$primary_complain = $_POST['primary_complain'];
					$symptoms = $_POST['symptoms'];
					$no_of_days = $_POST['no_of_days'];
					$physical_exam = $_POST['physical_exam'];
					$diagnosis = $_POST['diagnosis'];

					$investigation = new Investigation();

					$investigation->date = $date;
					$investigation->time = $time;
					$investigation->patient = $patient_no;
					$investigation->appointment = $appointment_id;
					$investigation->doctor = $doctor;
					$investigation->primary_complain = $primary_complain;
					$investigation->symptoms = $symptoms;
					$investigation->no_of_days = $no_of_days;
					$investigation->physical_exam = $physical_exam;
					$investigation->diagnosis = $diagnosis;

					$investigation->save();
					redirect("appointments.php?id={$appointment_id}&patient_no={$patient_no}");


				}
?>
     
      

  </nav>


  <div id="page-wrapper" class="row">

    <div class="col-sm-3">
      <?php  include("includes/side_nav.php") ?>
    </div>


        <div class="col-sm-9">

          <div class="row">

            <div class="col-lg-12" style="padding-left: 0px">

            	<?php 


								 if(isset($_GET['id'])){


							   $appointment = Appointment::find_by_id($_GET['id']);
							   $patient     = Patient::find_by_patient_no($_GET['patient_no']);

							    
										
            	if($appointment):  ?>	
              <h1 class="page-header">
                  <i class="fa fa-file-archive-o" style="color: red" aria-hidden="true"></i>
                    Patients Appoitment: <?php echo $appointment->appointment_date;  ?>
                    <a href="patients/view_patient.php?id=<?php echo $patient->id; ?>&patient_no=<?php echo $patient->patient_no  ?>" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span>Back</a>
              </h1>

              <div class="well row">
              	<div class="col-sm-3" style="border-right: 1px solid green;">
              	<h3 style="border-bottom: 1px dotted red;  margin-top: 0px">Patient Vitals</h3>
	              	<p><span style="font-weight: bold"> Blood Presure: </span> <?php echo $appointment->bp; ?></p>
	              	<p><span style="font-weight: bold"> Temperature:  </span> <?php echo $appointment->temperature; ?> </p>
	              	<p><span style="font-weight: bold"> Weight:  </span> <?php echo $appointment->weight; ?> </p>
              	</div>
              	<div class="col-sm-9">
              	<h3 style="border-bottom: 1px dotted red; margin-top: 0px ">Patient Investigation</h3>
              	<?php  
              		$the_investigation = Investigation::find_by_patient_no($patient->patient_no);
              		if($the_investigation):
              	 ?>
              		
              		<p><strong>Primary Complain: </strong><?php echo $the_investigation->primary_complain;  ?></p>
              		<p><strong>Symptoms: </strong><?php echo $the_investigation->symptoms;  ?></p>
              		<p><strong>Number of days: </strong><?php echo $the_investigation->no_of_days;  ?></p>
              		<p><strong>Physical Examination: </strong><?php echo $the_investigation->physical_exam;  ?></p>
              		<p><strong>Diagnosis: </strong><?php echo $the_investigation->diagnosis;  ?></p>
              		<p><strong>Diagnose by: </strong><?php echo $the_investigation->doctor;  ?></p>
              	<?php endif ?>
              	</div>
              </div>
            <?php endif ; } ?>

              <ul style="margin-top: 50px; margin-left: 20px; margin-bottom: 20px">
                <button " style="margin-left: 50px" onclick="vitalsFunction()" class="btn btn-success">
                	<i class="fa fa-plus" id="vitals_button"></i> Add Vitals
                </button>
                <button style="margin-left: 50px" onclick="diagnosisFunction()" class="btn btn-success">
                	<i class="fa fa-table"> </i> Diagnosis
                </button>
                <button class="btn btn-success" style="margin-left: 50px" onclick="diagnosis">
                	<i class="fa fa-plus"></i>Request Lab
                </button>
                <button class="btn btn-success" style="margin-left: 50px">
                	<i class="fa fa-table"></i> Procedures
                </button>
                <button class="btn btn-success" style="margin-left: 50px">
                	<i class="fa fa-table"></i> Prescriptions
                </button>

              </ul>

            </div>
          </div>

          	<!-- vitals form -->
          <div  style="width: 70%; display: none;" id="vitals_form">

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
					        <button class="btn btn-danger" type="submit" name="update">Update</button>
					      </div>	
					  	</div>
					  	
						</form>
					</div>

							<!-- diagnose form -->
				  <div  style="width: 90%; display: none;" id="diagnose_form">

					  <div class="btn-danger" style=" padding: 1px; margin: 5px 0 20px 0; height: 70px; width:100%; border-radius: 2px">
					    <h2><span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="margin-right: 5px"></span>Patient Diagnosis
<?php
/*$staff = Staff::find_by_id($_SESSION['user_id']);
echo $staff->full_name;*/
				/*$patient = Patient::find_by_patient_no($_GET['patient_no']);
				echo $patient->patient_no;*/

?>
					    </h2>
					  </div>
						<form class="form" action="" method="post" >

					    <div class="form-group row">
					      <div class="col-sm-6">
					        <label class="col-form-label">Date</label>
					        <input type="text" class="form-control" name="date" value="<?php echo date('d-m-Y'); ?>">
					      </div>
					      <div class="col-sm-6">
					        <label class="col-form-label">Time</label>
					        <input type="text" class="form-control" name="time" value="<?php date_default_timezone_set("UTC"); echo Date("H:i:s");  ?>">
					      </div>
					    </div>
					    <div class="form-group row">
					       
					      <div class="col-sm-6">
					        <label class="col-form-label">Complains</label>
					        <textarea type="text" class="form-control" name="primary_complain" ></textarea> 
					      </div>
					      <div class="col-sm-6">
					        <label class="col-form-label">Symptoms</label>
					        <textarea type="text" class="form-control" name="symptoms" ></textarea> 
					      </div>
					    </div>
					    <div class="form-group row">      
					      <div class="col-sm-6">
					        <label class="col-form-label">Number Of Days</label>
					        <input type="text" class="form-control" name="no_of_days" >
					      </div>
					      <div class="col-sm-6">
					        <label class="col-form-label">Physical Examination</label>
					        <textarea type="text" class="form-control" name="physical_exam" ></textarea> 
					      </div>
					    </div>
					    <div class="form-group row"> 
					      <div class="col-sm-6">
					        <label class="col-form-label">Diagnose</label>
					        <textarea type="text" class="form-control" name="diagnosis" ></textarea> 
					      </div>
					    </div>
					  	
					  	<div class="form-group row">
					      <div class="col-sm-4 col-sm-offset-4">
					        <button class="btn btn-danger" type="submit" name="save_diagnose">Save</button>
					      </div>	
					  	</div>
					  	
						</form>
				</div>
            


 						

        </div>


            


  </div><!-- /#page-wrapper -->



    <script type="text/javascript">
    				function vitalsFunction() {
    					var x = document.getElementById("vitals_form");

    					if(x.style.display==="none") {
    						x.style.display = "block";

    					}else{

    						x.style.display="none";
    					}
    				}

    				function diagnosisFunction() {
    					var x = document.getElementById("diagnose_form");

    					if(x.style.display === "none") {
    						x.style.display = "block";

    					}else{
    						x.style.display = "none";
    					}
    				}
    </script>

<?php include("includes/footer.php"); ?>