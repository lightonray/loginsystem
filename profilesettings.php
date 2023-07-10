<?php
    include_once "./header.php";
    include './classes.php/dbh.classes.php';
    include './classes.php/profileinfo.classes.php';
    include './classes.php/profileinfo-view.php';
    $profile = new ProfileInfoView();
?>
    <section style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div class="profile-settings">
        <h3 style="text-align: center;">PROFILE SETTINGS</h3>
        <p style="text-align: center;">Change your about section here!</p>
        <form action="./includes.php/profileinfo.inc.php" method="POST">
        <input type="text" name="title" placeholder="Title name..." value="<?php $profile->fetchTitle($_SESSION["user_id"])?>">
        <input type="text" name="intro" placeholder="Profile intro..." value="<?php $profile->fetchIntro($_SESSION["user_id"])?>">
        <div style="text-align: center;">
            <textarea name="about" rows="10" cols="50" placeholder="Profile about section...">
<?php $profile->fetchAbout($_SESSION["user_id"])?>
            </textarea>
        </div>
        <br><br>
        <button type="submit" name="submit">SAVE</button>
        </form>
    </div>
    </section>
</div>
</body>
</html> 