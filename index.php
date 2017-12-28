<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

        <!-- Navigation -->
        <nav class="navbar navbar-fixed-top" role="navigation">
         
            <?php include("includes/top_nav.php") ?>
  

        </nav>


        <div id="page-wrapper" class="row">

           <div class="col-sm-3">
               <?php  include("includes/side_nav.php") ?>
           </div> 


            <div class="col-sm-9">

               <?php include("includes/admin_content.php") ?>

            </div>

        </div><!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>