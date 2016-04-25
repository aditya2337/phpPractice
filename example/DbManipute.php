</p>
<?php
include('db.php');

if(isset($_REQUEST['actionfunction']) && $_REQUEST['actionfunction']!=''){
$actionfunction = $_REQUEST['actionfunction'];

 call_user_func($actionfunction,$_REQUEST,$conn);
}
function saveData($data,$conn){


 $fname = $conn->real_escape_string($data['fname']);
 $lname = $conn->real_escape_string($data['lname']);
 $domain = $conn->real_escape_string($data['domain']);
 $email = $conn->real_escape_string($data['email']);
 $sql = "insert into ajaxtable(firstname,lastname,domain,email) values('$fname','$lname','$domain','$email')";
 if($conn->query($sql)){
 showData($data,$conn);
 }
 else{
 echo "error";
 }

}
function showData($data,$conn){
 $sql = "select * from ajaxtable order by id asc";
 $data = $conn->query($sql);
 $str='<tr class="head"><td>Firstname</td><td>Lastname</td><td>Domain</td><td>Email</td><td></td></tr>';
 if($data->num_rows>0){
 while( $row = $data->fetch_array(MYSQLI_ASSOC)){
 $str.="<tr id='".$row['id']."'><td>".$row['firstname']."</td><td>".$row['lastname']."</td><td>".$row['domain']."</td><td>".$row['email']."</td><td><input type='button' class='ajaxedit' value='Edit'/> <input type='button' class='ajaxdelete' value='Delete'></td></tr>";
 }
 }else{
 $str .= "<td colspan='5'>No Data Available</td>";
 }

echo $str;
}
function updateData($data,$conn){
 $fname = $conn->real_escape_string($data['fname']);
 $lname = $conn->real_escape_string($data['lname']);
 $domain = $conn->real_escape_string($data['domain']);
 $email = $conn->real_escape_string($data['email']);
 $editid = $conn->real_escape_string($data['editid']);
 $sql = "update ajaxtable set firstname='$fname',lastname='$lname',domain='$domain',email='$email' where id=$editid";
 if($conn->query($sql)){
 showData($data,$conn);
 }
 else{
 echo "error";
 }
 }
 function deleteData($data,$conn){
 $delid = $conn->real_escape_string($data['deleteid']);
 $sql = "delete from ajaxtable where id=$delid";
 if($conn->query($sql)){
 showData($data,$conn);
 }
 else{
 echo "error";
 }
 }
?>
<p style="text-align: justify;">