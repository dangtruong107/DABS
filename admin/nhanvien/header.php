<!--Trinh Duc Hai-->
<?php
ob_start();
?>
<?php 
 include "head.php";
?>
<?php
 require "xulyloginNhanvien.php";
      if(!isset($_SESSION['Tendangnhap'] )) 
       {
           header("Location:loginNhanvien.php");  
       }

?>
<header class="main-header" >
        <a href="indexNhanvien.php" class="logo" style="background-color: red" >
          <span class="logo-lg" style="color: #fffafa"><b>61TH3 Nhóm 12</b></span>
        </a>
        <nav class="navbar navbar-static-top" style="background-color: red" role="navigation">
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../../images/irene.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs" style="color: white"><?php
                        require "xulyloginNhanvien.php";
                        if (!isset($_SESSION['Tendangnhap']))
                        {
                           
                        } else {

                            echo '<span style="color:lavender"><b>' . $_SESSION['Tendangnhap'] . '</b></span>';

                        }
                        ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-footer">
                      <a href="logoutNhanvien.php" class="btn btn-default btn-flat">Đăng xuất</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <?php ob_end_flush(); ?>