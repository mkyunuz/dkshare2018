<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use backend\models\Titik;

use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Distributor */
/* @var $form yii\widgets\ActiveForm */
?>

 <section class="col-lg-12 connectedSortable">
          <div class="box no-radius">
            <div class="box-header">
               
            </div>
            <div class="box-body no-padding">
<div class="distributor-form col-lg-12">

    <?php $form = ActiveForm::begin(['id'=>$model->formName(), 'enableAjaxValidation'=> true]); ?>

    <?= $form->field($model, 'distributor_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'distributor_id')->textInput(['maxlength' => true]) ?>
     <?php
        echo $form->field($model, 'titik_id')->widget(Select2::classname(), [
            // 'data' => $data,
            'data' => ArrayHelper::map(Titik::find()->all(),'titik_id','titik_name'),
            'language' => 'de',
            'options' => ['placeholder' => 'Select Titik'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);

    ?>
    <?php
        if($model->isNewRecord){
            echo $form->field($model, 'password_hash')->textInput(['maxlength' => true]);
        }else{
            echo $form->field($model, 'password_hash')->hiddenInput(['maxlength' => true])->label(false); 

            echo $form->field($model, 'new_password')->textInput(['maxlength' => true]);
        }

    ?>

    <!-- <?= $form->field($model, 'repeat_password')->textInput() ?> -->
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'status')->textInput() ?> -->
     <?php $status = ['10'=> 'Active','-1'=> 'Inactive']; ?>

    <?= $form->field($model, 'status')->dropdownList($status, ['prompt'=> 'Select status']) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
</div>
</section>

<?php
$script = <<< JS
     $("#masterMenu").addClass('active');
    

JS;
$this->registerJs($script)
?>