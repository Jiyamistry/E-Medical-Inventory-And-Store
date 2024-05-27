<?php
  include("header.php");
?>
<div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
  <div class="banner-section">
    <div class="container text-center wow fadeInUp">
      <nav aria-label="Breadcrumb">
        <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Order</li>
        </ol>
      </nav>
      <h1 class="font-weight-normal">Order</h1>
    </div>
  </div>
</div>
<div class="page-section">
  <div class="container">
  <a class="btn btn-primary ml-lg-3" href="placeorder.php">Place Order</a><br/><br/>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Medicine_no</th>
      <th scope="col">Medicine_name</th>
      <th scope="col">Customer_name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Contact</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
        $a="Select * from orderdetails";
        $query=mysqli_query($db,$a);
        while($fetch=mysqli_fetch_array($query))
        {
            echo "<tr>
            <td>".$fetch['Medicine_no']."</td>
            <td>".$fetch['Medicine_name']."</td>
            <td>".$fetch['Customer_name']."</td>
            <td>".$fetch['Quantity']."</td>
            <td>".$fetch['Price']."</td>
            <td>".$fetch['Contact']."</td>
            <td><a class='btn btn-primary p-2' href='orderoperations.php?cuname=".$fetch['Customer_name']."&oporder=edit'>Edit
            </a><a class='btn btn-primary ml-2 p-2' href='orderoperations.php?cuname=".$fetch['Customer_name']."&oporder=delete'>Delete</a></td>
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