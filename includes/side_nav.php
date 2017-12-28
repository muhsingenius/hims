 <div class="collapse navbar-collapse navbar-ex1-collapse">


                <ul class="nav navbar-nav side-nav">

                <!-- <div class="jumbotron" style="background-color: #b71c1c; padding: 25px">dfd</div> -->

                <?php  if ($session->role == "admin") {echo '


                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="staff.php"><i class="fa fa-fw fa-users"></i> Staff</a>
                    </li>
                    <li>
                        <a href="patients.php"><i class="fa fa-fw fa-user"></i> Patients</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-briefcase"></i> Pharmacy</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-filter"></i> Laboratory</a>
                    </li>
                    <li>
                        <a href="procedures.php"><i class="fa fa-fw fa-file-text"></i> Procedures</a>
                    </li>
                    <li>
                        <a href="inventory.php"><i class="fa fa-fw fa-list"></i> Inventory</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-bar-chart"></i> Reports</a>
                    </li>



                '; }else if ($session->role == "Records"){
                    echo '

                        <li>
                            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>

                        <li>
                            <a href="patients.php"><i class="fa fa-fw fa-user"></i> Patients</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-edit"></i> Laboratory</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-edit"></i> Reports</a>
                        </li>

                    ';
                }else if ($session->role == "Doctor"){
                    echo '

                        <li>
                            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>

                        <li>
                            <a href="patients.php"><i class="fa fa-fw fa-user"></i> Patients</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-edit"></i> Laboratory</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-edit"></i> Reports</a>
                        </li>

                    ';
                }


                 ?>
                    
              
                </ul>
            </div>