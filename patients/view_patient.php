<?php include("../includes/header.php"); ?>

<?php

	$activate_bio = "active";
	$activate_appointments = "";

	if(isset($_POST['submit'])) {

		//$patient = Patient::find_by_id($_GET['id']);

		//$patient_id = $patient->id;
		$patient_no         = trim($_POST['patient_no']);
		$appointment_date   = trim($_POST['appointment_date']);
		$reason             = trim($_POST['reason']);
		$appointment_status = "Open";

		$appointment = new Appointment();

		//$appointment->patient_id = $patient_id;
		$appointment->patient_no       = $patient_no;
		$appointment->appointment_date = $appointment_date;
		$appointment->reason           = $reason;
		$appointment->status           = $appointment_status;
	
		$appointment->create();

		redirect("patients/view_patient.php?id=echo $a_patient->id & patient_no= echo $a_patient->patient_no ");
		$activate_bio = "";
		$activate_appointments = "active";

	}
?>

<?php

	if(isset($_GET['id'])){
			$patient = Patient::find_by_id($_GET['id']);

	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/view_patient.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- Navigation -->
        <nav class="navbar navbar-fixed-top" role="navigation">
         
            <?php include("page-parts/top_nav.php");  ?>

			  </nav>

 	<div id="page-wrapper" class="row">

			             <div class="col-sm-3">


			                 <?php include("page-parts/side_nav.php"); ?>
			            </div>

   	<div class="col-sm-9">
			
			  <h1 class="page-header">
			      <i class="fa fa-file-archive-o" style="color: red" aria-hidden="true"></i>
			 				Patient Number: <?php echo $patient->patient_no; ?>
			 				<a href="../patients.php?all_patients" class="btn btn-danger">
			 					<span class="glyphicon glyphicon-arrow-left"> </span>Back to Patients
			 				</a>
			  </h1>

			  <ul class="nav nav-tabs">
			    <li class="active"><a href="#tab1" data-toggle="tab">Information</a></li>  
			    <li><a href="#tab2" data-toggle="tab">Vitals</a></li>
			    <li><a href="#tab3" data-toggle="tab">Insuarance</a></li>
			    <li><a href="#tab4" data-toggle="tab">Appointments</a></li>
			    <li><a href="#tab5" data-toggle="tab">Bills</a></li>
			  </ul>
			  <div class="tab-content">
			    <div class="tab-pane <?php  echo $activate_bio; ?>" id="tab1">
			      <div class="panel panel-default">
			        <div class="panel-heading">
			          <h4 class="panel-title"> Patient Bio </h4>
			        </div>
			        
			          <div class="panel-body row">
			          	<div class="col-sm-6 panel">
			          		<div class="panel-heading bg-info">
			          			<h4>Personal Information</h4>
			          		</div>
			          		<div class="panel-body">
			          			
			          			<p><span class="bio-info-columns"> First Appointment:  </span> <?php echo $patient->date_of_first_appointment; ?> </p>
			          			<p><span class="bio-info-columns"> Name:  </span><?php echo $patient->firstname . " " . $patient->lastname ; ?> </p>
			          			<p><span class="bio-info-columns"> Data of Birth:  </span> <?php echo $patient->dob; ?></p>
			          			<p><span class="bio-info-columns"> Sex:  </span> <?php echo $patient->sex; ?> </p>
			          			<p><span class="bio-info-columns"> Phone:  </span> <?php echo $patient->phone; ?> </p>
			          			<p><span class="bio-info-columns"> Address:  </span> </p>
			          			<p style="margin-left: 25px"> <?php echo $patient->house_no; ?></p>
			          			<p style="margin-left: 25px"> <?php echo $patient->area; ?></p>
			          			<p style="margin-left: 25px"> <?php echo $patient->location; ?></p>
			          		</div>

			          	</div>
			          	<div class="col-sm-6 panel">
			          		<div class="panel-heading bg-info">
			          			<h4>Emergency Contact</h4>
			          		</div>
			          		<div class="panel-body">
			          			<p><span class="bio-info-columns"> Contact Person:  </span> <?php echo $patient->contact_person; ?> </p>
			          			<p><span class="bio-info-columns"> Relationship:  </span><?php echo $patient->relationship ; ?> </p>
			          			<p><span class="bio-info-columns"> Phone:  </span> <?php echo $patient->phone; ?>
			          		</div>
			          	</div>

			          </div>
			      	<div class="row">
			      		<div class="col-sm-4 col-sm-offset-4">
			      			<a href="edit_patient.php?id=<?php echo $patient->id ?>" class="btn btn-danger">Edit Patient</a>
			      		</div>
			      	</div>
			      </div>
			    </div>
			    <div class="tab-pane" id="tab2">
			      <div class="panel panel-default">
			        <div class="panel-heading">
			          <h4 class="panel-title"> Patient Vitals</h4>
			        </div>
			         <div class="panel-body">
			            <table class="table">
										    <thead>
										    <tr>
										    	<th scope="col">ID</th>
										      <th scope="col">Patient Number</th>
										      <th scope="col">Appointment Date</th>   
										      <th scope="col">Status</th>  
										      <th scope="col">Action</th>
										    </tr>
										  </thead>
										  <tbody>
										    <?php  

										    if(isset($_GET['id'])){

												$appointments = Appointment::find_all();
											
													if($appointments){
												foreach ($appointments as $appointment): 

													?>
										     
										     <tr>
										     	<?php if ($appointment->patient_no===$patient->patient_no AND $appointment->status==="Open") {
										     		echo "
										     		<td>{$appointment->id}</td>
										     		<td>{$appointment->patient_no}</td>
											      <td>{$appointment->appointment_date}</td>
											      <td>{$appointment->status}</td>
											      <td>
											          <a href='' role='button' class='btn btn-info'>
											            Take Vitals
											          </a>
											      </td>";
										     	}  ?>      
										    </tr>   
										  <?php  endforeach; } }?>
										    
										  </tbody>
  									</table>
			          </div>
			      </div>

			      <!-- <div class="well">

			 
			  	<h2>Patient Vitals</h2>
			  	<form action="" method="post">
			  		<div class="row">
			  			<div class="form-group col-sm-6">
								<label>Blood Pressure</label>
								<input type="text" name="bp" class="form-control">
							</div>
							<div class="form-group col-sm-6">
								<label>Weight</label>
								<input type="text" name="weight" class="form-control">
							</div>
			  		</div>
			  		<div class="row">
			  			<div class="form-group col-sm-6">
								<label>Temperature</label>
								<input type="text" name="temperature" class="form-control">
							</div>
			  		</div>

							<div class="form-group">
								<button class="btn btn-info" type="submit" name="update">Update</button>
							</div>
									  		
			  	</form>
			  </div> -->
			    </div>
			    <div class="tab-pane" id="tab3">
			      <div class="panel panel-default">
			        <div class="panel-heading">
			          <h4 class="panel-title"> Insuarance </h4>
			        </div>
			          <div class="panel-body">
			          	<div class="jumbotron"><h2>Insurance</h2></div>
			          </div>
			      </div>
			    </div>
			    <div class="tab-pane <?php  echo $activate_appointments; ?>" id="tab4">
							 <div class="panel panel-default">
					        <div class="panel-heading row">
					          <h4 class="panel-title col-sm-4">View Appointments</h4>
					          <button class="btn btn-danger col-sm-4" onclick="formFunction()">
      								Schedule Appoitment
      							</button>
					        </div>
					          <div class="panel-body">
					           		<table class="table">
										    <thead>
										    <tr>
										      <th scope="col">Patient Number</th>
										      <th scope="col">Appointment Date</th> 
										      <th scope="col">Reason</th>   
										      <th scope="col">Status</th>  
										      <th scope="col">Action</th>
										    </tr>
										  </thead>
										  <tbody>
										    <?php  

										    if(isset($_GET['id'])){

												$appointments = Appointment::find_all();
											
													if($appointments){
												foreach ($appointments as $appointment): 

													?>
										     
										     <tr>
										     	<?php if ($appointment->patient_no===$patient->patient_no) {
										     		echo "<td> {$appointment->patient_no}</td>
											      <td>{$appointment->appointment_date}</td>
											      <td>{$appointment->reason}</td>
											      <td>{$appointment->status}</td>
											      <td>
											          <a href='../appointments.php?id={$appointment->id} & patient_no={$appointment->patient_no}' role='button' class='btn btn-info'>
											            View
											          </a>
											      </td>";
										     	}  ?>   
										       
										    </tr>   
										  <?php  endforeach; } }?>										    
										  </tbody>
  									</table>

  								<div class="well" style="display: none;"  id="appointment_form">
								  	<h2>Schedule Patient</h2>
								  	<form action="" method="post">
								  		<div class="row">
								  			<div class="form-group col-sm-6">
													<label>Date</label>
													<input type="text" name="appointment_date" class="form-control" value="<?php echo date('d-m-Y');  ?>">
												</div>
												<div class="form-group col-sm-6">
													<label>Patient Number</label>
													<input type="text" name="patient_no" class="form-control" value="<?php echo $_GET['patient_no']; ?>">
												</div>
								  		</div>
								  		<div class="row">
								  			<div class="form-group col-sm-6">
													<label>Reason</label>
													<input type="text" name="reason" class="form-control">
												</div>
								  		</div>

												<div class="form-group">
													<button class="btn btn-info" type="submit" name="submit">Save</button>
												</div>
														  		
								  	</form>
			  					</div>
			          </div>
			      </div>
			    </div>
			    <div class="tab-pane" id="tab5">
			      <div class="panel panel-default">
			        <div class="panel-heading">
			          <h4 class="panel-title"> Patient Bills </h4>
			        </div>
			          <div class="panel-body">
			          	<div class="jumbotron"><h2>Bills</h2></div>
			          </div>
			      </div>
			    </div>
			  </div>

		</div><!--col-sm-9-->

   </div><!-- /#page-wrapper -->


   <!-- jQuery -->
    <script src="js/jquery.js"></script>



    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


    <script type="text/javascript" src="js/scripts.js">
        
    </script>

    <script type="text/javascript">
            function formFunction() {
              var x = document.getElementById("appointment_form");

              if(x.style.display==="none") {
                x.style.display = "block";

              }else{

                x.style.display="none";
              }
            }
    </script>

</body>
</html>
        