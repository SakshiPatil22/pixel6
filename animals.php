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


if(isset($_GET["search"]))
{
  $filtervalues = $_GET['search'];
  $query ="select id,name,cat,img,desc1,lex from submissions where CONCAT(id,name,cat,img,desc1,lex)LIKE '%$filtervalues%' ";
  $query_run = mysqli_query($conn,$query);

  if(mysqli_num_rows($query_run)>0)
  {
     foreach($query_run as $items)
     {
       echo '  <tr>
      <td>'.$row['id'].'</td>
      <td>'.$row['name'].'</td>
      <td>'.$row['cat'].'</td>
      <td>'.$row['img'].'</td>
      <td>'.$row['desc1'].'</td>
      <td>'.$row['lex'].'</td>
          </tr>';

     }
  }
  else
  {
    ?>
    <tr>
      
      <td colspan="6">No Record Found</td>

    </tr>

    <?php
  }
}



?>



<!DOCTYPE html>
<html>
<head>
	<title>Animals Information</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style>
@import url("https://fonts.googleapis.com/css?family=Muli&display=swap");
	.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}
* {
  box-sizing: border-box;
}

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}



  h1{
    font-size: 20px;
    margin: 0;
  }
  p{
    color: rgba(247,131,131,0.8);
    letter-spacing: 2px;
    margin: 0;
  }


	#animal {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 95%;
  margin-left: 40px;
}

#animal td, #animal th {
  border: 1px solid #ddd;
  padding: 8px;
}

#animal tr:nth-child(even){background-color: #f2f2f2;}

#animal tr:hover {background-color: #ddd;}

#animal th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #000066;
  color: white;
}
</style>

<body>
<form action="animals.php" method="POST">
 <center><h1>Animal Records</h1></center>
 <div class="row">
<div class="col=sm-2"></div>
<div class="col-sm-3">
<p>This page was viwed</p>
  <h1 id="count">0</h1>
  <p>times</p>
  <script>
    const countE1= document.getElementById("count");
    countvisits();
    function countvisits(){
      fetch('https://api.countapi.xyz/update/laptop/mouse/?amount=1')
      .then((res)=> res.json())
      .then((res)=>{
        countE1.innerHTML=res.value;

      });
    }


  </script>
  </div>
  </div>

 <form class="example" action="/animals.php" style="margin:auto;max-width:300px">
  <center>
    <input type="text" value="<?php if(isset($_GET['search'])) {echo $_GET['search'];} ?>" placeholder="Search.." name="search">
  <button type="submit" class="btn btn-primary" style="height:25px; width:60px;">Search</button>
  </center>
</form>
        <table id="animal">
 <tr>  
        <th>Sr.No</th>  
        <th>Name</th>  
        <th>Category</th> 
        <th>Image</th>
        <th>Description</th> 
        <th>Life Expectancy</th> 
        
    </tr> 
    <?php
    $sql= "Select * from submissions ";
  	$retval=mysqli_query($conn,$sql);


   if(mysqli_num_rows($retval)>0)
   {
      while ($row=mysqli_fetch_assoc($retval))
      {


  echo '  <tr>
      <td>'.$row['id'].'</td>
    	<td>'.$row['name'].'</td>
    	<td>'.$row['cat'].'</td>
    	<td>'.$row['img'].'</td>
    	<td>'.$row['desc1'].'</td>
    	<td>'.$row['lex'].'</td>
    	    </tr>';


      }
 }else
 {
 	echo"Record Not Found";
 }
    ?> 


    
</table>

</form>
</body>
</html>