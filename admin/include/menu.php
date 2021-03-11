<?php
$id_admin=$_SESSION['id_admin'];
$sql = mysqli_query($db, "SELECT * FROM admin WHERE id_admin='$id_admin'");
$hasil = mysqli_fetch_array($sql);
?>
						<li class="nav-item dropdown nav-user">
	                        <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-fw fas fa-ellipsis-v"></i></a>
	                        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
	                            <div class="nav-user-info">
	                                <h5 class="mb-0 text-white nav-user-name"><?php echo $hasil['name']; ?></h5>
	                                <i class="far fa-envelope"></i><span class="ml-2"><?php echo $hasil['email']; ?></span>
	                            </div>
	                            <a class="dropdown-item" href="Edit-Profil"><i class="fas fa-user mr-2"></i>Edit Profile</a>
	                            <a class="dropdown-item" href="Ubah-Password"><i class="fas fa-cog mr-2"></i>Change Password</a>
	                            <a class="dropdown-item" href="././logout"><i class="fas fa-power-off mr-2"></i>Logout</a>
	                        </div>
	                    </li>
