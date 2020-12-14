<?php
include 'partials/ptheader.php';
require __DIR__ . '/users/users.php';

if (!isset($_GET['id'])) {
    include "partials/not_found.php";
    exit;
}
$userId = $_GET['id'];

$user = getUserById($userId);
if (!$user) {
    include "partials/not_found.php";
    exit;
}

?>
<body style='background-color:lightblue'>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>View User: <b><?php echo $user['name'] ?></b></h3>
        </div>
        <div class="card-body">
            <a class="btn " href="update.php?id=<?php echo $user['id'] ?>">Update</a>
            <form style="display: inline-block" method="POST" action="delete.php">
                <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
        <table class="table">
            <tbody>
            <tr>
                <th>Name:</th>
                <td><?php echo $user['name'] ?></td>
            </tr>
            <tr>
                <th>Location:</th>
                <td><?php echo $user['location'] ?></td>
            </tr>
            <tr>
                <th>Latitude:</th>
                <td><?php echo $user['lat'] ?></td>
            </tr>
            <tr>
                <th>Longitude:</th>
                <td><?php echo $user['lng'] ?></td>
            </tr>
           
            </tbody>
        </table>
    </div>
</div>


<?php include 'partials/ptfooter.php' ?>
