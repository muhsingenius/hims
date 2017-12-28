<?php include("includes/header.php"); ?>

<?php //if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php

  if(isset($_POST['submit'])){
     
    //$procedure = trim($_POST['procedure']);
    $procedure_name = trim($_POST['procedure_name']);
    $cost = trim($_POST['cost']);


    $a_procedure = new Procedure();

          //$a_procedure->procedure = $procedure;
          $a_procedure->procedure_name = $procedure_name;
          $a_procedure->cost = $cost;

        
          $a_procedure->create();

         redirect("procedures.php?procedures");

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

              <div class="row">
                  <div class="col-lg-12" style="padding-left: 0px">
                    <h1 class="page-header">
                        <i class="fa fa-file-archive-o" style="color: red" aria-hidden="true"></i>
                          Setup Procedures
                    </h1>

                        <table class="table table-striped table-bordered table-hover">
                          <thead>
                          <tr>
                          
                            <th scope="col">#</th>
                            <th scope="col">Procedure</th>      
                            <th scope="col">Cost</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  

                           $procedures = Procedure::find_all();

                              foreach ($procedures as $procedure): ?> 
                           <tr>
                           
                          
                            <td><?php  echo $procedure->id; ?></td>
                            <td ><?php  echo $procedure->procedure_name; ?></td>
                            <td ><?php  echo $procedure->cost; ?></td>

                              <td> 
                                <a href="" role="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></a>
                                <a href="" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>

                              </td>
                             
                          </tr>

                        <?php  endforeach; ?>

                         
                        </tbody>
                        </table>

                         <button class="btn btn-primary" onclick="formFunction()" ><span class="glyphicon glyphicon-plus"></span>Add</button>
                      

                  </div>
                </div>

                <div class="well"  style="width: 70%; margin-top: 50px;display: none" id="procedure_form">

                  <h2 style="height: 50px; margin-left: 40%">Add Procedures</h2>
                    <form action="" method="post" >

                      <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Procedure</label>
                          <div class="col-sm-8">
                          <input type="text" class="form-control" id="inputEmail3" name="procedure_name" placeholder="Procedure Name">
                        </div>
                        
                      </div>
                      <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Cost</label>
                          <div class="col-sm-8">
                          <input type="number" class="form-control" id="inputEmail3" name="cost" placeholder="Procedure Cost (GHS)">
                        </div>
                        
                      </div>
                      <div>
                        <div class="form-group col-sm-4 col-sm-offset-4">
                          <button class="btn btn-danger" type="submit" name="submit">Save</button>
                        </div>
                      </div> 
                      
                    </form>
                  </div>


            </div>

        </div><!-- /#page-wrapper -->


         <script type="text/javascript">
            function formFunction() {
              var x = document.getElementById("procedure_form");

              if(x.style.display==="none") {
                x.style.display = "block";

              }else{

                x.style.display="none";
              }
            }
    </script>

  <?php include("includes/footer.php"); ?>