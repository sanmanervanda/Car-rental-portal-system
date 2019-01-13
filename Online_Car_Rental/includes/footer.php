<?php
if(isset($_POST['emailsubscibe']))
{
$subscriberemail=$_POST['subscriberemail'];
$sql ="SELECT SubscriberEmail FROM tblsubscribers WHERE SubscriberEmail=:subscriberemail";
$query= $dbh -> prepare($sql);
$query-> bindParam(':subscriberemail', $subscriberemail, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<script>alert('Already Subscribed.');</script>";
}
else{
$sql="INSERT INTO  tblsubscribers(SubscriberEmail) VALUES(:subscriberemail)";
$query = $dbh->prepare($sql);
$query->bindParam(':subscriberemail',$subscriberemail,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Subscribed successfully.');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}
}
?>

<footer>
  <div class="footer-top">
    <div class="container">
      <div class="row">
      
        <div class="col-md-6">
          <h6>About Us</h6>
          <ul>

        
          <li><a href="aboutus.php">About Us</a></li>
          
            
          
               <li><a href="admin/">Admin Login</a></li>
          </ul>
        </div>
  
        
      </div>
    </div>
  </div>
  
</footer>

<style>
.footer-top {
  background: #222222 none repeat scroll 0 0;
  color: #9d9d9d;
  padding: 80px 0;
}
.footer-top h6 {
  color: #ffffff;
  font-size:15px;
  text-transform:uppercase;
  margin-bottom: 40px;
}
.footer-top ul {
  overflow: hidden;
  padding: 0;
}
.footer-top ul li {
  font-size: 14px;
  line-height: 23px;
  list-style: outside none none;
  margin-bottom: 16px;
  padding-left: 12px;
  position: relative;
}
.footer-top ul li a::after {
 
  font-family: fontawesome;
  left: 0;
  position: absolute;
  vertical-align: middle;
}
.footer-top ul li a {
  color: #fff;
}
</style>