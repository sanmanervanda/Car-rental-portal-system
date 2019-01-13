<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
// Code for change password	
if(isset($_POST['update']))
{
$vimage=$_FILES["img4"]["name"];
$id=intval($_GET['imgid']);
move_uploaded_file($_FILES["img4"]["tmp_name"],"img/vehicleimages/".$_FILES["img4"]["name"]);
$sql="update tblvehicles set Vimage4=:vimage where id=:id";
$query = $dbh->prepare($sql);
$query->bindParam(':vimage',$vimage,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();

echo '<script language="javascript">';
echo 'alert("Image updated successfully")';
echo '</script>';



}
?>

<!doctype html>
<html >

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	
	
	<title>Car Rental Portal | Admin Update Image 4</title>

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	
	<script src="js/bootstrap.min.js"></script>
	

</head>

<body>
	<?php include('includes/header.php');?>

	<?php include('includes/navbar.php');?>
		
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Vehicle Image 4 </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Vehicle Image 4 Details</div>
									<div class="panel-body">
										<form method="post" class="form-horizontal" enctype="multipart/form-data">
										
											
  	      



<div class="form-group">
												<label class="col-sm-4 control-label">Current Image4</label>
<?php 
$id=intval($_GET['imgid']);
$sql ="SELECT Vimage4 from tblvehicles where tblvehicles.id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

<div class="col-sm-8">
<img src="img/vehicleimages/<?php echo htmlentities($result->Vimage4);?>" width="300" height="200" style="border:solid 1px #000">
</div>
<?php }}?>
</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Upload New Image 4<span style="color:red">*</span></label>
												<div class="col-sm-8">
											<input type="file" name="img4" required>
												</div>
											</div>
											<div class="hr-dashed"></div>
											
										
								
											
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								
													<button class="btn btn-primary" name="update" type="submit">Update</button>
												</div>
											</div>

										</form>

									</div>
								</div>
							</div>
							
						</div>
						
					

					</div>
				</div>
				
			
			</div>
		
</body>

</html>
<?php } ?>