<?php
    include_once 'header.php';
    ?>


    <section class="index-intro">
        <?php
    if (isset($_SESSION["useruid"])) {
            echo "<p>Hello There " . $_SEESION["useruid"] . "</p>";
        }
            ?>

        <h1>This Is an Introduction</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum soluta assumenda nam odit cupiditate! Omnis harum reprehenderit magni sequi nesciunt maiores placeat sapiente libero temporibus? Natus error excepturi neque quibusdam.</p>
    </section>

    <section>
        <h2>Some Basic Categories</h2>
        <div class="index-categories-list">
            <div>
                <h3>Fun Stuff</h3>
            </div>
            <div>
                <h3>Serious Stuff</h3>
            </div>
            <div>
                <h3>Exciting Stuff</h3>
            </div>
                <div>
                    <h3>Boring Stuff</h3>
                </div>
            </div>
    </section>


    <?php
    include_once 'footer.php';
    ?>

    </div>

</body>
</html>

<script src="js/script.js"></script>