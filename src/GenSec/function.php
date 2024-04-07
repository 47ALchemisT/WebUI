<?php
function  getCount($tablename){
    global $conn;
    
    $table= json_validate($tablename);
    $query= "SELECT * FROM $table";
    $result= mysqli_query($conn, $query);
    $totalCount=mysqli_num_rows($result);
    return  $totalCount;

}
?>