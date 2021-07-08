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
        include "include/Leftmenu.php";
        ?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row purchace-popup">

                </div>

                <?php include "include/widgets.php";?>

                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-12 grid-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <h1>Manage Courses</h1>
                                            <br>
                                            <div id="vidMessage">
                                                <?php
                                                  if (isset($_POST["saveFiles"])){
                                                      require_once "include/config.php";
                                                      $total_files = count($_FILES['upload']['name']);
//                                                      checkifFile($);
                                                      for($i=0; $i<$total_files;$i++){
                                                          $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
                                                         if(checkifFile($_FILES["upload"]["name"][$i])){
                                                             $storageFolder = "material/".$_FILES['upload']['name'][$i];
                                                             $courseCode = $_POST["courseCode"];
//                                                             $videoName = $_POST["videoName"];
                                                             $description = $_POST["description"];

                                                             $sqlx = "INSERT INTO courseMaterial(materialID, fileName, course_id, description)VALUES(?,?,?,?)";
                                                             $stmtt = $conn->prepare($sqlx);
                                                             $stmtt->bindValue(1,null);
                                                             $stmtt->bindValue(2,$_FILES["upload"]["name"][$i]);
                                                             $stmtt->bindValue(3,$courseCode);
                                                             $stmtt->bindValue(4,$description);
                                                             if($stmtt->execute()){
                                                             if(move_uploaded_file($tmpFilePath, $storageFolder)) {
                                                                 echo "Files Uploaded Successfully!!";
                                                             }else{
                                                                 echo "<br>Failed to Upload files: ".$_FILES["upload"]["name"][$i]."<br>";
                                                             }

                                                             }
                                                         }else{
                                                             echo "<br>Not Supported files: <b>".$_FILES["upload"]["name"][$i]."</b> \n";
                                                         }
                                                      }

                                                  }

                                                  function checkifFile($file){
                                                      $allowed = array('pdf', 'doc', 'docx','xls','xlsx','ppt','pptx');
                                                      $ext = pathinfo($file, PATHINFO_EXTENSION);
                                                      if (!in_array($ext, $allowed)) {
                                                         return false;
                                                      }else{
                                                          return true;
                                                      }
                                                  }
                                                ?>
                                            </div>
                                            <br>
                                            <form class="form-sample" method="post" enctype="multipart/form-data">
                                                <div class="row">
<!--                                                    <div class="col-md-6">-->
<!--                                                        <div class="form-group row">-->
<!--                                                            <label for='videoName' class="col-sm-3 col-form-label">Video Name:</label>-->
<!--                                                            <div class="col-sm-9">-->
<!--                                                                <input type="text" id="videoName" name="videoName" style="border: groove" class="form-control" />-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                    </div>-->

                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label for='courseCode' class="col-sm-3 col-form-label">Course Name:</label>
                                                            <div class="col-sm-9">
                                                                <select id="courseCode" name="courseCode" class="form-control selectForm" style="border: groove">
                                                                    <option>SELECT COURSE</option>
                                                                    <?php
                                                                    require_once "include/config.php";

                                                                    $sql = "SELECT*FROM course";
                                                                    $stmt = $conn->prepare($sql);
                                                                    $stmt->execute();
                                                                    while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                                                                         echo "<option value='$row->course_id'>$row->CourseName</option>";
                                                                    }
                                                                    ?>
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label for="upload" class="col-sm-3 col-form-label">Upload File</label>
                                                            <div class="col-sm-9">
                                                                <input  name="upload[]" type="file" id="upload" multiple="multiple" style="border: groove"  />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label for="description" class="col-sm-3 col-form-label">Description</label>
                                                            <div class="col-sm-9">
                                                               <textarea name="description" id="description" class="form-control" style="border: groove"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
<!--                                                        <a href="#" id="saveCourse" class="btn btn-success">Save</a>-->
                                                        <button name="saveFiles" class="btn btn-success" type="submit">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!--End of Form Add School         -->
                                            <p><br></p>
                                            <p><br></p>
                                            <table class="table table-responsive">
                                                <thead>
                                                  <tr class="bg bg-dark text-white">
                                                      <td>Course Name</td>
                                                      <td>Action</td>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                require_once "include/config.php";

                                                $sql = "SELECT course.course_id, courseName,tutorialID FROM course INNER JOIN tutorial ON course.course_id = tutorial.course_id GROUP BY courseName" .
                                                    "";
                                                $stmt = $conn->prepare($sql);
                                                $stmt->execute();
                                                while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                                                    $hashed = $row->course_id;
                                                    echo "<tr>
                                                      <td><a href='PerCourseView.php?viewID=$hashed'>$row->courseName</a></td>
                                                      <td><a href='#' class='btn btn-warning'>X</a> | <a href='#' class='btn btn-danger'>Edit</a> </td>
                                                  </tr>";
                                                }

                                                ?>

                                                </tbody>

                                            </table>
                                                
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