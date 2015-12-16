<h1>Статьи</h1>
<div class="line" style="background-color:#5BC1B5"></div>
<br>
<div style="background-image: url(/images/dental-care2.jpg);background-repeat: no-repeat; background-position: top right;height:290px;">
<ul>
    <?php
    foreach($dataProvider as $p){
        echo '<li><a href="http://'.getenv("HTTP_HOST").'/text/'.$p->id.'">'.$p->title.'</a></li>
        ';
    }
    ?>
</ul>
</div>