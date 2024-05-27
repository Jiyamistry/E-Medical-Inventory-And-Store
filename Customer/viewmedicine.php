<?php
  include("header.php");
?>
<div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
  <div class="banner-section">
    <div class="container text-center wow fadeInUp">
      <nav aria-label="Breadcrumb">
        <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Medicine</li>
        </ol>
      </nav>
      <h1 class="font-weight-normal">Medicine</h1>
    </div>
  </div>
</div>
<div class="page-section">
  <div class="container">
    <table class="table  text-center" >
  <thead>
    <tr>
      <th scope="col">Medicine_no</th>
      <th scope="col">Medicine_name</th>
      <th scope="col">Expiry_Date</th>
      <th scope="col">Price</th>
      <th scope="col">Dose</th>
      <th scope="col">Order</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
        $a="Select * from medicinedetails";
        $query=mysqli_query($db,$a);
        while($fetch=mysqli_fetch_array($query))
        {
            echo "<tr>
            <td>".$fetch['Medicine_no']."</td>
            <td>".$fetch['Medicine_name']."</td>
            <td>".$fetch['Expiry_date']."</td>
            <td>".$fetch['Price']."</td>
            <td>".$fetch['Dose_mg']."</td>
            <td><a class='btn btn-primary p-2' href='placeorder.php?name=".$fetch['Medicine_name']."'>Place Order</a></td>
            <td><a class='btn btn-primary p-2' href='operations.php?name=".$fetch['Medicine_name']."&op=edit'>Edit
            </a><a class='btn btn-primary ml-2 p-2' href='operations.php?name=".$fetch['Medicine_name']."&op=delete'>Delete</a></td>
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