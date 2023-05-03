<?php
include 'header.php';
?>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color:#323741;margin: 0 auto">
        <div class="container-fluid ">
                <p style="color:#fff; margin-left:20px; margin-bottom:0">Chào mừng bạn đến với WeBook</p>
                    <ul class="top-link navbar-nav ms-auto mb-2 mb-1g-0" style="margin-bottom:0 !important">
                        <?php
                        require "login.php";
                        if (!isset($_SESSION['txtus']))
                        {
                            printf(' <li class="nav-item"><a class="nav-link active text-white" href="account.php"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a></li>');
                        } else {
                            echo '<li class="nav-item" style="color: lavender; margin: auto"><span class="glyphicon glyphicon-user" style="padding-right: 10px;"></span>';
                            echo '<span style="color:lavender"><b>' . $_SESSION['Tenkhach'] . '</b></span></li>';
                            echo '<li class="nav-item"><a class="nav-link active text-white" href="logout.php"> Đăng xuất</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
    </nav>

    
