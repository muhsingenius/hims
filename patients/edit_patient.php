<?php include("../includes/header.php"); ?>

<?php

	if(empty($_GET['id'])) {

		redirect("../patients.php");

	}else{

			$patient = Patient::find_by_id($_GET['id']);

			if(isset($_POST['update'])) {

				if($patient) {

				$patient->patient_no                = $_POST['patient_no'];
				$patient->date_of_first_appointment = $_POST['date_of_first_appointment'];
			    $patient->firstname                 = $_POST['firstname'];
			    $patient->lastname                  = $_POST['lastname'];
			    $patient->sex                       = $_POST['sex'];
			    $patient->dob                       = $_POST['dob'];
			    $patient->house_no                  = $_POST['house_no'];
			    $patient->area                      = $_POST['area'];
			    $patient->location                  = $_POST['location'];
			    $patient->phone                     = $_POST['phone'];
			    $patient->contact_person            = $_POST['contact_person'];
			    $patient->relationship              = $_POST['relationship'];
			    $patient->contact_person_phone      = $_POST['contact_person_phone'];
         
          $patient->save();

				}
					

			}

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
   
      <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
	          <span class="sr-only">Toggle navigation</span>
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span>
	      </button>
						 <a class="navbar-brand" href="../index.php">Tizaa Hospital</a>
			</div>
<!-- Top Menu Items --> 
			  <ul class="nav navbar-right top-nav">
			      <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
			          <ul class="dropdown-menu message-dropdown">
			              <li class="message-preview">
			                  <a href="#">
			                      <div class="media">
			                          <span class="pull-left">
			                              <img class="media-object" src="#" alt="">
			                          </span>
			                          <div class="media-body">
			                              <h5 class="media-heading">
			                                  <strong>John Smith</strong>
			                              </h5>
			                              <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
			                              <p>Lorem ipsum dolor sit amet, consectetur...</p>
			                          </div>
			                      </div>
			                  </a>
			              </li>
			              <li class="message-preview">
			                  <a href="#">
			                      <div class="media">
			                          <span class="pull-left">
			                              <img class="media-object" src="#" alt="">
			                          </span>
			                          <div class="media-body">
			                              <h5 class="media-heading">
			                                  <strong>John Smith</strong>
			                              </h5>
			                              <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
			                              <p>Lorem ipsum dolor sit amet, consectetur...</p>
			                          </div>
			                      </div>
			                  </a>
			              </li>
			              <li class="message-preview">
			                  <a href="#">
			                      <div class="media">
			                          <span class="pull-left">
			                              <img class="media-object" src="#" alt="">
			                          </span>
			                          <div class="media-body">
			                              <h5 class="media-heading">
			                                  <strong>John Smith</strong>
			                              </h5>
			                              <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
			                              <p>Lorem ipsum dolor sit amet, consectetur...</p>
			                          </div>
			                      </div>
			                  </a>
			              </li>
			              <li class="message-footer">
			                  <a href="#">Read All New Messages</a>
			              </li>
			          </ul>
			      </li>
			      <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
			          <ul class="dropdown-menu alert-dropdown">
			              <li>
			                  <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
			              </li>
			              <li>
			                  <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
			              </li>
			              <li>
			                  <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
			              </li>
			              <li>
			                  <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
			              </li>
			              <li>
			                  <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
			              </li>
			              <li>
			                  <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
			              </li>
			              <li class="divider"></li>
			              <li>
			                  <a href="#">View All</a>
			              </li>
			          </ul>
			      </li>
			      <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
			          <ul class="dropdown-menu">
			              <li>
			                  <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
			              </li>
			              <li>
			                  <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
			              </li>
			              <li>
			                  <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
			              </li>
			              <li class="divider"></li>
			              <li>
			                  <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
			              </li>
			          </ul>
			      </li>
			  </ul>
  </nav>

 	<div id="page-wrapper" class="row">

     <div class="col-sm-3">


        <ul class="nav navbar-nav side-nav">

        <!-- <div class="jumbotron" style="background-color: #b71c1c; padding: 25px">dfd</div> -->

        <?php  if ($session->role == "admin") {echo '

            <li>
                <a href="../index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="../staff.php"><i class="fa fa-fw fa-users"></i> Staff</a>
            </li>
            <li>
                <a href="../patients.php"><i class="fa fa-fw fa-user"></i> Patients</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-fw fa-edit"></i> Pharmacy</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-fw fa-edit"></i> Laboratory</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-fw fa-edit"></i> Reports</a>
            </li>



        '; }else if ($session->role == "Records"){
            echo '

                <li>
                    <a href="../index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>

                <li>
                    <a href="../patients.php"><i class="fa fa-fw fa-user"></i> Patients</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-edit"></i> Laboratory</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-edit"></i> Reports</a>
                </li>

            ';
        }


         ?>
            
      
        </ul>
    </div>

   	<div class="col-sm-9">
			
			  <h1 class="page-header">
			      <i class="fa fa-file-archive-o" style="color: red" aria-hidden="true"></i>
			 				Patient Number: <?php echo $patient->patient_no; ?> 
			 				<small><span class="glyphicon glyphicon-arrow-left"></span>
			 					<a href="view_patient.php?id=<?php echo $patient->id; ?>">Back</a>
			 				</small>
			  </h1>


			  <ul class="nav nav-tabs">
			    <li class="active"><a href="#tab1" data-toggle="tab">Information</a></li>  
			    <li><a href="#tab2" data-toggle="tab" class="disabled">Vitals</a></li>
			    <li><a href="#tab3" data-toggle="tab">Insuarance</a></li>
			    <li><a href="#tab4" data-toggle="tab">Appointments</a></li>
			  </ul>

			  <div class="tab-content">
			    <div class="tab-pane active" id="tab1">
			      <div class="panel panel-default">
			        <div class="panel-heading">
			          <h4 class="panel-title"> Patient Bio </h4>
			        </div>
			        
			          <div class="panel-body row">
			          	<div class="col-sm-12 panel">
			          		<div class="panel-heading bg-info">
			          			<h4>Edit Patient Information</h4>
			          		</div>
			          		<div class="panel-body">

			          			
			          			<form action="" method="post">
			          				<div class="form-group row">
										      <div class="col-sm-6">
										        <label for="inputEmail3" class="col-form-label">Patient Number</label>
										        <input type="text" class="form-control" name="patient_no" value="<?php echo $patient->patient_no; ?>">
										      </div>
										      <div class="col-sm-6">
										        <label for="inputEmail3" class="col-form-label">Date</label>
										        <input type="text" class="form-control" name="date_of_first_appointment" value="<?php echo $patient->date_of_first_appointment; ?>">
										      </div>
    										</div>
										    <div class="form-group row">
										      <div class="col-sm-6">
										        <label for="inputEmail3" class="col-form-label">First Name</label>
										        <input type="text" class="form-control" name="firstname" value="<?php echo $patient->firstname; ?>">
										      </div> 
										      <div class="col-sm-6">
										        <label for="inputEmail3" class="col-form-label">Last Name</label>
										        <input type="text" class="form-control" name="lastname" value="<?php echo $patient->lastname; ?>">
										      </div>
    										</div>
										    <div class="form-group row">
										      <div class="col-sm-6">
										     
											       <label for="inputEmail3" class="col-form-label">Sex</label> 
											      	<select class="form-control" id="exampleFormControlSelect1" name="sex">
											          <option><?php echo $patient->sex; ?></option>
											          <option>Male</option>
											          <option>Female</option>
											          
											        </select>
											      </div>
										    
											      <div class="col-sm-6">
											       <label for="inputEmail3" class="col-form-label">Date of Birth</label>
											        <input type="date" class="form-control" name="dob" value="<?php echo $patient->dob; ?>">
											      </div>
										    	
										    </div>
										    <div class="form-group row">
										      <div class="col-sm-3">
										        <label for="inputEmail3" class="col-form-label">House Number</label>
										        <input type="text" class="form-control" name="house_no" value="<?php echo $patient->house_no; ?>">
										      </div>
										      <div class="col-sm-3">
										        <label for="inputEmail3" class="col-form-label">Area</label>
										        <input type="text" class="form-control" name="area" value="<?php echo $patient->area; ?>">
										      </div>
										      <div class="col-sm-3">
										        <label for="inputEmail3" class="col-form-label">Town/City</label>
										        <input type="text" class="form-control" id="inputEmail3" value="<?php echo $patient->location; ?>" name="location" >
										      </div>
										      <div class="col-sm-3">
										        <label for="inputEmail3" class="col-form-label">Phone Number</label>
										        <input type="text" class="form-control" id="inputEmail3" value="<?php echo $patient->phone; ?>" name="phone">
										     	</div>
    										</div>
										  	<div class="form-group row">		
										  		<div class="col-sm-4">
										        <label for="inputEmail3" class="col-form-label">Emergency Contact Person</label>
										   	 		<input type="text" class="form-control" id="inputEmail3" value="<?php echo $patient->contact_person; ?>" name="contact_person">
										 			</div>
										      <div class="col-sm-4">
										        <label for="inputEmail3" class="col-form-label">Relationship</label>
										        <select class="form-control" id="exampleFormControlSelect1" name="relationship">
										          <option class="disabled"><?php echo $patient->relationship; ?></option>
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
										        <input type="text" class="form-control" id="inputEmail3" value="<?php echo $patient->contact_person_phone; ?>" name="contact_person_phone">
										      </div>
										  	</div>
  	
										  	<div class="form-group row">
										      <div class="col-sm-4 col-sm-offset-4">
										        <button class="btn btn-danger" type="submit" name="update">Save changes</button>
										      </div>
										  		
										  	</div>
			          			</form>
			          		</div>
			      
			          	</div>
			          	
			          </div>
			      
			      </div>
			    </div>
			    <div class="tab-pane" id="tab2">
			      <div class="panel panel-default">
			        <div class="panel-heading">
			          <h4 class="panel-title">
			            <a data-toggle="collapse" data-parent=".tab-pane" href="#collapseTwo">
			              Tab 2
			            </a>
			          </h4>
			        </div>
			        <div id="collapseTwo" class="panel-collapse collapse">
			          <div class="panel-body">
			            Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. 
			          </div>
			        </div>
			      </div>
			    </div>
			    <div class="tab-pane" id="tab3">
			      <div class="panel panel-default">
			        <div class="panel-heading">
			          <h4 class="panel-title">
			            <a data-toggle="collapse" data-parent=".tab-pane" href="#collapseThree">
			              Tab 3
			            </a>
			          </h4>
			        </div>
			        <div id="collapseThree" class="panel-collapse collapse">
			          <div class="panel-body">
			           Sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
			            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. 
			          </div>
			        </div>
			      </div>
			    </div>
			    <div class="tab-pane" id="tab4">
			      <div class="panel panel-default">
			        <div class="panel-heading">
			          <h4 class="panel-title">
			            <a data-toggle="collapse" data-parent=".tab-pane" href="#collapseFour">
			             Tab 4
			            </a>
			          </h4>
			        </div>
			        <div id="collapseFour" class="panel-collapse collapse">
			          <div class="panel-body">
			            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
			          </div>
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

</body>
</html>
        