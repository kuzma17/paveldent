<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'anons:html',
            'context:html',
            'category.title',
            ['attribute'=>'author.username','label'=>'автор'],
            ['attribute' => 'status',
                'format' => 'raw',
                'value' => ($model->status==1)?Html::img(Url::toRoute('/images/yes.png')):Html::img(Url::toRoute('/images/no.png')),
            ],
            ['attribute'=>'created_at',
                'format'=>['date', 'dd.MM.Y'],
                'label'=>'Created',
            ],
            ['attribute'=>'updated_at',
                'format'=>['date', 'dd.MM.Y'],
                'label'=>'Updated',
            ],
        ],
    ]) ?>

</div>
