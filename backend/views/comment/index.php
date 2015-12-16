<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'post_id',
            //'post.title',
            ['attribute'=>'post.title', 'label'=>'Post Title',],
            'author',
            //'email:email',
            //'url:url',
            // 'content:ntext',
            ['attribute'=>'created_at',
                'format'=>['date', 'dd.MM.Y'],
                'label'=>'Created',
            ],
            ['attribute' => 'status',
                'format' => 'raw',
                'value' => function ($data) {
                    return ($data->status==1)? Html::img(Url::toRoute('/images/yes.png')):Html::img(Url::toRoute('/images/no.png'));
                }
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
