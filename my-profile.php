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
                
                <img src="uploads/<?php
                if(empty($data2["coverProfiles"])){
                    ?>default.png<?php
                }
                else{
                    echo $data2["pictureProfiles"];
                }
                ?>" alt="" class="picture">
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