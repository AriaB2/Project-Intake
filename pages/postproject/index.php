<html>
<head>
  <style>
    .margins {
     margin-bottom: 20px;
     margin-left: 10px;
   }
   h1, h2 {
     text-indent: 10px;
   }
 </style>
 <link rel="stylesheet" type="text/css" href="../../metaphor-master/dist/css/metaphor.css">
</head>
<body>
  <?php
  require '../../includes/header.php';
  ?>
  <h1>Post Your Project</h1>
  <hr>
  <h2>Project Details</h2>
  <form action="post.php" method="post" name="mainForm">
    <div>
      <input placeholder="Project Name" class="margins" name="projectName">
    </div>
    <div>
      <input placeholder="Short Description" class="margins" name="shortDescription">
    </div>
    <div>
      <textarea placeholder="Project Details" cols="10" rows="7" style="width: 600px" class="margins" name="projectDetails"></textarea>
    </div>
    <div>
      <input type="radio" name="platform" value="0">Web
      <input type="radio" name="platform" value="1">Mobile
      <input type="radio" name="platform" value="2">Both
      <input type="radio" name="platform" value="3">Other
    </div>
    <h2>Contact Information</h2>
    <div>
      <input placeholder="First Name" class="margins">
    </div>
    <div>
      <input placeholder="Last Name" class="margins">
    </div>
    <div>
      <input placeholder="Phone Number" class="margins">
    </div>
    <div>
      <input placeholder="Email" class="margins">
    </div>
    <button class="btn btn-success margins" href="#">Submit</button>   <button class="btn btn-primary margins">Cancel</button>
  </form>
</body>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="../../metaphor-master/dist/js/metaphor.js"></script>
</html>