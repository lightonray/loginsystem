<?php
    include_once "./header.php";
    
    include './classes.php/dbh.classes.php';
    include './classes.php/profileinfo.classes.php';
    include './classes.php/profileinfo.contr.classes.php';
    include './classes.php/profileinfo-view.php';
    $profile = new ProfileInfoView();
?>
<div class="profile-container">
 <h1>My Profile</h1>
    <div class="profile-info">
    <p><strong>Name: </strong><?php $profile->fetchTitle($_SESSION["user_id"])?></p>
    <p><strong>Short Description: </strong> <?php $profile->fetchIntro($_SESSION["user_id"])?></p>
    <p><strong>About: </strong> <?php $profile->fetchAbout($_SESSION["user_id"])?></p>
    <a href="profilesettings.php" class="profile-link">Profile Settings</a>
    </div>
</div>
</body>
</html> 