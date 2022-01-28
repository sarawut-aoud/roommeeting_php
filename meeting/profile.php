<?php

include "connect.php";
// $id = $_SESSION["id"];

// $sql3 = "select * from employee WHERE e_id = '$id' ";
// $result3 = mysqli_query($conn, $sql3);
// $rs3 = mysqli_fetch_array($result3); 

?>

<div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <!-- a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" 
              aria-haspopup="true" aria-expanded="false"> -->
             <!--  <?php //if(strlen($_SESSION['UserID']))
                {?>
                <span class="mr-2 d-none d-lg-inline text-gray-100 small"> <strong><?php  //echo ($_SESSION['User']);?> </strong></span>              
                
                <img class="img-profile rounded-circle" src="<?php //echo "../picture/$rs3[e_pic]";?>" >

                
                <?php } ?>      -->
                          			
             <!--  </a> -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="editme.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"> </i>
                Logout
                </a>
              </div>
            </li>
          </ul>
          </nav>
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">คำเตือน! </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">คุณต้องการออกจากระบบหรือไม่?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
  </ul>

</nav>