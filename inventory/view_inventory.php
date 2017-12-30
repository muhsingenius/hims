<?php include("../includes/header.php"); ?>


<?php

if(isset($_GET['id'])){

	$item = Inventory::find_by_id($_GET['id']);	

}

?>

<?php

  if(isset($_GET['id'])){

  	$item_id = $_GET['id'];
  	$adjustment_item = InventoryAdjustment::find_by_item($item_id);


  }

 ?>

 <?php

 	if(isset($_POST['update'])){

 		$update_item = Inventory::find_by_id($_GET['id']);

 		if($update_item) {
 				$update_item->item_name = $_POST['item_name'];
 				$update_item->description = $_POST['description'];
 				$update_item->type        = $_POST['type'];
 				$update_item->category    = $_POST['category'];
 				$update_item->strength    = $_POST['strength'];
 				$update_item->reorder_level = $_POST['reorder_level'];
 				$update_item->distribution_cost = $_POST['distribution_cost'];


 				$update_item->save();


 				//////  update this item at the inventory adjustment level

 				$adjustmented_item = InventoryAdjustment::find_by_item($item_id);

          
          $adjustmented_item->distribution_cost = $_POST['distribution_cost'];

         
          $adjustmented_item->save();

 				redirect("view_inventory.php?id=$update_item->id");




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
         
            <?php include("page-parts/top_nav.php");  ?>

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
              </a>" ; } ?>

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

			        </ul><!-- header title here -->
        </h1>

        

        	<form class="form" action="" method="post" style="border: 1px solid red; padding: 15px">

				    <div class="form-group row">
				      <div class="col-sm-4">
				        <label class="col-form-label">Item Name</label>
				        <input type="text" class="form-control" name="item_name" value="<?php echo $item->item_name; ?>">
				      </div>
				      <div class="col-sm-4">
				        <label class="col-form-label">Description</label>
				        <input type="text" class="form-control" name="description" value="<?php echo $item->description; ?>">
				      </div>
				      <div class="col-sm-4">
				        <label class="col-form-label">Item Type</label>
				       <select class="form-control" id="exampleFormControlSelect1" name="type">
				          <option class="disabled"><?php echo $item->type; ?></option>
				          <option>Medication</option>
				          <option>Stationery</option>
				          <option>Sanitation</option> 
				        </select>
				      </div> 
				    </div>
				    <div class="form-group row">
				      
				      <div class="col-sm-3">
				        <label class="col-form-label">Catogory</label>
				        <select class="form-control" id="exampleFormControlSelect1" name="category">
				          <option class="disabled"><?php echo $item->category; ?></option>
				          <option>antibiotics</option>
				          <option>Pain</option>
				          <option>Antacid</option> 
				        </select>
				      </div>
				      <div class="col-sm-3">
				       	<label class="col-form-label">Strength</label> 
				     		<input type="text" class="form-control" name="strength" value="<?php echo $item->strength; ?>">
				      </div>
				   		<div class="col-sm-3">
				        <label class="col-form-label">Re-Order Level</label>
				        <input type="text" class="form-control" name="reorder_level" value="<?php echo $item->reorder_level; ?>">
				      </div>
				      <div class="col-sm-3">
				        <label class="col-form-label">Distribution Cost</label>
				        <input type="text" class="form-control" name="distribution_cost" value="<?php echo $item->distribution_cost; ?>">
				      </div>
				    </div>
				  	<div class="form-group row">
				      <div class="col-sm-4 pull-right">
				        <button class="btn btn-danger" type="submit" name="update">Update</button>
				      </div>
				  		
				  	</div>
  	
					</form>
			 
			 <div>
			 	<h1 class="page-header">
			 			Adjustments
			 			<ul style="margin-top: 0px; margin-left: 0px; margin-bottom: 20px" class="pull-right">
			          <a href="add_adjustments.php?id=<?php  echo $adjustment_item->id; ?> & item_id=<?php echo $item_id; ?>" style="margin-left: 50px" role="button" class="btn btn-success"><i class="fa fa-plus"></i>
			           Adjustments
			          </a>
			          <!-- <a href="#" style="margin-left: 50px" role="button" class="btn btn-success"><i class="fa fa-plus"></i>
			           Requests
			          </a>
			          <a href="#" style="margin-left: 50px" role="button" class="btn btn-success"><i class="fa fa-plus"></i>
			           Return
			          </a> -->

			        </ul>
			 	</h1>
			 	<table class="table table-striped table-bordered table-hover">
                          <thead>
                         
                          <tr>
                          	<th scope="col">Date</th>
                          	<th scope="col">Type</th> 
                          	<th scope="col">Quantity</th>
                            <th scope="col">Purchase Cost</th>
                            <th scope="col">Distribution Cost</th>   
                            <th scope="col">Supplier</th>
                            <th scope="col">Serial Number</th>
                            <th scope="col">Expiry Date</th>
                          </tr>
                        </thead>
                        <tbody>

														<?php

															$adjustment_items = InventoryAdjustment::find_all();

															foreach ($adjustment_items as $adjustment_item): 

																if($adjustment_item->item===$item_id) {
																
														?>                         
                           <tr>
     
                                <td><?php echo $adjustment_item->date; ?></td>
                                <td><?php echo $adjustment_item->adjustment_type; ?></td>
                                <td><?php echo $adjustment_item->quantity . " " .$item->dispensable_unit . "s"; ?></td>
                                <td><?php echo $adjustment_item->purchased_cost ?></td>
                                <td><?php echo $adjustment_item->distribution_cost; ?></td>
                                <td><?php echo $adjustment_item->supplier ;?></td>
                                <td><?php echo $adjustment_item->serial_number; ?></td>
                                <td><?php echo $adjustment_item->expiry_date ;?></td> 
                                 
                            </tr> 
                          <?php } endforeach  ?>
                            
                        </tbody>
                        </table>

                        <div class="pull-right">
                        	<h1 class="page-header">
                        		Available Quantity: <?php echo $item->current_quantity; ?>
                        	</h1>
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
