<h1>Сертификаты</h1>
<div class="line" style="background-color:#5BC1B5"></div>
<br>
<div id="thumbnails">
    <?php
    foreach($list as $p){
    ?>
    <a href="/images/<?=$p->image;?>" title=""><img src="/images/<?=$p->image_s;?>"></a>
    <?php } ?>
</div></td>
