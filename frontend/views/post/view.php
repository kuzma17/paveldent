<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="line" style="background-color:#5BC1B5"></div>
    <div id="upload_price" style="float:right;width:80px;cursor:pointer;background-color:#6699CC;color:#FFFFFF;font-family:sans-serif;
font-size:11px;
font-weight:bold;padding:2px;border-radius: 3px;padding-left:10px;margin-top:2px;margin-right:10px;" data-href="/post">назад</div>
    <br>
    <br>
   <div style="width:70px;float:left;color:red;font-size:11px;">
       <?=date("d.m.Y",$model->updated_at)?></div>
    <div style="width:200px;float:left;font-size:11px;">
        <?=$model->category->title?></div>
    <div style="clear: both"></div>
    <?=$model->context?>
    <div style="clear: both"></div>
    <div style="width:100px;float:right;font-size:11px;">
        автор: <?=$model->author->username?></div>
</div>
<?= ListView::widget([
    'dataProvider' => $list_comment,
    'itemOptions' => ['class' => 'item'],
    //'emptyText'=>'',
    //'summary'=>'',
    'itemView' => function ($model_list, $key, $index, $widget) {

        ?>

        <div style="width:70px;float:left;color:red;font-size:11px;">
            <?=date("d.m.Y",$model_list->updated_at)?></div>
        <div style="clear: both"></div>
        <?=$model_list->content?>

           <div>автор: <?=$model_list->author?></div>

        <?php

        //  return Html::a(Html::encode($model->title), ['view', 'id' => $model->id]);
    },
]) ?>

<h2>Оставить комментарий</h2>
Поля со звёздоской (*) необходимые для заполнения.<br>
<div class="comment-form" style="width: 400px;">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model_comment, 'author')->textInput(['maxlength' => true, 'value'=>''])->label('автор*:') ?>
    <?= $form->field($model_comment, 'email')->textInput(['maxlength' => true, 'value'=>''])->label('email*:') ?>
    <?= $form->field($model_comment, 'url')->textInput(['maxlength' => true, 'value'=>''])->label('сайт:') ?>
    <?= $form->field($model_comment, 'content')->textarea(['rows' => 6, 'value'=>''])->label('комментарий*:') ?>


    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>