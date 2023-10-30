<?php include 'connect.php';
// update logic
if(isset($_POST['update_client'])){
    $update_client_id=$_POST['update_client_id'];
    // echo $update_product_id;
    $update_client_name=$_POST['update_client_name'];
    // echo $update_product_name;
    $update_client_alamat=$_POST['update_client_alamat'];
    $update_client_whatsapp=$_POST['update_client_whatsapp'];
    $update_client_jenis_const=$_POST['update_client_jenis_const'];
    $update_client_kebutuhan=$_POST['update_client_kebutuhan'];
   
    // update query
    $update_client=mysqli_query($conn,"Update `client` set 
    `nama`='$update_client_name',`alamat`='$update_client_alamat',`whatsapp`='$update_client_whatsapp',
    `jenis const`='$update_client_jenis_const',`kebutuhan`='$update_client_kebutuhan' where `id_client`=$update_client_id");
    if($update_client){
       header('location:finally.php');
    }else {
        $display_message= "There is some error updating the product";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- css file -->
     <link rel="stylesheet" href="css/style.css">

<!-- font awesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
</head>
<body>
<?php include 'header.php'?>
<?php

if(isset($display_message)){
    echo "<div class='display_message'>
    <span>$display_message</span>
    <i class='fas fa-times' onclick='this.parentElement.style.display=`none`'></i>
</div>";
}

?>
<section class="edit_container">
    <!-- php code -->
    <?php
    if(isset($_GET['edit'])){
        $edit_id=$_GET['edit'];
        // echo $edit_id;
        $edit_query=mysqli_query($conn,"select * from `client` where id_client=$edit_id");
        if(mysqli_num_rows($edit_query)>0){
        $fetch_data=mysqli_fetch_assoc($edit_query);
                // $row=$fetch_data['price'];
                // echo $row;

        
            ?>
<!-- form -->
<form action="" method="post" enctype="multipart/form-data" class="update_product product_container_box">
<input type="hidden" value="<?php echo $fetch_data['id_client']?>" name="update_client_id">
<input type="text" class="input_fields fields" required value="<?php echo $fetch_data['nama']?>" name="update_client_name">
<input type="text" class="input_fields fields" required value="<?php echo $fetch_data['alamat']?>" name="update_client_alamat">
<input type="number" class="input_fields fields" required value="<?php echo $fetch_data['whatsapp']?>" name="update_client_whatsapp">
<input type="text" class="input_fields fields" required value="<?php echo $fetch_data['jenis const']?>" name="update_client_jenis_const">
<input type="text" class="input_fields fields" required value="<?php echo $fetch_data['kebutuhan']?>" name="update_client_kebutuhan">
<div class="btns">
    <input type="submit" class="edit_btn" value="Update " name="update_client">
    <input type="reset" id="close-edit" value="Cancel" class="cancel_btn">
</div>
</form>
            <?php
        }
    }
    
    ?>

</section>
</body>
</html>