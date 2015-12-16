<h1>Карта сайта</h1>
<div class="line" style="background-color:#5BC1B5"></div>
<br>
<div style="background-image: url(/images/mapsite_bg.gif);background-repeat: no-repeat; background-position: top right;">

    <ul>
        <li class="link2"><a href="/">Главная</a></li>
        <li class="link2"><a href="/about">О себе</a></li>
        <li class="link2"><a href="/sertificate">Сертификаты</a></li>
        <li class="link2"><a href="/work">Мои работы</a></li>
        <li class="link2"><a href="/price">Прайс</a></li>
        <li class="link2"><a href="/articles">Статьи</a>
            <ul>
            <?php
            foreach($listtext as $text){
                ?>
                <li class="link2"><a href="/text/<?=$text->id?>"><?=$text->title?></a></li>
            <?php
                }
            ?>
                </ul></li>
        <li class="link2"><a href="/post">Блог</a></li>
        <li class="link2"><a href="/stock">Акции</a></li>
        <li class="link2"><a href="/coordinate">Контакты</a></li>
    </ul><br>
    <strong>Услуги:</strong>
    <ul>
        <?php
        foreach($listservice as $service){
            ?>
            <li class="link2"><a href="/service/<?=$service->id?>"><?=$service->title?></a></li>
            <?php
        }
        ?>
    </ul>