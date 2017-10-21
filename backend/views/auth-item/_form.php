<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\MasterPage;

use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-form">

    <?php $form = ActiveForm::begin(); ?>

      <?php
        echo $form->field($model, 'master_id')->widget(Select2::classname(), [
            // 'data' => $data,
            'data' => ArrayHelper::map(MasterPage::find()->all(),'master_id','master_name'),
            'language' => 'de',
            'options' => ['placeholder' => 'Select Master Page'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);

    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

  

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
