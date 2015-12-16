<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Sertificate */

$this->title = 'Create Sertificate';
$this->params['breadcrumbs'][] = ['label' => 'Sertificates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sertificate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<hr>
<?php
echo 'image: '.$model->image.'<br>';
echo 'image_s: '.$model->image_s.'<br>';
echo 'on: '.$model->on.'<br>';
echo 'dir: '.$dir.'<br>';
echo 'uploaded: '.$uploaded.'<br>';
?>
