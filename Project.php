<?php

session_start();
require_once('db.php');


try{

    $Email = $_SESSION['Email'];
    $UserID = $_SESSION['UserID'];
    $ProjectID = $_GET['ProjectID'];

    //echo $Email.$UserID.$ProjectID;
    $stmt = $db->prepare('SELECT * FROM Projects WHERE Project_ID=:Project_ID');
    $stmt->bindParam(':Project_ID', $_GET['ProjectID']);
    $stmt->execute();
    while ($row = $stmt ->fetch(PDO::FETCH_ASSOC)){
         $ProjectName = $row["ProjectName"];
    }

}
catch (PDOException $e) {
    die('Project Failed! ');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Project</title>
    <script type="text/javascript"
            src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
</head>
<style type="text/css">
    ul {
        list-style-type: none;
    }
</style>

<body>
<h1>PROJECT PAGE</h1>
<a href="profile.php">Back to profile...</a>
<h2>Project Title: <?php echo $ProjectName?> | ID: <?php echo $ProjectID?></h2>
<br /><br />
<h2>TODOs</h2><br />
<?php
$stmt = $db->prepare('SELECT * FROM todo WHERE Project_ID=:Project_ID');
$stmt->bindParam(':Project_ID', $ProjectID);
$stmt->execute();
while ($row = $stmt ->fetch(PDO::FETCH_ASSOC)){
    $Todo =$row["Todo_ID"];
    $Description = $row["Description"];
    ?>
    ID: <?php echo $Todo?> | Description: <?php echo $Description?><br />
    <?php
}
?>
<form action="scripts/addTodo.php?UserID=<?php echo $UserID?>&ProjectID=<?php echo $ProjectID?>" method="post">
    <input type="text" name="add" placeholder="Add a new task" class="input" autocomplete="off">
    <input type="submit" value="Add" class="submit">
</form>
<br /><br />
<h2>Comments</h2><br />
<?php
//to be worked on: search with == project ID
$stmt = $db->prepare('SELECT * FROM COMMENTS');
$stmt->bindParam(':Project_ID', $ProjectID);
$stmt->execute();
while ($row = $stmt ->fetch(PDO::FETCH_ASSOC)){
   //get the comment text, username, etc etc
}
?>
<!-- Need to create page addcomment.php, doesn't exisit. pretty much sql code to insert comment where project ID == -->
<form action="scripts/addComment.php?UserID=<?php echo $UserID?>&ProjectID=<?php echo $ProjectID?>" method="post">
    <input type="text" name="add" placeholder="Add a new comment" class="input" autocomplete="off">
    <input type="submit" value="Add" class="submit">
</form>
</body>

