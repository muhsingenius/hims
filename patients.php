<?php include("includes/header.php"); ?>

        <!-- Navigation -->
        <nav class="navbar navbar-fixed-top" role="navigation">
         
            <?php include("includes/top_nav.php") ?>

        </nav>

        <div id="page-wrapper" class="row">

          <div class="col-sm-3">
            <?php  include("includes/side_nav.php") ?>
          </div>

              <div class="col-sm-9">

                <div class="row">
                  <div class="col-lg-12" style="padding-left: 0px">
                    <h1 class="page-header">
                        <i class="fa fa-file-archive-o" style="color: red" aria-hidden="true"></i>
                          Patients Records <?php if(isset($_GET['add_patient'])) { echo "
                          <a href='patients.php' class='btn btn-danger'>
                          <span class='glyphicon glyphicon-arrow-left'> Back </span>
                          </a>" ; } ?>
                    </h1>


                  <?php //include("includes/admin_content.php")

                     if(isset($_GET['add_patient'])){



                       include("patients/add_patient.php");
                     } else {

                  ?>

                        <ul style="margin-top: 50px; margin-left: 0px; margin-bottom: 20px">
                          <a href="patients.php?add_patient" style="margin-left: 50px" role="button" class="btn btn-success"><i class="fa fa-plus"></i>
                           Add New Patient
                          </a>

                        </ul>

                        <table class="table table-striped table-bordered table-hover">
                          <thead>
                          <tr>
                          
                            <th scope="col">Patient Number</th>
                            <th scope="col">Full Name</th>      
                            <th scope="col">Sex</th>
                            <th scope="col">Age</th>
                            <th scope="col">Address</th>
                            <th scope="col">Actions</th>
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
                                      <span class="glyphicon glyphicon-folder-open"></span>
                                    </a>

                                    <a href="patients/edit_patient.php?id=<?php echo $a_patient->id ?>" class="btn btn-danger">
                                      <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    
                                </td>
                                 
                            </tr> 
                             <?php  endforeach; ?>  
                        </tbody>
                        </table>

                  </div>
                </div>
                  
              <?php } ?>

              </div>


                  

          

        </div><!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>