<?php

use app\core\Application;
?>
<!-- Menu and search -->
<div class="main">
    <div class="topbar">
        <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
        </div>
        <div class="search">
            <label>
                <input type="text" placeholder="Search here">
                <ion-icon name="search-outline"></ion-icon>
            </label>
        </div>
        <h6 class="user-name">
            <?php
            $username = strtoupper(Application::$app->technician->{'fname'}) . ' ' . strtoupper(Application::$app->technician->{'lname'});
            echo $username;
            ?>
        </h6>
        <div class="user">
            <img src="<?php echo Application::$app->technician->{'profile_picture'} ?>" alt="Profile Pic">
        </div>
    </div>