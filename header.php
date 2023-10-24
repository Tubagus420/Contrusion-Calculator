 <!-- header -->
 <header class="header">
        <div class="header_body">
            <a href="index.php" class="logo">Mandala Prima Sakti</a>
            <nav class="navbar">
                <a href="index.php">Add Product</a>
                <a href="view_product.php">View Product</a>
                <a href="product.php">Product</a>
            </nav>
            <!-- select query -->
            <?php
            $select_product=mysqli_query($conn,"select * from `cart`") or die('query failed');
            $row_count=mysqli_num_rows($select_product);
            ?>
            <!--shoping cart icon -->
            <a href="cart.php" class="cart"><i class="fa-solid fa-cart-shopping"></i><span><sup><?php
            echo $row_count ?></sup></span></a>
            <!--<div id="menu-btn" class="fas fa-bars"></div>-->
            <nav class="navbar">
            <a href="admin/logout.php">Logout</a>

            </nav>
        </div>
</header>
