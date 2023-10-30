<?php include 'connect.php';
if(isset($_POST['proses'])){
    $nama_client=$_POST['nama'];
    $alamat_client=$_POST['alamat'];
    $whatsapp_client=$_POST['whatsapp'];
    $jenis_const_client=$_POST['jenis_const'];
    $kebutuhan_client=$_POST['kebutuhan'];

    $insert_query=mysqli_query($conn, "insert into `client`  ( `nama`, `alamat`, `whatsapp`, `jenis const`, `kebutuhan`) values
    ('$nama_client', '$alamat_client', '$whatsapp_client', '$jenis_const_client', '$kebutuhan_client')") or die ("insert query falied");
    // if($insert_query){
    //     // move_uploaded_file($product_image_temp_name,$product_image_folder);
    //     $display_message= "Product inserted successful";
    // }else {
    //     $display_message= "There is some error inserting the product";
    // }
}?>
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
  <?php include 'header.php' ?>

  <div class="container">
  <section>
        <h3 class="heading">chekout</h3>
        <form action="" class="add_product" method="POST" enctype="multipart/form-data">
            <input type="text" name="nama" placeholder="Enter Customer Name" class="input_fields" required>
            <input type="text" name="alamat" min="0" placeholder="Enter Alamat" class="input_fields" required>
            <input type="text" name="whatsapp" placeholder="Enter Customer Number" class="input_fields" required>
            <input type="text" name="jenis_const" placeholder="Enter Jenis Const" class="input_fields" required>
            <input type="text" name="kebutuhan" placeholder="Enter kebutuhan" class="input_fields" required>
            <input type="submit" name="proses" class="submit_btn" value="simpan">
           
        </form>
    </section>

    <div class="container">
        <section class="display_product">

            <!-- php code -->
              <?php
                    // $display_product=mysqli_query($conn, "select * from `product`");
                    $display_product=mysqli_query($conn, "select * from `cart`");
                    $num=1;
                    if(mysqli_num_rows($display_product)>0){
                     echo" <table>
                        <thead>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>QTY</th>
                    <th>Total</th
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
</div>
  </div>
                    

</body>
</html>