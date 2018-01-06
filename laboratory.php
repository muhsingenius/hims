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
                        <i class="fa fa-filter" style="color: red" aria-hidden="true"></i>
                          Laboratory Tests
                          <?php if(isset($_GET['add_inventory'])) { echo "
                          <a href='inventory.php' class='btn btn-danger'>
                          <span class='glyphicon glyphicon-arrow-left'> Back </span>
                          </a>" ; } ?>


                          <ul style="margin-top: 0px; margin-left: 0px; margin-bottom: 20px" class="pull-right">
                          <a href="laboratory.php?test_list" style="margin-left: 50px" role="button" class="btn btn-success"><i class="fa fa-list"></i>
                           Test List
                          </a>
                          <a href="#" style="margin-left: 50px" role="button" class="btn btn-success"><i class="fa fa-plus"></i>
                           Requests Items
                          </a>
                          <a href="#" style="margin-left: 50px" role="button" class="btn btn-success"><i class="fa fa-plus"></i>
                           Recieved Items
                          </a>

                        </ul>
                    </h1>


                  <?php //include("includes/admin_content.php")

                    if(isset($_GET['test_list'])){
                      include("lab/test_list.php");

                    }else if(isset($_GET['add_test'])){

                       include("lab/add_test.php");

                     } else {

                  ?>

                    <table class="table table-striped table-bordered table-hover">
                          <thead>
                          <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Patient Number</th>
                            <th scope="col">Test Name</th>      
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  

                           $test_requests = Test_request::find_all(); //get all tests

                              foreach ($test_requests as $a_request):

                                  $find_test = Lat_tests::find_by_id($a_request->test); // use $a_request->test (id) to pullout the Name
                          ?>
                           <tr>
     
                                <td><?php echo $a_request->date; ?></td>
                                <td><?php echo $a_request->request_time; ?></td>
                                <td><?php echo $a_request->patient; ?></td>
                                <td><?php echo $find_test->test_name; ?></td> <!-- show the test name and it -->
                                <td><?php echo $a_request->status; ?></td>
                                <td>

                                    <a href="#" class="btn btn-danger">
                                      <span class="glyphicon glyphicon-refresj"></span> Update
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