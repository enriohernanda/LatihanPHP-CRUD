<?php
require_once 'koneksi.php';

//isset: tidak kosong
$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id'");
$rowEdit = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['update'])) {
    //$_POST ambil simbol inputan
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($password) {
        $query = mysqli_query($koneksi, "UPDATE users SET name='$name', email='$email', password='$password' WHERE id='$id'");
    } else {
        $query = mysqli_query($koneksi, "UPDATE users SET name='$name', email='$email' WHERE id='$id'");
    }
    if ($query) {
        header("location:user.php?ubah=berhasil");
    }
}

if (isset($_POST["simpan"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "INSERT INTO users (name, email, password) VALUES('$name', '$email', '$password')");

    if ($query) {
        header("location:user.php?tambah=berhasil");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
</head>

<body>
    <h3>Edit</h3>
    <form action="" method="post">
        <div class="form-grup">
            <label for="">Name</label>
            <input type="text" name="name" placeholder="Enter Your Name" required
                value="<?php echo $rowEdit['name'] ?? '' ?>">
        </div>
        <br>
        <div class="form-grup">
            <label for="">Email</label>
            <input type="email" name="email" class="" placeholder="Enter Your Email" required
                value="<?php echo $rowEdit['email'] ?? '' ?>">
        </div>
        <br>
        <div class="form-group">
            <label for="">Password * <small>Kosongkan jika tidak ingin mengubah</small></label>
            <br>
            <input type="password" name="password" placeholder="Enter Your Password">
        </div>
        <br>
        <div class="form-group">
            <button type="submit" name="<?php echo ($id) ? 'update' : 'simpan' ?>">
                <?php echo ($id) ? "Simpan Perubahan" : "Simpan" ?>
            </button>
        </div>
    </form>
</body>

</html>