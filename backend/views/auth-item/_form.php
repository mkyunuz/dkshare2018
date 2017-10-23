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


<section class="col-lg-12 connectedSortable">
          <div class="box no-radius">
            <div class="box-header">
            </div>
            <div class="box-body table-responsive no-padding">
<div class="auth-item-form col-lg-12">

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

</div>
</div>
</section>


<?php

$script = <<< JS
    $("#utilitesMenu").addClass('active');
JS;
$this->registerJs($script);
?>