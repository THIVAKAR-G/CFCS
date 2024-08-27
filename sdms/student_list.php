<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sid']==0)) {
  header('location:logout.php');
} 
if(isset($_GET['del'])) {
  mysqli_query($con,"DELETE FROM students WHERE id = '".$_GET['id']."'");
  $_SESSION['delmsg']="Student deleted!";
}
?>
<!DOCTYPE html>
<html>
<?php @include("includes/head.php"); ?>
<body class="hold-transition sidebar-mini" style="font-family: Arial, sans-serif; background-color: #f4f6f9;">
  <div class="wrapper">
    <!-- Navbar -->
    <?php @include("includes/header.php"); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php @include("includes/sidebar.php"); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background-color: #ffffff; padding: 20px; border-radius: 8px;">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 style="color: #007bff; font-size: 24px; font-weight: bold;">Student Details</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right" style="background-color: #ffffff; border-radius: 4px;">
                <li class="breadcrumb-item"><a href="dashboard.php" style="color: #007bff;">Home</a></li>
                <li class="breadcrumb-item active" style="color: #6c757d;">Manage Students</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card" style="border: 1px solid #dee2e6; border-radius: 8px;">
                <div class="card-header" style="background-color: #007bff; color: #ffffff; border-bottom: 1px solid #dee2e6;">
                  <h3 class="card-title" style="font-size: 18px;">Manage Students</h3>
                  <div class="card-tools">
                    <!-- <a href="add_student.php"><button type="button" class="btn btn-sm btn-primary" ><span style="color: #fff;"><i class="fas fa-plus" ></i>  New Students</span> -->
                    </button> </a>                  
                  </div>
                </div>
                <!-- /.card-header -->

                <div id="editData" class="modal fade">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content" style="border-radius: 8px;">
                      <div class="modal-header" style="background-color: #007bff; color: #ffffff;">
                        <h5 class="modal-title">Edit Student Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #ffffff;">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body" id="info_update" style="padding: 20px;">
                        <?php @include("edit_student.php");?>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #e9ecef; color: #007bff;">Cancel</button>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                </div>

                <div id="editData2" class="modal fade">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="border-radius: 8px;">
                      <div class="modal-header" style="background-color: #007bff; color: #ffffff;">
                        <h5 class="modal-title">View Student Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #ffffff;">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body" id="info_update2" style="padding: 20px;">
                        <?php @include("view_student_info.php");?>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #e9ecef; color: #007bff;">Cancel</button>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                </div>

                <div class="card-body mt-2">
                  <table id="example1" class="table table-bordered table-hover" style="border-collapse: collapse; width: 100%;">
                    <thead> 
                      <tr style="background-color: #007bff; color: #ffffff;">
                        <th style="padding: 12px; text-align: center;">#</th>
                        <th style="padding: 12px; text-align: center;">Image</th>
                        <th style="padding: 12px; text-align: center;">Name</th>
                        <th style="padding: 12px; text-align: center;">Id :</th>
                        <th style="padding: 12px; text-align: center;">City : </th>
                        <th style="padding: 12px; text-align: center;">Action</th>
                      </tr> 
                    </thead> 
                    <tbody>
                      <?php 
                      $query = mysqli_query($con, "SELECT * FROM students");
                      $cnt = 1;
                      while ($row = mysqli_fetch_array($query)) {
                      ?>                  
                        <tr>
                          <td style="text-align: center; padding: 8px;"><?php echo htmlentities($cnt);?></td>
                          <td class="align-middle" style="text-align: center; padding: 8px;">
                            <a href="#"><img src="studentimages/<?php echo htmlentities($row['studentImage']);?>" width="70" height="70" style="border-radius: 40%;"></a>
                          </td>
                          <td style="padding: 10px;"><?php echo htmlentities($row['studentName']);?></td>
                          <td style="padding: 8px;"><?php echo htmlentities($row['studentno']);?></td>
                          <td style="padding: 8px;"><?php echo htmlentities($row['district']);?></td>
                          <td style="text-align: center; padding: 10px;">
                            <button class="btn btn-primary btn-xs edit_data" id="<?php echo $row['id']; ?>" title="Click to Edit" style="margin-right: 5px;">Edit</button>
                            <button class="btn btn-success btn-xs edit_data2" id="<?php echo $row['id']; ?>" title="Click to View" style="margin-right: 5px;">View</button>
                            <a href="student_list.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-xs" style="text-decoration: none; color: #ffffff;">Delete</a>
                          </td>
                        </tr>
                        <?php 
                        $cnt = $cnt + 1;
                      } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php @include("includes/footer.php"); ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>

  <!-- ./wrapper -->
  <?php @include("includes/foot.php"); ?>
  
  <script type="text/javascript">
    $(document).ready(function(){
      $(document).on('click','.edit_data',function(){
        var edit_id=$(this).attr('id');
        $.ajax({
          url:"edit_student.php",
          type:"post",
          data:{edit_id:edit_id},
          success:function(data){
            $("#info_update").html(data);
            $("#editData").modal('show');
          }
        });
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $(document).on('click','.edit_data2',function(){
        var edit_id2=$(this).attr('id');
        $.ajax({
          url:"view_student_info.php",
          type:"post",
          data:{edit_id2:edit_id2},
          success:function(data){
            $("#info_update2").html(data);
            $("#editData2").modal('show');
          }
        });
      });
    });
  </script>
</body>
</html>
