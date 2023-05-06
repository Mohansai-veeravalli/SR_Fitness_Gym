 
 <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                 
				   
				   
				   <font color=green>Design By:<br><a href="http://clpinfotech.com">CLP INFOTECH PVT LTD</a></font>
				
                      
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
					<?php 
 $sql=mysqli_query($con,"select * from admin");
 while($data=mysqli_fetch_array($sql))
 {?>
                       <?php echo "Welcome Mr. ".$data['name'];    ?>  
					   <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?php echo $data['profile_image']; ?>" alt="User Avatar">
                        </a>
 <?php } ?>
                        <div class="user-menu dropdown-menu">
                                <!--<a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                                <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                                <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>-->
								<a class="nav-link" href="update_profile.php"><i class="fa fa-power -off"></i>Update Profile</a>
                                <a class="nav-link" href="logout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                  

                </div>
            </div>

        </header>