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

							   }
										
            	if($appointment):  ?>	
              <h1 class="page-header">
                  <i class="fa fa-file-archive-o" style="color: red" aria-hidden="true"></i>
                    Patients Appoitment: <?php echo $appointment->appointment_date;  ?>
              </h1>

              <div class="well row">
              	<div class="col-sm-3" style="border-right: 1px solid green">
              	<h3 style="border-bottom: 1px dotted red">Patient Vitals</h3>
	              	<p><span style="font-weight: bold"> Blood Presure: </span> <?php echo $appointment->bp; ?></p>
	              	<p><span style="font-weight: bold"> Temperature:  </span> <?php echo $appointment->temperature; ?> </p>
	              	<p><span style="font-weight: bold"> Weight:  </span> <?php echo $appointment->weight; ?> </p>
              	</div>
              	<div class="col-sm-3">
              		<h3 style="border-bottom: 1px dotted red">Patient Investigation</h3>
              	</div>
              </div>
            <?php endif;  ?>

              <ul style="margin-top: 50px; margin-left: 20px; margin-bottom: 20px">
                <button " style="margin-left: 50px" onclick="vitalsFunction()">
                	<i class="fa fa-plus" id="vitals_button"></i> Add Vitals
                </button>
                <a href="appointments.php?diagnoses" style="margin-left: 50px"><i class="fa fa-table"></i> Tests/Diagnoses</a>
                <a href="appointments.php?rocedures" style="margin-left: 50px"><i class="fa fa-table"></i> Procedures</a>
                <a href="appointments.php?prescriptions" style="margin-left: 50px"><i class="fa fa-table"></i> Prescriptions</a>

              </ul>

            </div>
          </div>

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
    </script>

<?php include("includes/footer.php"); ?>