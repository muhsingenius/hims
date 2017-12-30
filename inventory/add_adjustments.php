<?php include("../includes/header.php"); ?>



<?php
  if(isset($_GET['item_id'])){
    $item = Inventory::find_by_id($_GET['item_id']);
  }
?>


<?php

	if(isset($_POST['submit'])){

        $date                  = trim($_POST['date']);
        $adjustment_type       = trim($_POST['adjustment_type']);
        $quantity              = trim($_POST['quantity']);
        $purchased_cost        = trim($_POST['purchased_cost']);
        $distribution_cost     = trim($_POST['distribution_cost']);
        $supplier              = trim($_POST['supplier']);
        $serial_number         = trim($_POST['serial_number']);
        $manufactured_date     = trim($_POST['manufactured_date']);
        $expiry_date           = trim($_POST['expiry_date']);


          /// adjust quantity in Main Inventory as well
              if($adjustment_type==="Purchase"){

                $item->current_quantity = $item->current_quantity + $quantity;
                $item->save();

              }


        $adjustmented_item = new InventoryAdjustment();

          $adjustmented_item->item = $_GET['item_id'];  ///call to function in database.php
          $adjustmented_item->date = $date;
          $adjustmented_item->adjustment_type = $adjustment_type;
          $adjustmented_item->quantity = $quantity;
          $adjustmented_item->purchased_cost = $purchased_cost;
          $adjustmented_item->distribution_cost = $distribution_cost;
          $adjustmented_item->supplier = $supplier;
          $adjustmented_item->serial_number = $serial_number;
          $adjustmented_item->manufactured_date = $manufactured_date;
          $adjustmented_item->expiry_date = $expiry_date;

         
          $adjustmented_item->create();

          redirect("view_inventory.php?id=$item->id");

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
         
            <?php include("page-parts/side_nav.php"); ?>

        </nav>

  <div id="page-wrapper" class="row">

                   <div class="col-sm-3">


                      <?php include("page-parts/side_nav.php"); ?>
                  </div>

<div class="col-sm-9">

<h1 class="page-header">
            <i class="fa fa-list" style="color: red" aria-hidden="true"></i>
              Inventory
              <?php if(isset($_GET['add_inventory'])) { echo "
              <a href='inventory.php' class='btn btn-danger'>
              <span class='glyphicon glyphicon-arrow-left'> Back </span>
              </a>" ; } echo $_GET['item_id'];?>

              <ul style="margin-top: 0px; margin-left: 0px; margin-bottom: 20px" class="pull-right">
                <a href="../inventory.php?add_inventory" style="margin-left: 50px" role="button" class="btn btn-success"><i class="fa fa-plus"></i>
                 Add New Item
                </a>
                <a href="#" style="margin-left: 50px" role="button" class="btn btn-success"><i class="fa fa-plus"></i>
                 Requests
                </a>
                <a href="#" style="margin-left: 50px" role="button" class="btn btn-success"><i class="fa fa-plus"></i>
                 Recieved Items
                </a>

              </ul><!-- header is here -->
        </h1>

  <div class="btn-danger" style=" padding: 1px; margin: 5px 0 20px 0; height: 70px; width:100%; border-radius: 2px">
    <h2><span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="margin-right: 5px"></span>Add Adjustment</h2>
  </div>
	<form class="form" action="" method="post" >

  <div class="form-group row">
      <div class="col-sm-6">
        <h2>This item is dispensed in: <?php echo $item->dispensable_unit; ?></h2>
    </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-6">
        <label class="col-form-label">Date</label>
        <input type="text" class="form-control" name="date" value="<?php echo date('d/m/Y');  ?>">
      </div>
      <div class="col-sm-3">
        <label class="col-form-label">Adjustment Type</label>
       <select class="form-control" id="exampleFormControlSelect1" name="adjustment_type">
          <option class="disabled">Select</option>
          <option>Purchase</option>
          <option>Return</option>
          <option>Transfer</option> 
        </select>
      </div>
      <div class="col-sm-3">
        <label class="col-form-label">Quantity</label>
        <input type="text" name="quantity" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-4">
       	<label class="col-form-label">Purchased Cost</label> 
     		<input type="text" class="form-control" name="purchased_cost" placeholder="" >
      </div>
    
      <div class="col-sm-4">
       <label class="col-form-label">Distribution Cost</label>
        <input type="text" name="distribution_cost" class="form-control">
      </div>
      <div class="col-sm-4">
        <label for="inputEmail3" class="col-form-label">Supplier</label>
        <input type="text" class="form-control" name="supplier">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-4">
        <label for="inputEmail3" class="col-form-label">Serial Number</label>
        <input type="text" class="form-control" name="serial_number">
      </div>
      <div class="col-sm-4">
        <label for="inputEmail3" class="col-form-label">Manufactured Date</label>
        <input type="date" class="form-control" name="manufactured_date">
      </div> 
      <div class="col-sm-4">
        <label class="col-form-label">Expiry Date</label>
        <input type="date" class="form-control" placeholder="" name="expiry_date">
      </div>
    </div>
  	<div class="form-group row">
      <div class="col-sm-4 col-sm-offset-4">
      	<a href="inventory.php" role="button" class="btn btn-danger">Cancel</a>
        <button class="btn btn-danger" type="submit" name="submit">Add</button>
      </div>
  		
  	</div>
  	
	</form>
</div>

</div>