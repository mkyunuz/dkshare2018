<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use backend\models\Levels;

use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

 <section class="col-lg-12 connectedSortable">
    <div class="box no-radius">
        <div class="box-header"></div>
        <div class="box-body no-padding">
            <div class="users-form col-lg-12 row">
                <?php $form = ActiveForm::begin(['enableAjaxValidation'=> true]); ?>
                <div class="col-lg-6 row">
                    <div class="col-xs-12">
                        <label for="ex1">First Name</label>
                        <?= $form->field($model, 'first_name')->textInput(['maxlength' => true])->label(false) ?>
                        <div class="clearfix"></div>
                    </div>

                    <div class="col-xs-12">
                        <label for="ex1">Last Name</label>
                        <?= $form->field($model, 'last_name')->textInput(['maxlength' => true])->label(false) ?>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-xs-6">
                        <label for="ex1">Username</label>
                        <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label(false) ?>
                    </div>

                    <div class="col-xs-6">
                        <label for="ex1">Password</label>
                        <?php
                        if($model->isNewRecord){
                            echo $form->field($model, 'password_hash')->passwordInput(['maxlength' => true])->label(false);
                        }else{
                            echo  Html::activeHiddenInput($model, 'password_hash', ['value' => $model->password_hash]);
                            echo $form->field($model, 'new_password')->textInput()->label(false);
                        }
                        ?>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-xs-6">
                        <label for="ex1">Email</label>
                        <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label(false) ?>
                    </div>

                    <div class="col-xs-6">
                        <label for="ex1">Status</label>
                        <?= $form->field($model, 'status')->dropdownList(['10'=> 'Active' , '-1'=> 'Inactive'],['prompt'=>'Select Status'])->label(false) ?>
                    </div>

                    <div class="col-xs-12">
                        <label for="ex1">Level</label>
                        <?php
                        echo $form->field($model, 'level_id')->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(Levels::find()->all(),'level_id','level_name'),
                            'language' => 'de',
                            'options' => ['placeholder' => 'Select Level'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                            ])->label(false);
                        ?>
                    </div>
                </div>
                <div class="clearfix"></div>
                
                <div class="col-lg-12 form-group">
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
$this->registerJs($script);
?>