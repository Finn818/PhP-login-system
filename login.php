<?php
    include_once 'header.php';
?>


    <section class="signup-form">
        <h2>Log In</h2>
        <div class="signup-form-form">
            <form action="login.inc.php" method="post">
                <input type="text" name="name" placeholder="Username/Email...">
                <input type="password" name="pwd" placeholder="Password...">
                <button type="submit" name="submit">LOG IN</button>
            </form>
        </div>

        <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields!</p>"
        }
        else if ($_GET["error"] == "wronglogin"){
            echo "<p>inncorrect login</p>"
        }
        
    } 
    ?>

    </section>

    

    <?php
    include_once 'footer.php';
    ?>

