<?php
  include("header.php");
?>
<div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
  <div class="banner-section">
    <div class="container text-center wow fadeInUp">
      <nav aria-label="Breadcrumb">
        <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Queries</li>
        </ol>
      </nav>
      <h1 class="font-weight-normal">Queries</h1>
    </div>
  </div>
</div>
<div class="page-section">
  <div class="container">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Subject</th>
=      <th scope="col">Message</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
        $a="Select * from contact";
        $query=mysqli_query($db,$a);
        while($fetch=mysqli_fetch_array($query))
        {
            echo "<tr><td>".$fetch['name']."</td><td>".$fetch['email']."</td><td>".$fetch['subject']."</td><td>".$fetch['message']."</td></tr>";
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