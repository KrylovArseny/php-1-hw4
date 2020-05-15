
    <?php foreach ($files as $image): ?>
        <a href="./img/<?=$image['path']?>" target="_blank">
            <img  src="./img/small/<?=$image['path']?>" alt="">
        </a>
    <?php endforeach;?>


<?php
var_dump($files);