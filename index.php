<?php
//in order to see this page, a user must have registered and logged in

session_start();
include('config.php'); 

if(!isset($_SESSION['UserName'])){
    $_SESSION['msg'] = 'You must log in first';
    header('Location: login.php');
}

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['UserName']);
    header('Location: login.php');
}    

include('includes/header2.php');

?>

<h1>Welcome!</h1>
<?php
if(isset($_SESSION['success'])) :?>
<div class ="error_success">
<h3>
<?php
echo $_SESSION['success'];
unset($_SESSION['success']);
?>
</h3>
</div>

<?php endif ?>
<div class="error_success">
<?php 
    if(isset($_SESSION['UserName'])) : ?>
    <h3> Welcome,
<?php echo $_SESSION['UserName']; ?>
    </h3>
    <br>
<p><a href="index.php?logout='1'">logout!</p>
    </div>
    <?php endif ?>
<?php include('includes/footer.php');