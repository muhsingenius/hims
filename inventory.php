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
                        <i class="fa fa-list" style="color: red" aria-hidden="true"></i>
                          Inventory
                          <?php if(isset($_GET['add_inventory'])) { echo "
                          <a href='inventory.php' class='btn btn-danger'>
                          <span class='glyphicon glyphicon-arrow-left'> Back </span>
                          </a>" ; } ?>
                    </h1>


                  <?php //include("includes/admin_content.php")

                     if(isset($_GET['add_inventory'])){

                       include("inventory/add_inventory.php");
                     } else {

                  ?>

                        <ul style="margin-top: 50px; margin-left: 0px; margin-bottom: 20px">
                          <a href="inventory.php?add_inventory" style="margin-left: 50px" role="button" class="btn btn-success"><i class="fa fa-plus"></i>
                           Add New Item
                          </a>
                          <a href="#" style="margin-left: 50px" role="button" class="btn btn-success"><i class="fa fa-plus"></i>
                           Requests
                          </a>
                          <a href="#" style="margin-left: 50px" role="button" class="btn btn-success"><i class="fa fa-plus"></i>
                           Recieved Items
                          </a>

                        </ul>

                        <table class="table table-striped table-bordered table-hover">
                          <thead>
                          <tr>
                          
                            <th scope="col">Item Name</th>
                            <th scope="col">Dispensable Unit</th>
                            <th scope="col">Original Quantity</th>      
                            <th scope="col">Current Quantity</th>
                            <th scope="col">Supplier</th>
                            <th scope="col">Expiry Date</th>
                            <th scope="col">Reorder Level</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  

                           $items = Inventory::find_all();

                              foreach ($items as $item): ?>
                           <tr>
     
                                <td><?php echo $item->item_name; ?></td>
                                <td><?php echo $item->dispensable_unit ?></td>
                                <td><?php echo $item->original_quantity . " " . $item->dispensable_unit . "s"; ?></td>
                                <td><?php echo $item->current_quantity . " " . $item->dispensable_unit . "s"; ?></td>
                                <td><?php echo $item->supplier ;?></td>
                                <td><?php echo $item->expiry_date ;?></td>
                                <td><?php echo $item->reorder_level . " " . $item->dispensable_unit . "s"; ?></td>
                                <td>
                                    <a href="inventory/view_inventory.php?id=<?php echo $item->id ?>" role="button" class="btn btn-info">
                                      <span class="glyphicon glyphicon-folder-open"></span>
                                    </a>

                                    <a href="inventory/edit_inventory.php?id=<?php echo $item->id ?>" class="btn btn-danger">
                                      <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    
                                </td>
                                 
                            </tr> 
                             <?php endforeach; ?>  
                        </tbody>
                        </table>

                  </div>
                </div>
                  
              <?php } ?>

              </div>


                  

          

        </div><!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>