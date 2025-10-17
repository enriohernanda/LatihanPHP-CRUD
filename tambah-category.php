<?php
require_once "koneksi.php";

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$selectCategory = mysqli_query($koneksi, "SELECT category_name FROM categories WHERE id = '$id'");
$category = mysqli_fetch_assoc($selectCategory);
// var_dump($category);

if (isset($_POST['simpan'])) {
    $category_name = $_POST['category_name'];
    $Insert = mysqli_query($koneksi, "INSERT INTO categories (category_name) VALUES ('$category_name')");

    header("location:category.php");
}

if (isset($_POST['update'])) {
    $category_name = $_POST['category_name'];
    $update = mysqli_query($koneksi, "UPDATE categories SET category_name='$category_name' WHERE id = $id");

    header('location:category.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1><?= isset($_GET['edit']) ? 'Update' : 'Tambah' ?> Kategori</h1>
    <form action="" method="post">
        <label for="">Category Name</label> <br>
        <input type="text" name="category_name" value="<?php echo $category['category_name'] ?? '' ?>" required>
        <br><br>
        <button type="submit"
            name="<?= isset($_GET['edit']) ? 'update' : 'simpan' ?>"><?= isset($_GET['edit']) ? 'edit' : 'create' ?></button>
    </form>
</body>

</html>