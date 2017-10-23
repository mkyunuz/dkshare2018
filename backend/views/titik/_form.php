<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\models\Hor;

/* @var $this yii\web\View */
/* @var $model backend\models\Titik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="titik-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'hor_id')->textInput() ?> -->
    <!-- <?= $form->field($model, 'hor_id')->textInput() ?> -->
    <?php
    	echo $form->field($model, 'hor_id')->widget(Select2::classname(), [
		    // 'data' => $data,
		    'data' => ArrayHelper::map(Hor::find()->all(),'hor_id','hor_name'),
		    'language' => 'de',
		    'options' => ['placeholder' => 'Select HOR'],
		    'pluginOptions' => [
		        'allowClear' => true
		    ],
		]);

    ?>

    <?= $form->field($model, 'titik_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>



<?php

$script = <<< JS
    $("#masterMenu").addClass('active');
JS;
$this->registerJs($script);
?>