<?php
//person view page
include('config.php');

if(isset($_GET['id'])) {
    $id = (int)$_GET['id'];
} else {
    header('Location:team.php');
}

$sql = 'SELECT * FROM Teams WHERE TeamID ='.$id.'';

$iconn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
//data is extracted

$result = mysqli_query($iconn,$sql) 
or die(myerror(__FILE__,__LINE__,mysqli_connect_error($iconn)));

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
     $FirstName = stripslashes($row['TeamName']);
     $LastName = stripslashes($row['TeamTown']);  
     $Style = stripslashes($row['TeamRace']);
     $Feedback = '';      
    } 
} else {
    $Feedback = 'No teams...'
}

include('includes/header.php'); ?>
<main>
<h2>Welcome to <?php echo $FirstName;?>'s Page</h2>
<?php if($Feedback =='') {
    echo '<ul>';
    echo '<li><b>First Name:</b> '.$TeamName.' <li>';
    echo '<li><b>Last Name:</b> '.$TeamTown.' <li>';
    echo '<li><b>Style:</b> '.$TeamRace.' <li>';
    echo '<p><a href="team.php">Go back to the person page!</p>';   

} else {

 echo $Feedback;
 
}
?>
</main>
<aside>
<?php
if($Feedback == ''){
    echo '<img src="uploads/person'.$id.'.png" alt="'$FirstName.' ">';
} else{
    echo $Feedback;
}
@mysqli_free_result($result);

// close connection?

@mysqli_close($iconn);
?>
</aside>
<?php
include('includes/footer.php');
?>