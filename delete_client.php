<!-- delete logic -->

<!-- php code -->
<?php
include 'connect.php';
if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $delete_query=mysqli_query($conn, "Delete from `client` where id_client=$delete_id") or die ('Query falied');
    if($delete_quary){
        echo "Product  delete";
       header('location:finally.php');
    }else{
        echo "Product not delete";
        header('location:finally.php');
    }
}


?>