<!-- including php logic- connecting to database-->
<?php include 'connect.php'?>
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
    <!-- header -->
    <?php include 'header.php'?>
    <!-- container -->
    <div class="container">
        <section class="display_product">
           
                    <!-- php code -->
                    <?php
                    $display_product=mysqli_query($conn, "select * from `product`");
                    $num=1;
                    if(mysqli_num_rows($display_product)>0){
                     echo" <table>
                        <thead>
                    <th>No</th>
                    <th>Product image</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Action</th>
                    </thead>
                <tbody>";
                        // logic to fetch data

                     while($row=mysqli_fetch_assoc($display_product)){
                    ?>

                    <!-- display table -->
                    
                    <tr>
                        <td><?php echo $num?></td>
                        <td><img src="images/<?php echo $row ['image']?>"alt=<?php echo $row['name']?>></td>
                        <td><?php echo $row['name']?></td>
                        <td>Rp.<?php echo $row['price']?></td>
                        <td>
                            <a href="delete.php?delete=<?php echo $row['id']?>" class="delete_produk_btn" onclick="return confirm ('are you sure you want to delete this product');"><i class="fas fa-trash"></i></a>
                            <a href="update.php?edit=<?php echo $row['id']?>" class="update_produk_btn"><i class="fas fa-edit"></i></a>
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
    </div>
</body>
</html>