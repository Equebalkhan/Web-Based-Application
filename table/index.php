<?php
include('db.php');
$status = '';
if (!empty($_POST['sports'])){
if (is_array($_POST['sports'])) {
$status = "<h2 >You selected the below sports:</h2><br />";
foreach($_POST['sports'] as $sport_id){
$query = mysqli_query
    (
    $con,
    "SELECT * FROM sports WHERE `sport_id`='$sport_id'"
    );
$row = mysqli_fetch_assoc($query);
$status .= $row['sport_name'] . "<br />";
   } 
  } 
} 
?>
<style>
table td {
    border-bottom: 5px solid #f1f1f1;
}
body{
	background-image:url("bag.jpg");
	background-repeat: no-repeat;
	 height: 100%;
	  background-position: center;
	   background-size: cover;
}
</style>
<form name="form" method="post" action="" align="center" >
<br/><br/><br/><br/>
<label><h2>Select Sports:</h2></label><br />
<table border="3" width="80%" align="center">
<tr>
<?php
$count = 0;
$query = mysqli_query($con,"SELECT * FROM sports");
foreach($query as $row){
 $count++;
?>
<td width="3%">
<input type="checkbox" name="sports[]" 
value="<?php echo $row["sport_id"]; ?>">
</td>
<td width="30%">
<?php echo $row["sport_name"]; ?>
</td>
<?php
if($count == 3) { // three items in a row
        echo '</tr><tr>';
        $count = 0;
    }
} ?>
</tr>
</table>
<br/>
<input type="submit" name="submit" value="Submit">
</form>
 
<br />
<table align="center">
<td>
<b><?php echo $status; ?></b>
</td>
</table>