<?php
// Do not change the following two lines.
$teamURL = dirname($_SERVER['PHP_SELF']) . DIRECTORY_SEPARATOR;
$server_root = dirname($_SERVER['PHP_SELF']);

// You will need to require this file on EVERY php file that uses the database.
// Be sure to use $db->close(); at the end of each php file that includes this!

$dbhost = 'localhost';  // Most likely will not need to be changed
$dbname = '';   // Needs to be changed to your designated table database name
$dbuser = '';   // Needs to be changed to reflect your LAMP server credentials
$dbpass = ''; // Needs to be changed to reflect your LAMP server credentials

// Create connection
$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
// Check connection
if($db->connect_errno > 0) {
    die('Unable to connect to database [' . $db->connect_error . ']');
}
?>

<?php
$boyname =  "";
$girlname = "";
$boynameErr = $girlnameErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["boyname"])) {
      $boynameErr = "Name is required";
      $girlnameErr="Name is required";
      $_POST["girlname"]=NULL;
  } 
  if(!empty($_POST["boyname"]))
  {
    $boyname = test_input($_POST["boyname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$boyname)) {
        $boynameErr = "Only letters and white space allowed"; 
        $girlnameErr="Only letters and white space allowed";
        $_POST["girlname"]=NULL;
    }
  }
  if (empty($_POST["girlname"])) 
     {
         $girlnameErr = "Name is required";
         $boynameErr= "Name is required";
         $_POST["boyname"]=NULL;
  } 
  if (!empty($_POST["girlname"])) {
    $girlname = test_input($_POST["girlname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$girlname)) {
        $girlnameErr = "Only letters and white space allowed"; 
        $boynameErr = "Only letters and white space allowed";
        $_POST["boyname"]=NULL;
    }
  } 
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php
$stmt = $db->prepare("INSERT INTO babyname (girlname, boyname) VALUES (?, ?)");
$stmt->bind_param("ss", $girlname, $boyname);
if(isset($_POST['girlname']))
{ $girlname = $_POST["girlname"];
}
else{$girlname = "";
    }
if(isset($_POST['boyname']))
{ $boyname = $_POST["boyname"];
}
else{$boyname = "";
    }
$stmt->execute();
$stmt->close();
?>



