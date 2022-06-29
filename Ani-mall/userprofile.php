<?php require "config.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background: black;
    }

    .form-control:focus {
      box-shadow: none;
      border-color: #BA68C8
    }

    .profile-button {
      background: rgb(99, 39, 120);
      box-shadow: none;
      border: none
    }

    .profile-button:hover {
      background: #682773
    }

    .profile-button:focus {
      background: #682773;
      box-shadow: none
    }

    .profile-button:active {
      background: #682773;
      box-shadow: none
    }

    .back:hover {
      color: #682773;
      cursor: pointer
    }

    .labels {
      font-size: 11px
    }

    .add-experience:hover {
      background: #BA68C8;
      color: #fff;
      cursor: pointer;
      border: solid 1px #BA68C8
    }
  </style>
</head>
<?php  $sql = "SELECT * FROM users WHERE user_id=33";
     $staa=$db->query($sql);
     $show = $staa->fetchall(); ?>
<body>
<?php foreach($show as $value): ?>
  <div class="container rounded bg-white mt-5 mb-5 ">
    <div class="row">
      <div class="col-md-3 border-right">
        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="./img/test.png">
        <span class="font-weight-bold">Name : <?php echo $value['user_name'] ?></span>
        <span class="text-black-50">Email : <?php echo $value['user_email'] ?></span>
        <span class="text-black-50">Mobile : <?php echo $value['user_mobile'] ?></span>
        <span class="text-black-50">Location : <?php echo $value['user_location'] ?></span>
        <span> </span>
        </div> <?php  endforeach; ?>
        <div class="mt-5 text-center"><a href="userprofile.php?order"><button class="btn btn-primary profile-button" type="button"> My Orders</button></a></div>
        <div class="mt-5 text-center"><a href="userprofile.php?edit"><button class="btn btn-primary profile-button" type="button"> <i class="fas fa-edit"></i>Edit Profile</button></a></div>
      </div>
     <?php 
    //  $edit=$_GET['edit'];
     
     
    
if(isset($_GET['edit'])): 
     foreach($show as $value):
     ?>



     <div class="col-md-5 border-right">
        <div class="p-3 py-5">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-right">Profile Settings</h4>
          </div>
          <div class="row mt-2">
            <form action="" method="post" >
            <div class="col-md-12">
              <label class="labels">Name</label>
              <input type="text" class="form-control" placeholder="first name"  name="name"  value="<?php echo $value['user_name'] ?>">
            </div>
           
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <label class="labels">PhoneNumber</label>
            <input type="text" class="form-control" name="phone" placeholder="enter phone number" value="<?php echo $value['user_mobile'] ;?>">
          </div>
                
            <div class="col-md-12">
              <label class="labels">Email ID</label>
              <input type="text" class="form-control" name="email" placeholder="enter email id" value="<?php echo $value['user_email'] ?>">
            </div>
                <div class="col-md-12">
                  <label class="labels">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="enter Password" value="<?php echo $value['user_password'] ?>">
                </div>
                <div class="col-md-12">
                  <label class="labels">Image</label>
                  <input type="file" class="form-control" name="image" accept="image/png , image/jpeg , image/jpg" placeholder="enter email id" value="<?php //echo $value['user_password'] ?>">
                </div>
         <div class="col-md-12">
                  <label class="labels">Location</label>
                  <input type="text" class="form-control" name="location" placeholder="country" value="<?php echo $value['user_location']; ?>">
                </div>
            <div class="col-md-12">
              <label class="labels">Address</label>
              <input type="text" class="form-control" name="address" placeholder="enter address" value="<?php echo $value['user_address'] ;?>">
            </div>
          <div class="mt-5 text-center">
            <input type="submit" value="Save Profile" name="submit" class="btn btn-primary profile-button">
            <!-- <button  type="button"></button> -->
          </div>
        </div>
</form>
        </div>
<?php 
if(isset($_POST['submit'])):
$name = $_POST['name'];
$phone=$_POST['phone'];
$location=$_POST['location'];
$address=$_POST['address'];
$email=$_POST['email'];
$password=$_POST['password'];
$image=$_FILES['image']['name'];
$image_tmp_name=$_FILES['image']['tmp_name'];
$image_folder='img/'.$image;
// move_uploaded_file($product_image_tmp_name,$product_image_folder);

$up="UPDATE `users`
 SET 
 `user_name`=?
,`user_email`=?
,`user_password`=?
,`user_mobile`=?
,`user_location`=?
,`user_address`=? WHERE user_id=33";

$statment=$db->prepare($up);
$statment->execute([$name,$email,$password,$phone,$location,$address]);

 
endif;
 ?>



 <!-- ********************************************************************************************************* -->
      </div> <?php  endforeach; endif;
       $sqll = "SELECT * FROM orders WHERE order_user_id=33";
       $staaa=$db->query($sqll);
       $showw = $staaa->fetchall();
  
       
      
      
      ?>
      <?php if(isset($_GET['order'])): 
        
        ?> 

      <div class="col-md-8  border-right">
        <div class="p-3 py-5">
        <table class="table">
    <thead>
      <tr>
        <th>order details</th>
        <th>Order Date</th>
        
      </tr>
    </thead>
    <tbody>
      <tr><?php foreach($showw as $value): ?>
        <td><?php echo $value['order_details'] ?></td>
        <td><?php echo $value['order_date'] ?></td>
        
      </tr>
      <?php endforeach; ?>

    </tbody>
  </table>
        </div>
      </div>
      <?php endif; ?>
      <?php if(isset($_GET['profile'])): ?> 
        
        <div class="col-md-5 border-right">
        <div class="p-3 py-5">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-right">Profile Settings</h4>
          </div>
          <div class="row mt-2">
            <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control"
                placeholder="first name" value="<?php echo $value['user_name'] ?>"></div>
           
          </div>
          <div class="row mt-3">
            <div class="col-md-12"><label class="labels">PhoneNumber</label><input type="text" class="form-control"
                placeholder="enter phone number" value="<?php echo $value['user_mobile'] ;?>"></div>
                <div class="col-md-12"><label class="labels">Country</label><input type="text" class="form-control"
                placeholder="country" value="<?php echo $value['user_location']; ?>"></div>
            <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control"
                placeholder="enter address" value="<?php echo $value['user_address'] ;?>"></div>
            <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control"
                placeholder="enter email id" value="<?php echo $value['user_email'] ?>"></div>
                <div class="col-md-12"><label class="labels">Password</label><input type="password" class="form-control"
                placeholder="enter email id" value="<?php echo $value['user_password'] ?>"></div>
          </div>
         
          <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save
              Profile</button></div>
        </div>
      </div>
<?php endif; ?>
    </div>
  </div>
  </div>
  </div>

</body>

</html>