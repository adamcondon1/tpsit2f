<?php
include 'partials/ptheader.php';
require __DIR__ . '/users/users.php';


$user = [
    'id' => '',
    'name' => '',
    'location' => '',
    'lat' => '',
    'lng' => '',
    
];

$errors = [
    'name' => "",
    'location' => "",
    'lat' => "",
    'lng' => "",
];
$isValid = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = array_merge($user, $_POST);

    $isValid = validateUser($user, $errors);

    if ($isValid) {
        $user = createUser($_POST);

        header("Location: api.php");
    }
}

?>

<?php include '_form.php' ?>

