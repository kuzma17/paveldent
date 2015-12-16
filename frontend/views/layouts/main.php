<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- Start SiteHeart code -->
    <script>
        (function(){
            var widget_id = 693403;
            _shcp =[{widget_id : widget_id}];
            var lang =(navigator.language || navigator.systemLanguage
            || navigator.userLanguage ||"en")
                .substr(0,2).toLowerCase();
            var url ="widget.siteheart.com/widget/sh/"+ widget_id +"/"+ lang +"/widget.js";
            var hcc = document.createElement("script");
            hcc.type ="text/javascript";
            hcc.async =true;
            hcc.src =("https:"== document.location.protocol ?"https":"http")
                +"://"+ url;
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hcc, s.nextSibling);
        })();
    </script>
    <!-- End SiteHeart code -->

</head>
<body>
<?php $this->beginBody() ?>

<div id="page">

    <div id="head">

        <div class="logo"><img src="/images/logo.jpg"></div>
        <div class="head_center">прием: пн-сб с 08.00 до 20.00</div>
        <div class="head_right">
            <div class="site_icons"><a href="index.php"><img border="0" src="/images/home.gif"></a> <a href="/sitemap"><img border="0" src="/images/sitemap.gif"></a> <a href="/contact"><img border="0" src="/images/mail.gif"></a></div>
            <div class="phone">Запись по тел. +38(067) <span style="word-spacing: -3px;">941 - 67 - 20</span></div>
        </div>
        <div class="clear"></div>
        <div class="line"></div>
        <div class="headimg"></div>
    </div>

    <div class="menu1">
        <?php
        //Block menu kuzma
        $menuItems = [
            ['title'=>'Главная', 'url'=>''],
            ['title'=>'О себе', 'url'=>'about'],
            ['title'=>'Сертификаты', 'url'=>'sertificate'],
            ['title'=>'Мои работы', 'url'=>'worck'],
            ['title'=>'Прайс', 'url'=>'price'],
            ['title'=>'Статьи', 'url'=>'text'],
            ['title'=>'Блог', 'url'=>'post'],
            ['title'=>'Акции', 'url'=>'stock'],
            ['title'=>'Контакты', 'url'=>'coordinate'],
        ];
        echo '<ul class="parent0">';
        foreach($menuItems as $p){
            if($p['url']=='home'){$p['url']='../';}
            echo '<li class="lin0"><a href="/'.$p['url'].'">'.$p['title'].'</a></li>';
        }
        echo '</ul>';
        ?>
    </div>
    <table width="100%">
        <tr>
            <td class="right">
                <?php
                $list_serv = common\models\Service::find()->where(['on' => 1])->all();
                if(count($list_serv) != 0){
                ?>
                <h2>Услуги:</h2>
                <div class="menu2">
                    <ul class="parent0">
                        <?php foreach($list_serv as $p){ ?>
                        <li class="lin0"><a href="<?='http://'.getenv("HTTP_HOST").'/service/'.$p->id;?>"><?=$p->title;?></a></li>
                        <?php } ?>
                    </ul>

                </div>
                <br>
                <?php } ?>
                <div>
                    <a href="index.php?id=actions"><img src="/images/actions22.jpg" style="border: 1px #CCCCCC solid;"></a>
                </div>
            </td>
            <td class="content">
                <?= Alert::widget() ?>
                <?= $content ?>
            </td>
        </tr>
    </table>
    <div class="line2" style="margin-top:15px"></div>
    <div class="share42init" style="margin-top:-25px;float:right;margin-right:10px;"></div>
    <div id="bottom">
        <div class="menu3">
            <ul class="parent0">
                <?php
                echo '<ul class="parent0">';
                foreach($menuItems as $p){
                    if($p['url']=='home'){$p['url']='../';}
                    echo '<li class="lin0"><a href="/'.$p['url'].'">'.$p['title'].'</a></li>';
                }
                echo '</ul>';
                ?>
            </ul>

        </div>

        <div class='copyright'>
            Copyright <?= date('Y') ?> &copy; paveldent.com.ua &nbsp;&nbsp;Designed by <a href='mailto:v.kuzma@mail.ru' title='написать письмо вебмастеру'>Kuzma</a>
        </div>

    </div>



</div>
<script type="text/javascript">
    $(function() {
        $('#thumbnails a').lightBox();
    });
</script>

<?php $this->endBody() ?>
<script type="text/javascript">
    $(function() {
        $('#thumbnails a').lightBox();
    });
</script>
</body>
</html>
<?php $this->endPage() ?>
