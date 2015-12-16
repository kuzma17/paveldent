<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            //'anons:ntext',
            //'context:ntext',
            'category.title',
            //'author.username',
            ['attribute'=>'author.username','label'=>'автор'],
            // 'status',
            ['attribute' => 'status',
                'format' => 'raw',
                'value' => function ($data) {
                    return ($data->status==1)? Html::img(Url::toRoute('/images/yes.png')):Html::img(Url::toRoute('/images/no.png'));
                }
            ],
            // 'created_at',
           // 'created_at:date',
            ['attribute'=>'updated_at',
                'format'=>['date', 'dd.MM.Y'],
                'label'=>'Updated',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
