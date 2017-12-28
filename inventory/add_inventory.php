<?php include("includes/header.php"); ?>

<?php

	if(isset($_POST['submit'])){

    $item_name            = trim($_POST['item_name']);
    $description          = trim($_POST['description']);
    $type                 = trim($_POST['type']);
    $category             = trim($_POST['category']);
    $strength             = trim($_POST['strength']);
    $dispensable_unit     = trim($_POST['dispensable_unit']);
    $number_of_packages   = trim($_POST['number_of_packages']);
    $quantity_in_package  = trim($_POST['quantity_in_package']);
    $original_quantity    = $number_of_packages * $quantity_in_package;
    $current_quantity     = $original_quantity;
    $reorder_level         = trim($_POST['reorder_level']);
    $supplier             = trim($_POST['supplier']);
    $manufactured_date    = trim($_POST['manufactured_date']);
    $expiry_date          = trim($_POST['expiry_date']);
    $serial_number        = trim($_POST['serial_number']);
    $purchase_cost        = trim($_POST['purchase_cost']);
    $distribution_cost    = trim($_POST['distribution_cost']);

	

		$item = new Inventory();
          ///insert to inventory table
     $item->date                    = date('d/m/Y');
     $item->item_name               = $item_name;
     $item->description             = $description;
     $item->type                    = $type;
     $item->category                = $category;
     $item->strength                = $strength;
     $item->dispensable_unit        = $dispensable_unit;
     $item->number_of_packages      = $number_of_packages;
     $item->quantity_in_package     = $quantity_in_package;
     $item->original_quantity       = $original_quantity;
     $item->current_quantity        = $current_quantity;
     $item->reorder_level           = $reorder_level;
     $item->supplier                = $supplier;
     $item->manufactured_date       = $manufactured_date;
     $item->expiry_date             = $expiry_date;
     $item->serial_number           = $serial_number;
     $item->purchase_cost           = $purchase_cost;
     $item->distribution_cost       = $distribution_cost;

     $item->create();

          ///insert to inventory adjustments table as first(new) entry
          $adjustmented_item = new InventoryAdjustment();

          $adjustmented_item->item = $database->the_insert_id();  ///call to function in database.php
          $adjustmented_item->date = date('d/m/Y');
          $adjustmented_item->adjustment_type = "New";
          $adjustmented_item->current_quantity = $current_quantity;
          $adjustmented_item->purchased_quantity = 0;
          $adjustmented_item->purchased_cost = $purchase_cost;
          $adjustmented_item->distribution_cost = $distribution_cost;
          $adjustmented_item->supplier = $supplier;
          $adjustmented_item->serial_number = $serial_number;
          $adjustmented_item->manufactured_date = $manufactured_date;
          $adjustmented_item->expiry_date = $expiry_date;

         
          $adjustmented_item->create();
          redirect("inventory.php");

	}

?>

<div class=""  style="width: 80%">

  <div class="btn-danger" style=" padding: 1px; margin: 5px 0 20px 0; height: 70px; width:100%; border-radius: 2px">
    <h2><span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="margin-right: 5px"></span>Add New Item</h2>
  </div>
	<form class="form" action="" method="post" >

    <div class="form-group row">
      <div class="col-sm-6">
        <label class="col-form-label">Item Name</label>
        <input type="text" class="form-control" name="item_name">
      </div>
      <div class="col-sm-6">
        <label class="col-form-label">Description</label>
        <input type="text" class="form-control" name="description" >
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-6">
        <label class="col-form-label">Item Type</label>
       <select class="form-control" id="exampleFormControlSelect1" name="type">
          <option class="disabled">Select</option>
          <option>Medication</option>
          <option>Stationery</option>
          <option>Sanitation</option> 
        </select>
      </div> 
      <div class="col-sm-6">
        <label class="col-form-label">Catogory</label>
        <select class="form-control" id="exampleFormControlSelect1" name="category">
          <option class="disabled">Select</option>
          <option>antibiotics</option>
          <option>Pain</option>
          <option>Antacid</option> 
        </select>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-6">
       	<label class="col-form-label">Strength</label> 
     		<input type="text" class="form-control" name="strength" placeholder="Example: 500mg" >
      </div>
    
      <div class="col-sm-6">
       <label class="col-form-label">dispensable Unit</label>
        <select class="form-control" id="exampleFormControlSelect1" name="dispensable_unit" id="unit">
          <option class="disabled">Select</option>
          <option>Pack</option>
          <option>Bottle</option>
          <option>Vail</option> 
        </select>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-4">
        <label for="inputEmail3" class="col-form-label">Number of packages</label>
        <input type="text" class="form-control" name="number_of_packages" placeholder="">
      </div>
      <div class="col-sm-4">
        <label class="col-form-label">Quantity</label>
        <input type="text" class="form-control" name="quantity_in_package" placeholder="Quantity In Package">
      </div>
      <div class="col-sm-4">
        <label class="col-form-label">Re-Order Level</label>
        <input type="text" class="form-control" placeholder="" name="reorder_level">
      </div>
    </div>
  	<div class="form-group row">
  		<div class="col-sm-4">
        <label for="inputEmail3" class="col-form-label">Supplier</label>
   	 		<input type="text" class="form-control" name="supplier">
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
  		<div class="col-sm-4">
        <label for="inputEmail3" class="col-form-label">Serial Number</label>
   	 		<input type="text" class="form-control" name="serial_number">
 			</div>
      <div class="col-sm-4">
        <label for="inputEmail3" class="col-form-label">Purchase Cost</label>
        <input type="text" class="form-control" name="purchase_cost">
      </div> 
      <div class="col-sm-4">
        <label class="col-form-label">Distribution Cost</label>
        <input type="text" class="form-control" placeholder="" name="distribution_cost">
      </div>
  	</div>
  	
  	<div class="form-group row">
      <div class="col-sm-4 col-sm-offset-4">
      	<a href="inventory.php" role="button" class="btn btn-danger">Cancel</a>
        <button class="btn btn-danger" type="submit" name="submit">Save Item</button>
      </div>
  		
  	</div>
  	
	</form>
</div>