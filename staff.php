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
                <div class="col-lg-12">
                  <h1 class="page-header" style="">
                       <i class="fa fa-fw fa-users" style="color: red"></i>  Staff
                      <!-- <small>Subheading</small> -->
                  </h1>

                  <ul style="margin-top: 30px; margin-bottom: 50px">
                    <a href="staff.php?add_user"><i class="fa fa-plus"></i> Add Staff</a>
                    <a href="staff.php?all_staff" style="margin-left: 50px"><i class="fa fa-table"></i> View Staff</a> 
                    <a href="staff.php?roles" style="margin-left: 50px"><i class="fa fa-table"></i> Staff Roles</a>
                    <a href="staff.php?departments" style="margin-left: 50px"><i class="fa fa-table"></i> Departments</a>
                    
                  </ul>

                    

                </div>
            </div>


          

           <?php //include("includes/admin_content.php")

           if(isset($_GET['add_user'])){
              include("staff/add_staff.php");


           } 

           if(isset($_GET['all_staff'])){
              include("staff/all_staff.php");

            }

            if(isset($_GET['roles'])){
              include("staff/roles.php");

            }

            if(isset($_GET['departments'])){
              include("staff/departments.php");

            }

            if(isset($_GET['view_staff'])){
              include("staff/view_staff.php");

            }

            ?>

      </div>


    



    </div><!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>