<?php
// include
// include_once
// require_once
// require
require_once 'koneksi.php';

$query = mysqli_query($koneksi, "SELECT r.name AS role_name, u.* FROM users u LEFT JOIN roles r ON r.id = u.role_id WHERE deleted_at IS NULL ORDER BY u.id DESC");
$users = mysqli_fetch_all($query, MYSQLI_ASSOC);

// disini parameter delete
// $_GET
// isset, empty
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "UPDATE users SET deleted_at=now() WHERE id = '$id'");

    // redirect
    header("location:user.php?hapus=berhasil");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
</head>

<body>
    <h1>Data User</h1>
    <div align="right">
        <a href="tambah-user.php">Tambah</a>
        <a href="user-restore.php">Restore</a>
    </div>
    <br>
    <table class="table" border="1" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $key => $value): ?>
                <tr>
                    <td><?php echo $key += 1 ?></td>
                    <td><?php echo $value['name'] ?></td>
                    <td><?php echo $value['email'] ?></td>
                    <td><?php echo $value['role_name'] ?></td>
                    <td>
                        <a href="tambah-user.php?edit=<?php echo $value['id'] ?>">
                            Edit
                        </a>|
                        <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"
                            href="user.php?delete=<?php echo $value['id'] ?>">
                            Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>