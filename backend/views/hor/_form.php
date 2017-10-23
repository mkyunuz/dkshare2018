<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<section class="col-lg-12 connectedSortable">
	<div class="box no-radius">
		<div class="box-header">
		</div>
		<div class="box-body table-responsive no-padding">
			<div class="hor-index col-lg-12">
				<div class="hor-form">

					<?php $form = ActiveForm::begin(); ?>

					<?= $form->field($model, 'hor_name')->textInput(['maxlength' => true]) ?>

				    <div class="form-group">
				        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
				    </div>

	    			<?php ActiveForm::end(); ?>

				</div>
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