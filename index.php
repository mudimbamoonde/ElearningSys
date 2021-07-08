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
                    <small>ELearning Sys</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                   
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="col-md-2"></div>
                <div class="col-md-8 text-center">

                    <div class="panel panel-default">
<!--                        <div class="panel-heading"><h4>Courses</h4></div>-->
                        <div class="panel-body">
                            <!--                       Message-->
                
                            <div class='panel panel-info'>
                                <div class='panel-heading'>Avaliable Courses</div>
                            <?php 
                            //asign_id	student_ID programID	course_ID	Semester	grade
                        $select = "SELECT*FROM student_course INNER JOIN course  ON course.course_id = student_course.course_ID
                        AND  student_course.Semester = course.semester WHERE student_ID =".$_SESSION["username"];
                        $stmt = $conn->prepare($select);
                        $stmt->execute();

                            while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                                echo "
                                
                                <div class='panel-body'>
                                  $row->CourseName
                                </div>
                              
                                ";
                            }
                            ?>
                    </div>
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