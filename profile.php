<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>


<?php
  if(isset($_GET['user_id'])){
      $staff = Staff::find_by_id($_GET['user_id']);
  }
?>
        <!-- Navigation -->
        <nav class="navbar navbar-fixed-top" role="navigation">
         
            <?php include("includes/top_nav.php") ?>
  
        </nav>

        <div id="page-wrapper" class="row">

           <div class="col-sm-3">
               <?php  include("includes/side_nav.php") ?>
           </div> 

            <div class="col-sm-9">

              <h1 class="page-header">
                <i class="fa fa-user" style="color: red" aria-hidden="true"></i>
                  Staff Profile: <?php echo $staff->role; ?>
                  <!-- <a href="../patients.php?all_patients" class="btn btn-danger">
                    <span class="glyphicon glyphicon-arrow-left"> </span>Back to Patients
                  </a> -->
              </h1>

              
                  <div class="panel-heading">
                    <h4 class="panel-title"> Staff Information </h4>
                  </div>
                  <div class="panel-body row">
                    <div class="col-sm-6">
                      <div class="panel-heading bg-info">
                        <h4>Personal Information</h4>
                      </div>
                      <div class="panel-body">
                        <p><strong class="bio-info-columns"> Name:  </strong><?php echo $staff->full_name  ; ?> </p>
                        <p><strong class="bio-info-columns"> Sex:  </strong> <?php echo $staff->sex; ?> </p>
                        <p><strong class="bio-info-columns"> Department:  </strong> <?php echo $staff->department; ?> </p>
                        <p><strong class="bio-info-columns"> Contact:  </strong> <?php echo $staff->phone_no; ?> </p>
                        <p><strong class="bio-info-columns"> Address:  </strong> </p>
                        <p style="margin-left: 25px"> <?php echo $staff->house_no; ?></p>
                        <p style="margin-left: 25px"> <?php echo $staff->area; ?></p>
                        <p style="margin-left: 25px"> <?php echo $staff->location; ?></p>
                      </div>
                    </div>
                    <div class="col-sm-6 panel">
                    <div class="panel-heading bg-info">
                      <h4>Emergency Contact</h4>
                    </div>
                    <div class="panel-body">
                      <p><strong class="bio-info-columns"> Contact Person:  </strong> <?php echo $staff->emergency_contact_name; ?> </p>
                      <p><strong class="bio-info-columns"> Relationship:  </strong><?php echo $staff->emergency_contact_number ; ?> </p>
                      <p><strong class="bio-info-columns"> Phone:  </strong> <?php echo $staff->relationship; ?>
                    </div>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <a href="edit_staff.php?id=<?php echo $staff->id ?>" class="btn btn-danger">Edit Information</a>
                    </div>
                    <div class="col-sm-6">
                      <a href="edit_staff.php?id=<?php echo $staff->id ?>" class="btn btn-danger">Change Login Credentials</a>
                    </div>
                  </div>
            </div>

        </div><!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>