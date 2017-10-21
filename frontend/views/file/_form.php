<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\File */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="file-form">

    <?php $form = ActiveForm::begin(); ?>

   <?php
   		echo $form->field($model, 'file_name')->widget(FileInput::classname(), [
		    'options' => ['accept' => 'image/*'],
		    'pluginOptions' => [
                'uploadUrl' => Url::toRoute(['/backup-file/upload'], [
											    'data-method' => 'POST',
											    'data-params' => [
											        'wek' => 1,
											    ],
											]),
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
		]);

	  // echo FileInput::widget([
   //          'name' => 'File[file_name][]',
   //          'options'=>[
   //              'multiple'=>true,
   //               // 'allowedFileExtensions'=>['jpg','png']
   //          ],
   //          'pluginOptions' => [
   //              'uploadUrl' => Url::toRoute(['/backup-file/upload'], [
			// 								    'data-method' => 'POST',
			// 								    'data-params' => [
			// 								        'wek' => 1,
			// 								    ],
			// 								]),
   //              'uploadExtraData' => [
   //                  'album_id' => 20,
   //                  'cat_id' => 'Nature'
   //              ],
   //              'showPreview' => true,
   //                      // 'showCaption' => true,
   //                      // 'showRemove' => true,
   //                      // 'showUpload' => true,
   //              'maxFileCount' => 2
   //          ]
   //      ]);
		// echo FileInput::widget([
		//     'name' => 'attachment_48[]',
		//     'options'=>[
		//         'multiple'=>true
		//     ],
		//     'pluginOptions' => [
		//         'uploadUrl' => Url::to(['/site/file-upload']),
		//         'uploadExtraData' => [
		//             'album_id' => 20,
		//             'cat_id' => 'Nature'
		//         ],
		//         'maxFileCount' => 10
		//     ]
		// ]);
   ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
