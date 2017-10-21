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

<div class="distributor-form">

    <?php $form = ActiveForm::begin(['id'=>$model->formName()]); ?>

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

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php
$script = <<< JS

    $('form#{$model->formName()}').on('beforeSubmit',function(e){

        // var \$form = $(this);
            // $.post(
            //     \$form.attr('action'),
            //     \$form.serialize()
            // )
            //     .done(function(result){
            //         console.log(result);
            //         if(result== 'success'){
            //             $(\$form).trigger('reset');
            //             alert('success');
            //         }else{
            //             alert('failed');
            //         }
            //     }).fail(function(){
            //         console.log('server error');
            //     });
            var urlForm = $(this).attr('action');
            $.ajax({
                data : $(this).serialize(),
                url : urlForm,
                type : 'POST',
                success : function(result){
                    alert(result);
                },
                error : function(result){
                    alert('server error');
                }
            })
            return false;
    });
    alert(1);

JS;
$this->registerJs($script)
?>