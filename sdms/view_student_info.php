<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<div class="row" style="
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px;
  flex-wrap: wrap;
">
  <?php
  $eid2 = $_POST['edit_id2'];
  $ret2 = mysqli_query($con, "SELECT * FROM students WHERE id='$eid2'");
  while ($row = mysqli_fetch_array($ret2)) {
    ?>
    <div class="col-md-12" style="
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      border: 1px solid #dee2e6;
      border-radius: 8px;
      padding: 20px;
      background-color: #ffffff;
      max-width: 100%;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    ">
      <!-- Student Image -->
      <div style="
        margin-bottom: 20px;
        width: 150px;
        height: 150px;
        display: flex;
        justify-content: center;
        align-items: center;
      ">
        <img src="studentimages/<?php echo htmlentities($row['studentImage']);?>" width="150" height="150" style="
          border-radius: 20%;
          border: 3px solid #007bff;
        ">
      </div>
      <!-- Student Details -->
      <div style="width: 100%; max-width: 600px; margin: 0 auto;">
        <table style="
          width: 100%;
          border-collapse: collapse;
        ">
          <tr style="
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
          ">
            <th style="
              padding: 10px;
              text-align: left;
              color: #007bff;
              font-weight: bold;
            ">Student Id</th>
            <td style="
              padding: 10px;
            "><?php echo htmlentities($row['studentno']);?></td>
          </tr>
          <tr style="
            border-bottom: 1px solid #dee2e6;
          ">
            <th style="
              padding: 10px;
              text-align: left;
              color: #007bff;
              font-weight: bold;
            ">Name</th>
            <td style="
              padding: 10px;
            "><?php echo htmlentities($row['studentName']);?></td>
          </tr>
          <tr style="
            border-bottom: 1px solid #dee2e6;
          ">
          <tr style="
            border-bottom: 1px solid #dee2e6;
          ">
            <th style="
              padding: 10px;
              text-align: left;
              color: #007bff;
              font-weight: bold;
            ">College</th>
            <td style="
              padding: 10px;
            "><?php echo htmlentities($row['class']);?></td>
          </tr>
            <th style="
  padding: 10px;
  text-align: left;
  color: #007bff;
  font-weight: bold;
">Location</th>
<td style="
  padding: 10px;
">
  <?php
    // Sanitize the URL to prevent XSS attacks
    $url = htmlspecialchars($row['village'], ENT_QUOTES, 'UTF-8');
    
    // Display the URL as a button with placeholder text
    echo '<a href="' . $url . '" target="_blank" rel="noopener noreferrer" style="
      display: inline-block;
      padding: 8px 16px;
      font-size: 14px;
      font-weight: bold;
      color: black;
      background-color: gold;
      text-align: center;
      text-decoration: none;
      border-radius: 10px;
      border: 1px solid #007bff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
      transition: background-color 0.3s, color 0.3s;
    " onmouseover="this.style.backgroundColor=\'#0056b3\'; this.style.color=\'#fff\';" onmouseout="this.style.backgroundColor=\'#007bff\'; this.style.color=\'#fff\';">Live Location</a>';
  ?>
</td>
        </table>
      </div>
    </div>
    <?php 
  } ?>
</div>
