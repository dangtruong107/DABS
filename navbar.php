<?php
ob_start()
?>
<main style="background-color: #f7f7ff">
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <img src="images/logo.jpg" alt="" class="img-fluid logo">
            <!-- NAVBAR -->
            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left links -->
                <ul class="navbar-nav me-auto d-flex flex-row mt-3 mt-lg-0">
                    <li class="nav-item text-center mx-2 mx-lg-1">
                        <a class="nav-link-c active" aria-current="page" href="index.php" >
                            <div>
                                <i class="fas fa-home fa-lg " style="color:#000"></i>
                            </div>
                            Trang chủ
                        </a>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle nav-link-c active text-dark" href="#" id="navbarScrollingDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false " style="">
                            Nhà Xuất Bản
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <?php
                            require 'inc/config.php';
                            //lay san pham theo id
                            $layidrandom = "SELECT ID_Doitac,Tendoitac from doitac";
                            $kq = $conn->query($layidrandom);
                            if ($kq->num_rows > 0) {
                                // output data of each row
                                while ($d = $kq->fetch_assoc()) {

                            ?>
                            <li style="padding: 5px 0;"><a
                                    href="category.php?ID_Doitac=<?php echo $d["ID_Doitac"] ?>"><?php echo $d["Tendoitac"] ?></a>
                            </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle  text-dark" href="#" id="navbarScrollingDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Thể loại
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <?php
                            require 'inc/config.php';
                            //lay san pham theo id
                            $layidtheloai = "SELECT ID_Theloai,Tentheloai from theloai";
                            $kq = $conn->query($layidtheloai);
                            if ($kq->num_rows > 0) {
                                // output data of each row
                                while ($d = $kq->fetch_assoc()) {

                            ?>
                            <li style="padding: 5px 0;"><a
                                    href="categorytheloai.php?ID_Theloai=<?php echo $d["ID_Theloai"] ?>"><?php echo $d["Tentheloai"] ?></a>
                            </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
                <div class="nav-item dropdown">

                </div>
            </div>
            <!-- Collapsible wrapper -->


            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars text-light"></i>
            </button>

            <div class=" navbar-collapse " id="navbarSupportedContent">
                <form class="form-search  d-flex input-group w-auto ms-lg-3 my-3 my-lg-0 " method="GET"
                    action="search.php">
                    <input type="text" style="border-radius: 50px 0px 0px 50px !important; padding-right: 300px;"
                        class="input-medium search-query rounded-start-4 " name="txttimkiem"
                        placeholder=" Nhập Tên Sách..." required>
                    <button style="height:50px;;background-color:#3c4048 ;color:#fff;border-radius: 0px 50px 50px 0px;"
                        type="submit" name="tk" class="btn btn-outline-white" data-mdb-ripple-color="dark"><i
                            class="fas fa-search"></i> Tìm Kiếm</button>
                </form>
            </div>
            <!-- Right links -->

            <ul class="navbar-nav ms-auto d-flex flex-row mt-3 mt-lg-0 ">




                <div class="nav-item text-center mx-2 mx-lg-1">
                    <div id="cart" style="
    padding: 0 60px 14px 0;
"><a href="cart.php" style="color:#000"><i class="fas fa-shopping-cart fa-lg mb-2"
                                style="margin-top: 15px; color:#000"></i>(<?php
                                                                                                                                $ok = 1;
                                                                                                                                if (isset($_SESSION['cart'])) {
                                                                                                                                    foreach ($_SESSION['cart'] as $key => $value) {
                                                                                                                                        if (isset($key)) {
                                                                                                                                            $ok = 2;
                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                }

                                                                                                                                if ($ok == 2) {
                                                                                                                                    echo count($_SESSION['cart']);
                                                                                                                                } else {
                                                                                                                                    echo   "0";
                                                                                                                                }


                                                                                                                                ?>)</a>
                    </div>
                </div>
        </div>

        </ul>
        <!-- Right links -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->