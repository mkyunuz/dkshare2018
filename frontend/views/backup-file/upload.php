<?php 
use yii\helpers\Url;

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

use yii\widgets\ActiveForm;


?>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'week')->textInput(['value'=>$week]);?>
 <!-- <?= Html::button('Create Branches', ['value '=> Url::toRoute(['/backup-file/upload','w' => 42]), 'class' => 'btn btn-success', 'id'=> 'modalButton']) ?>

 <?php
        Modal::begin([
                'header' => '<h4>Create Branch</h4>',
                'id' => 'modal',
                'size' => 'modal-lg',
            ]);
       echo '<div id="modalContent"></div>';
        Modal::end();
    ?> -->
<!-- <div id="contentUpload"></div> -->
<?php
	echo \kato\DropZone::widget([
		'uploadUrl' => Url::toRoute(['/backup-file/upload','w' => $week]),
		// 'uploadUrl' => Url::toRoute(['/backup-file/upload'], [
		// 									    'data-method' => 'POST',
		// 									    'data-params' => [
		// 									        'wek' => $week,
		// 									    ],
		// 									]),

    	'options' => [
        	'maxFilesize' => '2', 'removedfile'=> true,
       	],

    	'clientEvents' => [
        	// 'complete' => "function(file){\$('#modal').modal('hide')}",
        	'complete' => "function(file){console.log(file)}",
        	'removedfile' => "function(file){alert(file.name + ' is removed')}",
        	// 'success' => Url::toRoute(['/backup-file/upload','w' => 42]),
		],
   ]);
?>


<?php
        // echo FileInput::widget([
        //     'name' => 'backup_file_name',
        //     'options'=>[
        //         'multiple'=>true, 'allowedFileExtensions'=>['jpg','png']
        //     ],

	        	
	        	
        //     'pluginOptions' => [
        //         'uploadUrl' => Url::toRoute(['/backup-file/upload','w' => 42]),
        //         'uploadExtraData' => [
        //             'album_id' => 20,
        //             'cat_id' => 'Nature'
        //         ],
        //         'showPreview' => true,
        //                 // 'showCaption' => true,
        //                 // 'showRemove' => true,
        //                 // 'showUpload' => true,
        //         'maxFileCount' => 2,

        //     ]
        // ]);

?>

<?php ActiveForm::end(); ?>