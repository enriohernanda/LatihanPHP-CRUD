<?php
$selectCategories = mysqli_query($koneksi, "SELECT * FROM categories");
$categories = mysqli_fetch_all($selectCategories, MYSQLI_ASSOC);
$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$s_product = mysqli_query($koneksi, "SELECT * FROM products WHERE id = '$id'");
$p = mysqli_fetch_assoc($s_product);

if (isset($_POST['simpan'])) {
    $c_id = $_POST['category_id'];
    $p_name = $_POST['product_name'];
    $p_price = $_POST['product_price'];
    $p_description = $_POST['product_description'];
    $p_photo = $_FILES['product_photo'];

    $filePath = "assets/uploads/" . time() . "-" . $p_photo['name'];
    move_uploaded_file($p_photo['tmp_name'], $filePath);
    $insertProduct = mysqli_query($koneksi, "INSERT INTO products(category_id, product_name, product_price, product_description, product_photo) VALUES ('$c_id', '$p_name', '$p_price', '$p_description', '$filePath')");
    if ($insertProduct) {
        header("location:?page=product");
    }
}

if (isset($_POST['update'])) {
}
?>

<body>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Product</h3>
                </div>
                <div class="card-body mt-3">
                    <form action="" method="post" enctype="multipart/form-data">
                        <label for="" class="form-label">Category Name</label><br>
                        <select class="form-select w-50" name="category_id" required>
                            <option value="">--Select Category--</option>
                            <?php
                            foreach ($categories as $c) {
                            ?>
                                <option value="<?= $c['id'] ?>">
                                    <?= $c['category_name'] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                        <label for="" class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="product_name"
                            value="<?php echo $p ? $p['product_name'] : '' ?>" required>
                        <label for="" class="form-label">Photo</label>
                        <br>
                        <?php
                        if ($p) {
                            echo "<img class='rounded' src=" . $p['product_photo'] . " width='115'>";
                        }
                        ?>
                        <input type="file" class="form-control mt-3" name="product_photo" required>
                        <label for="" class="form-label">Price</label>
                        <input type="number" class="form-control" name="product_price"
                            value="<?php echo $p ? $p['product_price'] : '' ?>" required>
                        <label for="" class="form-label">Description</label>
                        <textarea class="form-control" name="product_description" required cols="30"
                            rows="5"><?php echo $p['product_description'] ?></textarea>
                        <button type="submit" name="<?php echo isset($_GET['edit']) ? 'update' : 'simpan' ?>"
                            class="btn btn-primary mt-2"><?php echo isset($_GET['edit']) ? 'Edit' : 'Add' ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>