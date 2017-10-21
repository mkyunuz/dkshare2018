<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model frontend\models\BackupFile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="backup-file-form">

    <?php $form = ActiveForm::begin(); ?>

  <!--   <?= $form->field($model, 'backup_file_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'distributor_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'backup_file_created_at')->textInput() ?>

    <?= $form->field($model, 'backup_file_updated_at')->textInput() ?>

    <?= $form->field($model, 'week')->textInput(['value'=>$week, 'readonly' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div> -->
    <?php
       /* echo FileInput::widget([
            'name' => 'backup_file_name[]',
            'options'=>[
                'multiple'=>true, 'allowedFileExtensions'=>['jpg','png']
            ],
            'pluginOptions' => [
                'uploadUrl' => Url::toRoute(['/backup-file/saveupload','w' => 42]),
                'uploadExtraData' => [
                    'album_id' => 20,
                    'cat_id' => 'Nature'
                ],
                'showPreview' => true,
                        // 'showCaption' => true,
                        // 'showRemove' => true,
                        // 'showUpload' => true,
                'maxFileCount' => 2
            ]
        ]);*/

        // echo $form->field($model, 'backup_file_name[]')->widget(FileInput::classname(), [
        //             'options' => ['accept' => '*','multiple' => true],
        //             'pluginOptions' => [
        //                 // 'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
        //                 // 'showPreview' => true,
        //                 // 'showCaption' => true,
        //                 // 'showRemove' => true,
        //                 // 'showUpload' => true,

        //                 'browseLabel' =>  'Browse..',
        //                 'uploadUrl' => Url::toRoute(['/backup-file/saveupload','w' => 42]),
        //                 'maxFileCount' => 2,
        //                 'uploadExtraData' => [
        //                   'album_id' => "javascript: return $('#backupfile-backup_file_name').val());",
        //               ],
        //             ],              

// ]);

        echo FileInput::widget([
            'name' => 'attachment_53',
            'pluginOptions' => [
                'showCaption' => false,
                'showRemove' => false,
                'showUpload' => false,
                'browseClass' => 'btn btn-primary btn-block',
                'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                'browseLabel' =>  'Select Photo'
            ],
            'options' => ['accept' => 'image/*']
        ]);

    ?>
    <?php ActiveForm::end(); ?>

</div>
