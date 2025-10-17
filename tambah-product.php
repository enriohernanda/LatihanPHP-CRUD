<?php
require_once "koneksi.php";

$selectCategories = mysqli_query($koneksi, "SELECT * FROM categories");
$categories = mysqli_fetch_all($selectCategories, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Tambah Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="">Category Name</label><br>
        <select name="category_id" required>
            <option value="">--Pilih Kategori--</option>
            <?php
            foreach ($categories as $c) {
            ?>
                <option value="<?= $c['id'] ?>">
                    <?= $c['category_name'] ?>
                </option>
            <?php
            }
            ?>
        </select><br><br>
    </form>
</body>

</html>