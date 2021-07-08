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

                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="mdi mdi-bell"></i>
                        <span class="count">4</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <a class="dropdown-item">
                            <p class="mb-0 font-weight-normal float-left">You have 4 new notifications
                            </p>
                            <span class="badge badge-pill badge-warning float-right">View all</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-success">
                                    <i class="mdi mdi-alert-circle-outline mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-medium text-dark">Application Error</h6>
                                <p class="font-weight-light small-text">
                                    Just now
                                </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-warning">
                                    <i class="mdi mdi-comment-text-outline mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-medium text-dark">Settings</h6>
                                <p class="font-weight-light small-text">
                                    Private message
                                </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-info">
                                    <i class="mdi mdi-email-outline mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-medium text-dark">New user registration</h6>
                                <p class="font-weight-light small-text">
                                    2 days ago
                                </p>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown d-none d-xl-inline-block">
                    <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <span class="profile-text">Hello, <?php echo $_SESSION["name"]; ?></span>
                       
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                        <a class="dropdown-item p-0">
                            <div class="d-flex border-bottom">
                                <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                                </div>
                                <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                                </div>
                                <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                                    <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                                </div>
                            </div>
                        </a>
                        <a  href="#" class="dropdown-item mt-2">
                            Manage Accounts
                        </a>
                        <a href="#"  class="dropdown-item">
                            Change Password
                        </a>
                        <a href="logout.php" class="dropdown-item">
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
        include "include/Leftmenu.php";
        ?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row purchace-popup">

                </div>

                <?php //include "include/widgets.php";?>
                <?php
                include 'include/config.php';
                $internalID = $_GET["internal"];

                $sql = "SELECT*FROM student1 WHERE st_id=".$internalID;
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $row = $stmt->fetch(PDO::FETCH_OBJ);
                    //get prog

                ?>

                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-12 grid-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title"><h1 class="text-blue"><?php echo $row->firstname." ".$row->lastname ?></h1></h4>
                                             <small><?php print $row->program//$row->othername ?></small>
                                            <hr>

                                            <br>
                                            <div id="course">
                                                <h3>Courses</h3>

                                                <div id="disp">
                                                    <?php
                                                    $sqlz = "SELECT*FROM program INNER JOIN program_course 
                                                    ON  program.id = program_course.programID 
                                                    WHERE shortname='$row->programCode'";
                                                    $pstmt = $conn->prepare($sqlz);
                                                    $pstmt->execute();
                                                    if ($pstmt->rowCount()>0){
                                                    $r = $pstmt->fetch(PDO::FETCH_ASSOC);
                                                    $prog = $r["id"];

                                                    $sl = "SELECT*FROM course INNER JOIN program_course ON course.course_id=program_course.CourseID
                                                     WHERE program_course.programID =$prog ORDER BY semester ASC";
                                                    $course = $conn->prepare($sl);
                                                    $course->execute();

/*
course_id CourseName CourseCode year semester pc_id CourseID programID
 * */
                                                    ?>

                                                    <table class="table table-bordered table-responsive-lg">
                                                        <thead class="bg bg-primary text-white Bold">
                                                           <tr>
                                                               <th>Course</th>
                                                               <th>Semester</th>
                                                           </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php while($x = $course->fetch(PDO::FETCH_ASSOC)) {

                                                            $couseName = $x["CourseName"];
                                                            $semester = $x["semester"];

                                                            if ($semester == 1) {
                                                                ?>

                                                                <tr>
                                                                    <td>
                                                                        <a href="#"
                                                                           class="nav-link"> <?php echo $couseName ?></a>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $semester ?>
                                                                    </td>
                                                                </tr>
                                                            <?php } else if ($semester == 2) { ?>

                                                                <tr>
                                                                    <td>
                                                                        <a href="#"
                                                                           class="nav-link"> <?php echo $couseName ?></a>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $semester ?>
                                                                    </td>
                                                                </tr>
                                                            <?php } else if ($semester == 3) { ?>

                                                            <tr>
                                                                <td>
                                                                    <a href="#"
                                                                       class="nav-link"> <?php echo $couseName ?></a>
                                                                </td>
                                                                <td>
                                                                    <?php echo $semester ?>
                                                                </td>
                                                            </tr>
                                                        <?php }else if ($semester == 4) { ?>

                                                            <tr>
                                                                <td>
                                                                    <a href="#"
                                                                       class="nav-link"> <?php echo $couseName ?></a>
                                                                </td>
                                                                <td>
                                                                    <?php echo $semester ?>
                                                                </td>
                                                            </tr>
                                                        <?php }else if ($semester == 5) { ?>

                                                            <tr>
                                                                <td>
                                                                    <a href="#"
                                                                       class="nav-link"> <?php echo $couseName ?></a>
                                                                </td>
                                                                <td>
                                                                    <?php echo $semester ?>
                                                                </td>
                                                            </tr>
                                                        <?php }else if ($semester == 6) { ?>

                                                            <tr>
                                                                <td>
                                                                    <a href="#"
                                                                       class="nav-link"> <?php echo $couseName ?></a>
                                                                </td>
                                                                <td>
                                                                    <?php echo $semester ?>
                                                                </td>
                                                            </tr>
                                                        <?php }else if ($semester == 7) { ?>

                                                            <tr>
                                                                <td>
                                                                    <a href="#"
                                                                       class="nav-link"> <?php echo $couseName ?></a>
                                                                </td>
                                                                <td>
                                                                    <?php echo $semester ?>
                                                                </td>
                                                            </tr>
                                                        <?php }else if ($semester == 8) { ?>

                                                            <tr>
                                                                <td>
                                                                    <a href="#"
                                                                       class="nav-link"> <?php echo $couseName ?></a>
                                                                </td>
                                                                <td>
                                                                    <?php echo $semester ?>
                                                                </td>
                                                            </tr>
                                                        <?php }?>
<!--                                                            While loop-->
                                                        <?php }?>

                                                        </tbody>
                                                    </table>

                                                    <?php }else{
                                                        echo "
                                                        <hr>
                                                        There are no Courses in this Program";
                                                    }?>

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