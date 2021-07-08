<!DOCTYPE html>
<html lang="en">
<?php
include "include/head.php";

?>

<body style="font-size: 15px">
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
            <a class="navbar-brand brand-logo bg-success" href="index.php">
                <!--          <img src="images/logo.svg" alt="logo" />-->
                E-Learning System
            </a>
            <a class="navbar-brand brand-logo-mini" href="index.php">
                <!--          <img src="images/logo-mini.svg" alt="logo" />-->
                E-Learning System
            </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown d-none d-xl-inline-block">
                    <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <span class="profile-text">Hello,  <?php echo $_SESSION["name"]; ?></span>
                       
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">

                        <a  href="#" class="dropdown-item mt-2">
                            Manage Accounts
                        </a>
                        <a href="#"  class="dropdown-item">
                            Change Password
                        </a>
                        <a href="../logout.php" class="dropdown-item">
                            Logout Out
                        </a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
<?php
require_once "include/config.php";
?>
        <nav class="sidebar sidebar-offcanvas" id="sidebar" >
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <div class="nav-link">
                        <div class="user-wrapper">
                            <div class="profile-image">
                                <img src="images/faces/face1.jpg" alt="profile image">
                            </div>
                            <div class="text-wrapper">
                                <p class="profile-name"><?php echo $_SESSION["name"] ?></p>
                                <div>
                                    <small class="designation text-muted"><?php echo $_SESSION["accessLevel"] ?></small>
                                    <span class="status-indicator online"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <?php

                $sqlx = "SELECT*FROM course INNER JOIN tutorial ON course.course_id = tutorial.course_id WHERE course.course_id=?";
                $stmtx = $conn->prepare($sqlx);
                $stmtx->bindValue(1,$_GET["viewID"]);
                $stmtx->execute();
                while($rw = $stmtx->fetch(PDO::FETCH_OBJ)){
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="PerCourseView.php?viewID=<?php echo $_GET["viewID"] ?>&vid=<?php echo $rw->tutorialID ?>">
                        <i class="menu-icon mdi mdi-video-input-svideo"></i>
                        <span class="menu-title"><?php echo $rw->videoName ?></span>
                    </a>
                </li>
                <?php }?>
                <li class="nav-item">
                    <a class="nav-link" href="manageTutorials.php">
                        <i class="menu-icon mdi mdi-skip-backward"></i>
                        <span class="menu-title">Back</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-12 grid-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <?php

                                            $sql = "SELECT*FROM course INNER JOIN tutorial ON course.course_id = tutorial.course_id WHERE course.course_id =?";
                                            $stmt = $conn->prepare($sql);
                                            $stmt->bindValue(1,$_GET["viewID"]);
                                            $stmt->execute();
                                            $row = $stmt->fetch(PDO::FETCH_OBJ);
                                            ?>
                                            <h1><?php echo $row->CourseName ?></h1>
                                            <?php
                                            if(isset($_GET["vid"])){
                                                $sql = "SELECT*FROM course INNER JOIN tutorial ON course.course_id = tutorial.course_id WHERE tutorialID =?";
                                                $stmt = $conn->prepare($sql);
                                                $stmt->bindValue(1,$_GET["vid"]);
                                                $stmt->execute();
                                                $row = $stmt->fetch(PDO::FETCH_OBJ);
                                            ?>
                                            <video controls style="max-width:850px; background-image: url('https://i.vimeocdn.com/video/687318265_640x360.jpg')">>
                                                <source src="Tutorials/<?php echo $row->videoName ?>" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                            <?php
                                            }else{
                                                echo $row->description;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php
    include "include/footer.php";
    ?>
    <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<?php
include "include/javaSc.php";
?>
</body>

</html>