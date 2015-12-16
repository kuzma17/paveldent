<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Блог';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="line" style="background-color:#5BC1B5"></div>
    <br>



    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {

            ?>

            <h4><?=$model->title?></h4>
            <div style="width:70px;float:left;color:red;font-size:11px;">
                <?=date("d.m.Y",$model->updated_at)?></div>
            <div style="width:100px;float:right;font-size:11px;">
                автор: <?=$model->author->username?></div>
            <div style="width:200px;float:left;font-size:11px;">
                <?=$model->category->title?></div>
            <div style="clear: both"></div>
            <?=$model->anons?>
            <?=Html::a(Html::encode("подробнее..."), ['view', 'id' => $model->id])?>

    <?php

          //  return Html::a(Html::encode($model->title), ['view', 'id' => $model->id]);
        },
    ]) ?>

</div>
