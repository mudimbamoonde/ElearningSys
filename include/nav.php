<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a href="home.php" class="navbar-brand"><b>ELearning</b>System</a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">

                    <li><a href="index.php">Home Page <span class="sr-only">(current)</span></a></li>

                    <li><a href="my_course.php?material=257">Course Material</a></li>
                    <!-- <li><a href="my_course.php?disc=256">Online Discussion</a></li> -->
<!--                    <li><a href="my_course.php?confere">Conference Videos</a></li>-->
                    <li><a href="my_course.php?vid=254">Tutorial Videos</a></li>
<!--                    <li><a href="#">Learning Results</a></li>-->
                                
                                    <?php
                if(isset($_SESSION["email"])){
                    if($_SESSION["accessLevel"]=="System Admin"){
                         header("location:AdminPanel/index.php");
                        // echo "<li><a href=''>".$_SESSION['accessLevel']."</a></li>";
                    }
                }else{
                    header("location:../logout.php");
                }
                ?>
                    <li><a href="logout.php" >Logout</a></li>
                    <li><a href=#" class="btn btn-danger">Hi,<?php echo $_SESSION["name"] ?></a ></li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->

            <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</header>
