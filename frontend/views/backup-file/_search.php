<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\BackupFileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="backup-file-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'backup_file_id') ?>

    <?= $form->field($model, 'distributor_id') ?>

    <?= $form->field($model, 'backup_file_created_at') ?>

    <?= $form->field($model, 'backup_file_updated_at') ?>

    <?= $form->field($model, 'week') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
