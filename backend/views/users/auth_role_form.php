<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

?>
<div class="well">
	
	 <?php $form = ActiveForm::begin(); ?>
	<table class="table table-bordered">
		<tr>
			<td><?= $role_id; ?></td>
			
			<td>
				<?php
				 if(!empty($authItem)){
				 	 echo $form->field($model, 'item_name')->checkboxlist($authItem)->label(false);
				 }
				?>
			</td>
			<td>
				<?php
				 if(!empty($authItem)){
				 	 echo $form->field($model, 'item_name')->checkboxlist($authItem)->label(false);
				 }
				?>
			</td>
			<td>
				<?php
				 if(!empty($authItem)){
				 	 echo $form->field($model, 'item_name')->checkboxlist($authItem)->label(false);
				 }
				?>
			</td>
			<td>
				<?php
				 if(!empty($authItem)){
				 	 echo $form->field($model, 'item_name')->checkboxlist($authItem)->label(false);
				 }
				?>
			</td>
		</tr>
	</table>
	 <?php ActiveForm::end(); ?>
	
</div>