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
if(isset($_GET['today'])) {
    $today = $_GET['today'];
} else {
    $today = date('l');
}



switch($today){
    case 'Friday' :
    $mon = 'Friday is Orcland Raiders Day!';
    $name = "Orcland Raiders";
    $pic = 'orc.png';
    $alt ='The Orcland Raiders';
    $desc = 'In the 2486-2487 season, the severed Heads found themselves in financial trouble, thanks to corrupt dealing by tribal chieftains and faulty land speculation. They declare bankruptcy but the team itself will be saved when King Ironclaw of Orcland purchases the team and moves them to Orcland. King Ironclaw hires Ogre ex-torturer Cruel-Eye to help get the team ready for strong competition';
    echo "<body bgcolor='green'>";
    echo "<font color='green'>";
    break;
    case 'Saturday' :
    $mon = 'Saturday is Khemri Day!';
    $name ='Sunset Scorpions';
    $pic = 'khemri.png';
    $alt ='The Sunset Scorpions';
    $desc ='Hailing from Capri, Khemri. The Sunset Scorpions show a undeniable agile unseen from their kind of sand-laden bones and dust-ridden knees.';
    echo "<body bgcolor='#E9E944'>";
    echo "<font color='#E9E944'>";
    break;
    case 'Sunday' :
    $mon = 'Sunday is Thrace Day!';
    $name ='Thrace Strikers';
    $pic = 'highelf.png';
    $alt ='Thrace Strikers';
    $desc='Formerly called the white lions, Thrace Strikers are a new team trying to reach greater heights after declaring bankruptancy.';
    echo "<body bgcolor='#C748B6'>";
    echo "<font color='#C748B6'>";
    break;
    case 'Monday' :
    $mon = 'Monday is Lumbria Day!';
    $name ='Down-Under Brawlers';
    $pic = 'lumbra.png';
    $alt ='Down-Under Brawlers';
    $desc = 'Lumbria teams are the most recent of all nations to field Blood Bowl teams. The nation itself was unknown to the world until very recently; the island was until now a legend. Nipponesse sailors spoke of a far off land with strange creatures leaping about and giant bearded men stalking the shores and building pyres';
    echo "<body bgcolor='#B40A9C'>";
    echo "<font color='#B40A9C'>";
    break;
    case 'Tuesday' :
    $mon = 'Tuesday is Human Day!';
    $name ='Sigmar Strafers';
    $pic = 'human.png';
    $alt ='Sigmars Strafers';
    $desc= 'Although Human teams do not have the individual strengths or outstanding abilities available to other races, they do not suffer from any outstanding weakness either. This makes Human teams extremely flexible, equally at home running the ball, passing it, or ignoring it and pounding the opposition into the turf instead!';
    echo "<body bgcolor='#41BDCE'>";
    echo "<font color='#41BDCE'>";
    break;
    case 'Wednesday' :
    $mon = 'Wednesday is Ogre Day!';
    $name ='Blade Edge Gluttons';
    $pic = 'ogre.png';
    $alt = 'The Blade Edge Gluttons';
    $desc = 'Ogre teams have existed since the forming of the NAF and have even had some success such as winning the XV Blood Bowl. However, as any right-minded person will tell you, having more than one Ogre in the same place at the same time is a disaster in the making. The key to an Ogre team is the Snotlings. If they are close enough to jab an Ogre in the leg to remind him that they are playing in a match then you may have the makings of a team.';
    echo "<body bgcolor='brown'>";
    echo "<font color='brown'>";
    break;
    case 'Thursday' :
    $mon = 'Thursday is Chaos Day!';
    $name ='Doomlords';
    $pic = 'chaos.png';
    $alt = 'The Doomlords';
    $desc = 'Chaos teams are not noted for the subtlety or originality of their game play. A simple drive up the centre of the pitch, maiming and injuring as many opposing players as possible, is about the limit of their game plan. They rarely, if ever, worry about such minor considerations like picking up the ball and scoring touchdowns – not while there are any players left alive on the opposing team, anyway.';                
    echo "<body bgcolor='#C55A44'>";
    echo "<font color='#C55A44'>";          
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Switch on!</title>
<script src="https://use.fontawesome.com/6a71565c22.js"></script>
<link rel="stylesheet" href="css/index.css" />
</head>
<body>
<main class="wrapper">
    <header>
      <h1><a href="index.php"> Switch</a></h1>
      <nav>
        <ul> 
        <li><a href="index.php">Home</a></li>
        <li><a href="switch.php">Switch</a></li>
        <li><a href="contact.php">Email</a></li>
        <li><a href="team.php">Database</a></li>
        </ul>
      </nav>
    </header>

<section>
<h1><?php
echo $mon;
?></h1>
<p>This is a Blood Bowl Team reminder, it'll show a Team and it'll describe you what its all about.</p>
<p>Today is <?php echo $today; ?>, which means that we'll be talking about; <?php echo $desc; ?></p>
<ul>
<li><a href="switch.php?today=Saturday">Saturday</a></li>
<li><a href="switch.php?today=Sunday">Sunday</a></li>
<li><a href="switch.php?today=Monday">Monday</a></li>
<li><a href="switch.php?today=Tuesday">Tuesday</a></li>
<li><a href="switch.php?today=Wednesday">Wednesday</a></li>
<li><a href="switch.php?today=Thursday">Thursday</a></li>
</ul>
</section>

<aside>
<h2 class="pageID">Team of the Day</h2>
<p>Since its <?php echo $today; ?>, Today's Team is <?php echo $alt;?>.</p>
 <img src="images/<? echo $pic; ?>" alt="<?php echo $alt; ?>">
</aside>
<footer>
  <small>&copy; (2020)<a href="contactme.php" target="_blank">Jordan Lui</a>, All Rights Reserved ~
  <a href="https://validator.w3.org/check?uri=referer">Valid HTML</a>
  <a href="https://jigsaw.w3.org/css-validator/check?uri=referer">CSS</a></small>
</footer>
</body>
</html>
