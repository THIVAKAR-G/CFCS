<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sid']) == 0) {
    header('location:logout.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <?php include("includes/head.php"); ?>
    <!-- Add custom styles here -->
    <style>
        .small-box {
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            color: #fff;
            padding: 20px;
            margin-bottom: 20px;
        }
        .small-box .inner {
            padding: 10px;
        }
        .small-box h3 {
            font-size: 2rem;
            font-weight: bold;
        }
        .small-box p {
            font-size: 1.2rem;
        }
        .small-box .icon {
            font-size: 4rem;
            position: absolute;
            right: 10px;
            top: 10px;
            opacity: 0.3;
        }
        .small-box:hover {
            background: rgba(0,0,0,0.1);
            transform: scale(1.02);
        }
        .bg-info {
            background-color: #17a2b8 !important;
        }
        .bg-success {
            background-color: #28a745 !important;
        }
        .small-box-footer {
            display: block;
            background: rgba(0,0,0,0.1);
            color: #fff;
            text-align: center;
            padding: 10px;
            border-radius: 0 0 8px 8px;
        }
        .small-box-footer:hover {
            background: rgba(0,0,0,0.2);
        }
        .content-header h1 {
            font-size: 1.5rem;
            font-weight: 600;
        }
        .breadcrumb-item a {
            color: #007bff;
        }
        .breadcrumb-item a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include("includes/header.php"); ?>
        <!-- Main Sidebar Container -->
        <?php include("includes/sidebar.php"); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <!-- Total Students -->
                        <div class="col-lg-4 col-12">
                            <div class="small-box bg-info">
                                <?php 
                                $query1 = mysqli_query($con, "SELECT * FROM students");
                                $totalcust = mysqli_num_rows($query1);
                                ?>
                                <div class="inner">
                                    <h3><?php echo $totalcust; ?></h3>
                                    <p>Total Students</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="student_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- Total Male Students -->
                        <div class="col-lg-4 col-12">
                            <div class="small-box bg-success">
                                <?php 
                                $query2 = mysqli_query($con, "SELECT * FROM students WHERE gender='Male'");
                                $totalmale = mysqli_num_rows($query2);
                                ?>
                                <div class="inner">
                                    <h3><?php echo $totalmale; ?></h3>
                                    <p>Total Male Students</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="student_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- Total Female Students -->
                        <div class="col-lg-4 col-12">
                            <div class="small-box bg-info">
                                <?php 
                                $query3 = mysqli_query($con, "SELECT * FROM students WHERE gender='Female'");
                                $totalfemale = mysqli_num_rows($query3);
                                ?>
                                <div class="inner">
                                    <h3><?php echo $totalfemale; ?></h3>
                                    <p>Total Female Students</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="student_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include("includes/footer.php"); ?>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php include("includes/foot.php"); ?>
</body>
</html>
