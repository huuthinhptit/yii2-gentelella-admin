<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Version */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="version-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'current_version')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url_app')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'message_en')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'message_mm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_force_update')->textInput() ?>

    <?php echo $form->field($model, 'status')->dropDownList(['1' => 'Enable', '2' => 'Disabled']) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
