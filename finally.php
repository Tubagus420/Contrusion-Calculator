<?php include 'connect.php';
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
    <!-- container -->
    <div class="container1">
        <section class="display_product">
      
    <!-- php code -->
    <?php
                    $display_client=mysqli_query($conn, "select * from `client`");
                    $num=1;
                    if(mysqli_num_rows($display_client)>0){
                     echo" <table>
                        <thead>
                    <th>No</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Whapsapp</th>
                    <th>Const Type</th>
                    <th>necessity</th>
                    <th>action</th>
                    </thead>
                <tbody>";
                        // logic to fetch data

                     while($row=mysqli_fetch_assoc($display_client)){
                    ?>

                    <!-- display table -->
                    
                    <tr>
                        <td><?php echo $num?></td>
                        <td><?php echo $row ['nama']?></td>
                        <td><?php echo $row['alamat']?></td>
                        <td><?php echo $row['whatsapp']?></td>
                        <td><?php echo $row['jenis const']?></td>
                        <td><?php echo $row['kebutuhan']?></td>
                        <td>
                            <a href="delete_client.php?delete=<?php echo $row['id_client']?>" class="delete_produk_btn" onclick="return confirm ('are you sure you want to delete this product');"><i class="fas fa-trash"></i></a>
                            <a href="update_client.php?edit=<?php echo $row['id_client']?>" class="update_produk_btn"><i class="fas fa-edit"></i></a>
                            <a href="detail.php"><i class="fa fa-circle-info"></i></a>
                        </td>

                    </tr>
                    <?php
                    $num++;
                     }
                    }else{
                        echo "<div class='empty_text'>No product Available</div>";
                    }
                       
                        
                    
                    ?>
                    
                </tbody>
            </table>

</section>
</body>
</html>