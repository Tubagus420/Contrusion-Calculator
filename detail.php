<?php include 'connect.php';?>
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
    <div class="container">
        <section class="display_product">
            <h3>Data Nama Customer</h3>

            <!-- php code -->
              <?php
                    $display_product=mysqli_query($conn, "SELECT * FROM `order`"); 
                    $num=1;
                    if(mysqli_num_rows($display_product)>0){
                     echo" <table>
                        <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Whatsapp</th>
                    <th>Jenis cons</th>
                    <th>kebutuhan</th>
                    </thead>
                <tbody>";
                        // logic to fetch data

                     while($row=mysqli_fetch_array($display_product)){
                    ?>

                    <!-- display table -->
                    
                    <tr>
                        <td><?php echo $num?></td>
                        <td><?php echo $row['nama']?></td>
                        <td><?php echo $row['alamat']?></td>
                        <td><?php echo $row['whatsapp']?></td>
                        <td><?php echo $row['jenis const']?></td>
                        <td><?php echo $row['kebutuhan']?></td>
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
            <br><br><br>

             <!-- php code -->
             <?php
                    $display_product=mysqli_query($conn, "select * from `order`");
                    $num=1;
                    if(mysqli_num_rows($display_product)>0){
                     echo" <table>
                        <thead>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>QTY</th>
                    <th>Total Price</th>
                    </thead>
                <tbody>";
                        // logic to fetch data

                     while($row=mysqli_fetch_assoc($display_product)){
                    ?>

                    <!-- display table -->
                    
                    <tr>
                        <td><?php echo $num?></td>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['quantity']?></td>
                        <td>Rp.<?php echo $subtotal=number_format($row['price']*$row['quantity'])?></td>
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