<?php
  include("header.php");
?>
<div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
  <div class="banner-section">
    <div class="container text-center wow fadeInUp">
      <nav aria-label="Breadcrumb">
        <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Medical</li>
        </ol>
      </nav>
      <h1 class="font-weight-normal">Medicial</h1>
    </div>
  </div>
</div>
<div class="page-section">
  <div class="container">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Medical_Name</th>
      <th scope="col">Person_Name</th>
      <th scope="col">Email</th>
      <th scope="col">Contact</th>
      <th scope="col">Address</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
        $a="SELECT * FROM register";
        $query=mysqli_query($db,$a);
        while($fetch=mysqli_fetch_array($query))
        {
            echo "<tr>
            <td>".$fetch['Medical_name']."</td>
            <td>".$fetch['Person_name']."</td>
            <td>".$fetch['Email']."</td>
            <td>".$fetch['Contact']."</td>
            <td>".$fetch['Address']."</td>
            <td><a class='btn btn-primary p-2' href='operations.php?log_id=".$fetch['log_id']."&op=edit'>Edit
            </a><a class='btn btn-primary ml-2 p-2' href='operations.php?log_id=".$fetch['log_id']."&op=delete'>Delete</a></td>
            
            </tr>";
        }
    ?>
    </tr>
  </tbody>
</table>
    </div>
  </div>
  <?php
    include("footer.php");
  ?>