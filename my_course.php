<!DOCTYPE html>
<html>
<?php
include "include/head.php";
?>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

    <?php include "include/nav.php";?>
<?php
//course_id	CourseName	CourseCode	year	semester

//asign_id	student_ID programID	course_ID	Semester	grade
$select = "SELECT*FROM student_course INNER JOIN course  ON course.course_id = student_course.course_ID
AND  student_course.Semester = course.semester WHERE student_ID =".$_SESSION["username"];
$stmt = $conn->prepare($select);
$stmt->execute();
?>
    <!-- Full Width Column -->
    <div class="content-wrapper">
        <div class="container">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Student
                    <small>ELearning Sys </small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Courses</a></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <?php  if(isset($_GET["course"])){?>
                <?php  if(isset($_GET["vid"])){?>

                <div class="col-md-3">

                    <?php

                        $sqlx = "SELECT*FROM course INNER JOIN tutorial ON course.course_id = tutorial.course_id WHERE course.course_id=?";
                        $stmtx = $conn->prepare($sqlx);
                        $stmtx->bindValue(1, $_GET["course"]);
                        $stmtx->execute();
                        ?>
                            <ul class="list-group">
<!--                                <li class="list-group-item active" aria-current="true">--><?php //echo $ro->CourseName?><!--</li>-->
                            <?php while ($rw = $stmtx->fetch(PDO::FETCH_OBJ)) {?>

                                <a  class="list-group-item" href="?vid=<?php echo $_GET["vid"]?>&viewID=<?php echo $rw->tutorialID ?>&course=<?php echo $_GET["course"]  ?>">
                                    <i class="menu-icon mdi mdi-video-input-svideo"></i>
                                    <span class="menu-title"><?php echo $rw->videoName ?></span>
                                </a>

                        <?php }?>
                        </ul>

                </div>
                <?php }else{ ?>
                    <div class="col-md-2"></div>
                <?php }?>
                <?php }else{?>
                <div class="col-md-2"></div>
                <?php } ?>
                <div class="col-md-8">

                    <div class="panel panel-default">
<!--                        <div class="panel-heading"><h4>Courses</h4></div>-->
                        <div class="panel-body">
                            <!--                       Message-->

                            <?php if(isset($_GET["course"])){?>
                            <?php if(isset($_GET["material"])){ ?>
                               <?php 
                                 $sqlx = "SELECT*FROM course INNER JOIN courseMaterial ON course.course_id = courseMaterial.course_id WHERE course.course_id=?";
                                 $stmtx = $conn->prepare($sqlx);
                                 $stmtx->bindValue(1, $_GET["course"]);
                                 $stmtx->execute();
                                 if ($stmtx->rowCount()>0) {
                                     $po = $stmtx->fetch(PDO::FETCH_OBJ);
                                     echo "<h1>$po->CourseName</h1>";
                                     echo "<hr>";
                                     echo $po->description;

                                     ?>

                                <?php

                                $sql = "SELECT*FROM course INNER JOIN courseMaterial ON course.course_id = courseMaterial.course_id ";
                                $stmt = $conn->prepare($sql);
                        
                                $stmt->execute();
                             
                    
                                    ?>
                                   
                                   <table class="table table-striped">
                                     <thead>
                                       <tr>
                                         <th>File Name</th>
                                         <th>Action</th>
                                       </tr>
                                     </thead>
                                     <tbody>
                                     <?php 
                                     while ($rr = $stmt->fetch(PDO::FETCH_OBJ)) {
                                         echo "<tr>
                                          <td>$rr->fileName</td>
                                          <td><a href='$rr->fileName' class='btn btn-sm btn-success' download><span class='fa fa-download'></span> Download</a></td>
                                       </tr>";
                                     }
                                       ?>
                                     </tbody>
                                   </table>
    





                                     <?php 
                                 } else {
                                     echo "<h1>No File Uploaded</h1>";
                                 }
                               
                               ?>










                            <?php }else if(isset($_GET["vid"])){ ?>
                                <?php if (!isset($_GET["viewID"])) {?>
                                <?php

                                $sqlx = "SELECT*FROM course INNER JOIN tutorial ON course.course_id = tutorial.course_id WHERE course.course_id=?";
                                $stmtx = $conn->prepare($sqlx);
                                $stmtx->bindValue(1, $_GET["course"]);
                                $stmtx->execute();
                                if ($stmtx->rowCount()>0) {
                                    $po = $stmtx->fetch(PDO::FETCH_OBJ);
                                    echo "<h1>$po->CourseName</h1>";
                                    echo "<hr>";
                                    echo $po->description;
                                } else {
                                    echo "<h1>No Tutorials</h1>";
                                }

                                } else { ?>


<!--sns-->
                                    <?php

                                    $sql = "SELECT*FROM course INNER JOIN tutorial ON course.course_id = tutorial.course_id WHERE tutorialID =?";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bindValue(1, $_GET["viewID"]);
                                    $stmt->execute();
                                    $row = $stmt->fetch(PDO::FETCH_OBJ);
                                    echo "<h1>$row->CourseName</h1>";
                                    echo "<hr>";
                                        ?>
                                        <video controls style="max-width:690px; background-image: url('https://i.vimeocdn.com/video/687318265_640x360.jpg')">
                                            <source src="AdminPanel/Tutorials/<?php echo $row->videoName ?>" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>

<!--                                    End-->


                                <?php }
                                
                                } ?>

                            <?php }else{?>
                            <table class="table table-bordered">
                                <thead>
                                <?php

                                $sq = "SELECT*FROM student_program WHERE student_id=".$_SESSION["username"];
                                $sr = $conn->prepare($sq);
                                $sr->execute();
                                $r = $sr->fetch(PDO::FETCH_OBJ);
                                ?>
                                  <tr class="text-center">
                                      <td> <?php echo $r->programName ?></td>
                                  </tr>
                                </thead>

                                <tbody class="text-center">
                                <?php
                                while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                                $course = $row->CourseName;
                                $course_ID = $row->course_ID;
                                ?>
                                   <tr>
                                       <td>
<!--                                          <a href="S_course.php?id=--><?php //echo $course_ID?><!--" class="nav-link">--><?php //echo $course ?><!--</a>-->
                                        <?php 
                                         if(isset($_GET["vid"]) == "254"){
                                        ?>
                                          <a href="my_course.php?vid=254&course=<?php echo $course_ID ?>" class="nav-link"><?php echo $course ?></a>
                                        <?php }else if(isset($_GET["material"]) == "257" ){?>
                                           <a href="my_course.php?material=254&course=<?php echo $course_ID ?>" class="nav-link"><?php echo $course ?></a>
                                        <?php } ?>
                                       </td>
                                   </tr>
                                <?php }?>
                                </tbody>
                            </table>
                            <?php } ?>

                        </div>

                        <!-- /.chat -->
                    </div>
                    <!--                       Message-->
                </div>
        </div>

    </div>

    <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->
<?php include "include/footer.php";?>
</div>
<!-- ./wrapper -->

<?php
include "include/javaScript.php";

?>
</body>
</html>