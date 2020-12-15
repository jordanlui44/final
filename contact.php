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
$firstname ='';
$lastname ='';
$email='';
$gender='';
$weapon='';
$privacy = '';
$comments ='';
$telerr ='';


$firstnameer ='';
$lastnameer='';
$emailer='';
$genderer='';
$weaponer='';
$privacyer = '';
$commentser ='';
$telerr ='';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

if(empty($_POST['firstname'])){
    $firstnameer = 'Please fill out your name';
} else {
$firstname = $_POST['firstname'];    
}
if(empty($_POST['lastname'])){
    $lastnameer = 'Please fill out your last name';
} else {
$lastname = $_POST['lastname'];    
}
if(empty($_POST['email'])){
    $emailer = 'E-mail, Now';
} else {
$email = $_POST['email'];    
}
if(empty($_POST['phone'])){
    $phoneer = 'Phone number now!!';
} else {
$phone = $_POST['phone'];    
}
 
if(empty($_POST['gender'])){
    $genderer = 'Pick your prefered pronoun!';
} else {
$gender = $_POST['gender'];    
}
if ($gender =='male'){
$male = 'checked';
}elseif($gender =='female'){
    $female = 'checked';     
}

if(empty($_POST['weapon'])){
    $weaponer = 'Choose your Weapon';
} else {
$weapon = $_POST['weapon'];    
}
if(empty($_POST['privacy'])){
    $privacyer = 'Please agree with private';
} else {
$privacy = $_POST['privacy'];    
}
if (empty($_POST['comments'])) {
    $commentser ='Comment now';
} else {
$comments = $_POST['comments'];    
}

function myWeapons(){
    $myreturn = '';
    if(!empty($_POST['weapon'])){
    $myreturn = implode(',', $_POST['weapon']);
    } return $myreturn;
}
if(empty($_POST['tel'])) {  // if empty, type in your number
    $telErr = 'Your phone number please!';
    } elseif(array_key_exists('tel', $_POST)){
    if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $_POST['tel']))
    { // if you are not typing the requested format of xxx-xxx-xxxx, display Invalid format
    $telerr = 'Invalid format!';
    } else{
    $tel = $_POST['tel'];
    }
    }

if(isset($_POST['firstname'],
$_POST['lastname'],
$_POST['gender'],
$_POST['weapon'],
$_POST['comments'],
$_POST['tel'],
$_POST['privacy'])){
$to='jordanlui44@gmail.com';
$subject ='email' .date('m/d/y');
$body =''.$firstname.' has completed the form. '.PHP_EOL.''; 
$body .='we will send you an email to confirm:'.$email.' '.PHP_EOL.'';
$body .='Yer weapons:'.myWeapons().' '.PHP_EOL.'';
$body .='They are of: '.$gender.' identity. '.PHP_EOL.'';
$body .='Comments:'.$comments.' '.PHP_EOL.''; 
$body .='Phone number:'.$tel.' '.PHP_EOL.'';
$headers = array('From'
=> 'no-reply@jluicalculator.com',
'Reply-to' => ''.$email.''); 


mail($to, $subject, $body);
header('location: thx.php');  
}
}

?>




<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title> Emailable Form</title>

<body>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<fieldset>
<!-- We are asking if the post currency was set but no we are asking on more question is the post currency equal to the value? -->

<label>Name</label>
<input type="text" name="firstname" value="<?php 
if(isset($_POST['firstname'])) echo htmlspecialchars($_POST['firstname']);
?>">
<span><?php echo $firstnameer; ?> </span>

<label>Last Name</label>
<input type="text" name="lastname" value="<?php 
if(isset($_POST['lastname'])) echo htmlspecialchars($_POST['lastname']);
?>">
<span><?php echo $lastnameer; ?> </span>
<label>Email</label>
<input type="email" name="email" value="<?php 
if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']);
?>"> <span><?php echo $emailer; ?> </span>
<label>Phone</label>
<input type="tel" name="tel" placeholder="555-420-1337" value="<?php 
if(isset($_POST['tel'])) echo htmlspecialchars($_POST['tel']);
?>"> <span><?php echo $telerr; ?> </span>


<label> What is your Gender </label>
<ul>
<li><input type ="radio" name="gender" value="male"
<?php if(isset($_POST['gender']) && $_POST ['gender'] == 'male') echo 'checked="checked"' ;?>
>Male</li>
<li><input type ="radio" name="gender" value="female"
<?php if(isset($_POST['gender']) && $_POST ['gender'] == 'female') echo 'checked="checked"' ;?>
>Female</li>
</ul>
<span><?php echo $genderer; ?> </span>
<label> Swing that Weapon </label>
<ul>

<li><input type ="checkbox" name="weapon[]" value="Choppa"
<?php if(isset($_POST['weapon']) && $_POST ['weapon'] == 'Choppa') echo 'checked="checked"' ;?>
>Choppa</li>
<li><input type ="checkbox" name="weapon[]" value="Spear"
<?php if(isset($_POST['weapon']) && $_POST ['weapon'] == 'Spear') echo 'checked="checked"' ;?>
>Spear</li>
<li><input type ="checkbox" name="weapon[]" value="Stick"
<?php if(isset($_POST['weapon']) && $_POST ['weapon'] == 'Stick') echo 'checked="checked"' ;?>
>Stick</li>
<li><input type ="checkbox" name="weapon[]" value="Sword"
<?php if(isset($_POST['weapon']) && $_POST ['weapon'] == 'Sword') echo 'checked="checked"' ;?>
>Sword</li>
</ul>
<span><?php echo $weaponer; ?> </span>
<label>Comments</label>
<textarea name="comments">
<?php 
if(isset($_POST['comments'])) echo htmlspecialchars($_POST['comments']);
?>
</textarea>
<span><?php echo $commentser; ?> </span>

<input type="radio" name="privacy" value="<?php 
if(isset($_POST['privacy'])) echo htmlspecialchar($_POST['privacy']);?>" >Privacy or no?
<span><?php echo $privacyer; ?> </span>
<input type ="submit" name="Convert it">
<p><a href ="">Reset</a></p>
</fieldset>



</form>

</body>
</html>