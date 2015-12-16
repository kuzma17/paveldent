<h1>Акции</h1>
<div class="line" style="background-color:#5BC1B5"></div>
<br>
<div class="stock-index">


    <?php
    foreach($dataProvider as $stock){
        echo '<h1 style="color:#f93636;">'.$stock->title.'</h1>';
        echo $stock->text;
    }
    ?>
</div>
<br>
