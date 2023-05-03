<!--Trinh Duc Hai-->
<?php
ob_start();
?>
<?php 
 include "head.php";
?>
<?php
 require "xulyloginQuanly.php";
      if(!isset($_SESSION['Tendangnhap'] )) 
       {
           header("Location:loginQuanly.php");  
       }

?>
<header class="main-header" >
        <!-- Logo -->
        <a href="index.php" class="logo" style="background-color: red" >
          
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg" style="color: #fffafa"><b>61TH3 Nhóm 12</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" style="background-color: red" role="navigation">
        
          <!-- Sidebar toggle button-->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../../images/irene.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs" style="color: white"><?php
                        require "xulyloginQuanly.php";
                        if (!isset($_SESSION['Tendangnhap']))
                        {
                           
                        } else {

                            echo '<span style="color:lavender"><b>' . $_SESSION['Tendangnhap'] . '</b></span>';

                        }
                        ?></span>
                </a>
                <ul class="dropdown-menu">

                  <li class="user-footer">
                      <a href="logout.php" class="btn btn-default btn-flat">Đăng xuất</a>
                  </li>
                </ul>
              </li>

              
            </ul>
          </div>
        </nav>
      </header>
      <?php ob_end_flush(); ?>