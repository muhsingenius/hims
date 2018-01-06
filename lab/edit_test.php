<?php include("../includes/header.php"); ?>

<?php

	if(isset($_GET['id'])){

    $get_test = Lat_tests::find_by_id($_GET['id']);

    if(isset($_POST['update'])){

         

         if($get_test){
          $get_test->test_name   = trim($_POST['test_name']);
          $get_test->description = trim($_POST['description']);
          $get_test->test_sample = trim($_POST['test_sample']);
          $get_test->fee         = trim($_POST['fee']);

          $get_test->save();
          redirect("../laboratory.php");
         }    
    }

   

    /*$test_name            = trim($_POST['test_name']);
    $description          = trim($_POST['description']);
    $test_sample          = trim($_POST['test_sample']);
    $fee                  = trim($_POST['fee']);


   
     $insert_test->test_name          = $test_name;  
     $insert_test->description        = $description;
     $insert_test->test_sample        = $test_sample;
     $insert_test->fee                = $fee;

     $insert_test->create();
      redirect("laboratory.php");*/

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
         
            <?php include("page-parts/top_nav.php"); ?>

        </nav>

  <div id="page-wrapper" class="row">

                   <div class="col-sm-3">


                      <?php include("page-parts/side_nav.php"); ?>
                  </div>

<div class="col-sm-9">

                      <h1 class="page-header">
                        <i class="fa fa-filter" style="color: red" aria-hidden="true"></i>
                          Laboratory Tests
                          <?php if(isset($_GET['add_inventory'])) { echo "
                          <a href='inventory.php' class='btn btn-danger'>
                          <span class='glyphicon glyphicon-arrow-left'> Back </span>
                          </a>" ; } ?>


                          <ul style="margin-top: 0px; margin-left: 0px; margin-bottom: 20px" class="pull-right">
                          <a href="laboratory.php?add_test" style="margin-left: 50px" role="button" class="btn btn-success"><i class="fa fa-plus"></i>
                           Add New Test
                          </a>
                          <a href="#" style="margin-left: 50px" role="button" class="btn btn-success"><i class="fa fa-plus"></i>
                           Requests Items
                          </a>
                          <a href="#" style="margin-left: 50px" role="button" class="btn btn-success"><i class="fa fa-plus"></i>
                           Recieved Items
                          </a>

                        </ul>
                    </h1>


  <div class="btn-danger" style=" padding: 1px; margin: 5px 0 20px 0; height: 70px; width:100%; border-radius: 2px">
    <h2><span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="margin-right: 5px"></span>Edit Item</h2>
  </div>
  <form class="form" action="" method="post" >

    <div class="form-group row">
      <div class="col-sm-6">
        <label class="col-form-label">Test Name</label>
        <input type="text" class="form-control" name="test_name" value="<?php echo $get_test->test_name;  ?>">
      </div>
      <div class="col-sm-6">
        <label class="col-form-label">Description</label>
        <input type="text" class="form-control" name="description" value="<?php echo $get_test->description;  ?>" >
      </div>
    </div>
   
    <div class="form-group row">
      <div class="col-sm-6">
        <label class="col-form-label">Test Sample</label> 
        <input type="text" class="form-control" name="test_sample" value="<?php echo $get_test->test_sample;  ?>">
      </div>
    
      <div class="col-sm-6">
       <label class="col-form-label">Fee</label>
        <input type="text" name="fee" class="form-control" value="<?php echo $get_test->fee;  ?>">
      </div>
    </div>
    
    <div class="form-group row">
      <div class="col-sm-4 col-sm-offset-4">
        <a href="../laboratory.php" role="button" class="btn btn-danger">Cancel</a>
        <button class="btn btn-danger" type="submit" name="update">Update Test</button>
      </div>
      
    </div>
    
  </form>
</div>
</div>

</body>
</html>
