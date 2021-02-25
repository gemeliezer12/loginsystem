<?php
include "header.php";

if(!isset($id)){
    header("Location: index.php");
}
else{
    ?>
    <main>
        <div class="profile-section container">
            <div class="cover">
            </div>
            <div class="info">
                <div class="picture">
                <img src="uploads/<?php
                    if(empty($data2["pictureProfiles"])){
                        ?>default.png<?php
                    }
                    else{
                        ?><?php echo $data2["pictureProfiles"];
                    }
                    ?>" alt="">
                </div>
                <p class="uid"><?php echo $data2["uidUsers"];?></p>
                <?php
                if(empty($data2["bioProfiles"])){
                    ?><?php
                }
                else{
                    ?>
                    <p class="bio"><?php echo $data2["bioProfiles"];?></p>
                    <?php
                }
                ?>
                
            </div>
        </div>
    </main>
    <?php
}
?>
</body>
</html>