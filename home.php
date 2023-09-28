<?php
session_start();
?>

<h1> WELCOME </h1>
<?php echo $_SESSION['name']; ?>
<?php echo $_SESSION['message']; ?>