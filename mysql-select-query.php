<?php
/*
Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password)
*/
$link = mysqli_connect("localhost", "root", "aditya337", "PDO");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT UID FROM user_details";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        /*echo "<table>";
            echo "<tr>";
                echo "<th>person_id</th>";
                echo "<th>first_name</th>";
                echo "<th>last_name</th>";
                echo "<th>email_address</th>";
            echo "</tr>";*/
            echo "<select>";
            echo "<option>select the UID</option>";
        while($row = mysqli_fetch_array($result)){
            /*echo "<tr>";
                echo "<td>" . $row['p_id'] . "</td>";
                echo "<td>" . $row['FirstName'] . "</td>";
                echo "<td>" . $row['LastName'] . "</td>";
                echo "<td>" . $row['Class'] . "</td>";
            echo "</tr>";*/
            	echo "<option>".$row['UID']."</option>";
            
        }
        echo "</select>";
        
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>