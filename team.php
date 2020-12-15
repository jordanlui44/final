<?php session_start();
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
?>   
<?php
include('config.php');
include('includes/header2.php');
//database is connected

$sql = 'SELECT * FROM Teams';
$iconn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
//data is extracted

$result = mysqli_query($iconn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_connect_error($iconn)));

//do we have more than 0 rows//

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        //this array will display the contents or your row
     echo'<ul>'; //use a similar a href value that we used for our switch
     echo '<li class="bold">For more information <a href="team-view.php?id='.$row['TeamID'].'">'.$row['TeamName'].' </a></li>';
     echo '<li>'.$row['TeamName'].'</li>';
     echo '<li>'.$row['TeamRace'].'</li>';
     echo '</ul>';
    } //closed while
} else { //what if there are no peeps
echo 'No one is here';
} //closed else

@mysqli_free_result($result);

// close connection?

@mysqli_close($iconn);
include('includes/footer.php');