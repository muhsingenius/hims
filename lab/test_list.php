     
                        <a href="laboratory.php?add_test" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add</a>
                        <table class="table table-striped table-bordered table-hover">
                          <thead>
                          <tr>
                          
                            <th scope="col">Test Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Test Sample</th>      
                            <th scope="col">Fee (GHS)</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  

                           $tests = Lat_tests::find_all();

                              foreach ($tests as $test): ?>
                           <tr>
     
                                <td><?php echo $test->test_name; ?></td>
                                <td><?php echo $test->description; ?></td>
                                <td><?php echo $test->test_sample; ?></td>
                                <td><?php echo $test->fee; ?></td>
                                <td>

                                    <a href="lab/edit_test.php?id=<?php echo $test->id ?>" class="btn btn-danger">
                                      <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    
                                </td>
                                 
                            </tr> 
                             <?php endforeach; ?>  
                        </tbody>
                        </table>