<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MasterPage */
/* @var $form yii\widgets\ActiveForm */
?>

<section class="col-lg-12 connectedSortable">
          <div class="box no-radius">
            <div class="box-header">
            </div>
            <div class="box-body no-padding">
<div class="master-page-form col-lg-12">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'master_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'master_name')->textInput(['maxlength' => true]) ?>

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