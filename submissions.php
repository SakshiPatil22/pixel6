<?php
error_reporting(0);

$host="localhost";
$user="root";
$pass="";
$dbname="pixel6";

$conn=mysqli_connect($host,$user,$pass,$dbname);
if(!$conn)
{
  die('Could Not Connect'.mysqli_connect_error());
}
else
{
  echo "<script>
  alert('Database Connected');
  </script>";
}
 session_start();
$no1=rand(1,10);
$no2=rand(1,10);
$number1=$_GET["no1"];
$number2=$_GET["no2"];
$total= $number1 + $number2;
$userans=$_GET["userans"];

 
 if(isset($_POST["submit"]))
 {
   
  if($total==$userans)
  {
    $sql="insert into submissions(name,cat,img,desc1,lex,userans)values('".$_POST['name']."','".$_POST['cat']."','".$_POST['img']."','".$_POST['desc1']."','".$_POST['lex']."','".$_POST['userans']."')";
     if (mysqli_query($conn,$sql))
     {
      echo "<script>
                    alert('Record Inserted');
                    window.location.href='submissions.php';

                </script>";
    
    }
    else{
      echo mysqli_error($conn);
    }
    }
    }

?>

<!Doctype html>
<html>
<head>
  <title>Pixel6 Assignment</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<form action="animals.php" method="post" enctype="multipart/form-data">
<center>
 <h2>Add Animal Information here</h2>
 </center>
 <div class="row">
 <div class="col-sm-4"></div>
 <div class="col-sm-4">
 <label>Name</label>
 <input type="text" name="name" id="name" placeholder="Enter Animal Name" class="form-control" required="">
 </div>
</div>
 <div class="row">
 <div class="col-sm-4"></div>
 <div class="col-sm-4">
 <label>Category</label>
 <select name="cat" class="form-control" required="" id="cat"> 
 <option value="">Select Category</option>
  <option value="Omnivores">Omnivores</option>
  <option value="Harnivores">Herbivores</option>
  <option value="Carnivores">Carnivores</option>

 </select>

 </div>
</div>
<div class="row">
 <div class="col-sm-4"></div>
 <div class="col-sm-4">
 <label>Image</label>
 <input type="file" accept="image/*" / class="form-control" name="img" required="">
 </div>
</div>
<div class="row">
 <div class="col-sm-4"></div>
 <div class="col-sm-4">
 <label>Description</label>
 <textarea name="desc1" class="form-control" id="desc1" placeholder="Enter Description" required=""></textarea>
 </div>
</div>
<div class="row">
 <div class="col-sm-4"></div>
 <div class="col-sm-4">
 <label>Life Expectancy</label>
 <select name="lex" class="form-control" required="" id="lex"> 
 <option value="">Select here</option>
  <option value="0-1 years">0-1 years</option>
  <option value="1-5 years">1-5 years</option>
  <option value="5-10 years">5-10 years</option>
  <option value="10 + years">10 + years</option>

 </select>

 </div>
</div>
<div class="row">
 <div class="col-sm-4"></div>
 <div class="col-sm-4">
 <label>Captcha <?php echo $no1."+".$no2; ?>
      
 </label>
  <input type="text" name="userans" id="userans" placeholder="Enter sum of above two numbers" class="form-control" required="">
 
 </div>
</div><br>

<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-4">
        <input type="Submit"  name="submit" class="btn btn-primary" value="Submit">
      </div>
</div>
</form>
</body>
</html>