<?php

use dosamigos\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>
<?=Yii::$app->user->identity->id;?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anons')->widget(CKEditor::className(), [ 'options' => ['rows' => 6], 'preset' => 'standart' ]); //basic standart full ?>

    <?= $form->field($model, 'context')->widget(CKEditor::className(), [ 'options' => ['rows' => 6], 'preset' => 'standart' ]); //basic standart full ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map($category, 'id','title')) ?>

    <?php $model->author_id = Yii::$app->user->identity->id; // ставим selected ?>

    <?= $form->field($model, 'author_id')->dropDownList(ArrayHelper::map($autor, 'id', 'username')) ?>

    <?= $form->field($model, 'status')->dropDownList(['1'=>'Yes','0'=>'No']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
