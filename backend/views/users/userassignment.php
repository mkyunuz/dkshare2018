
<style type="text/css">
	.row-assigment{
		background: rgba(0,0,0,.01);
		box-shadow: none;
		background: none;
		border: none;
	}
	.row-assigment .categories-container .checkbox{
		border-left:1px dashed rgba(0,0,0,.1);
		margin:0px;
		margin-left:6px;
		padding:5px 0px;
	}
	.row-assigment .categories-container .checkbox .line{
		border-top: 1px dashed rgba(0,0,0,.1);
		width:15px;
		margin-top: 10px;
		height: 0px !important;
		float: left;

	}
	.sidebar-custom{
		background: rgba(0,0,0,.01);
		background: none;
		border: none;
		box-shadow: none;
	}

	.custom-thumb{
		/*border:1px solid red;*/
	}
	.custom-thumb .image{
		width:100px;
		height:100px;
		border: 1px solid gray;
		margin:auto;
		border-radius: 50%;
	}
	.nav-list.custom{
		margin-top: 30px;
	}
	.nav-list.custom li{
		text-align: center;
	}
</style>
<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use backend\models\MasterPage;
use backend\models\AuthAssignment;
use backend\models\AuthItem;

use kartik\select2\Select2;

$this->title = 'Update Users: ' . $userModel->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $userModel->first_name." ".$userModel->last_name, 'url' => ['view', 'id' => $userModel->id]];
$this->params['breadcrumbs'][] = 'Assignment';
?>


<div class="row">
	 <?= Yii::$app->session->getFlash('success'); ?>
	<div class="col-md-3">
      <div class="well sidebar-nav sidebar-custom">
      	<div class="custom-thumb">
      		<div class="image">
      			
      		</div>      		
      	</div>
        <ul class="nav nav-list custom">
          <li class="active"><?= $userModel->first_name." ".$userModel->last_name; ?></li>
          <li class="active"><?= $userModel->level_id; ?></li>
          <li class="active"><?= $userModel->status; ?></li>
        </ul>
      </div>
    </div>
    <div class="col-md-9">
    	<?php $form = ActiveForm::begin(); ?>
		<div class="well row-assigment">
			<?php 
				$masterPageList = $masterPage->find()->all();
				foreach ($masterPageList as $key) { ?>
					<div class="col-sm-4" style="">
						<div class="checkbox">
							<label><input type="checkbox" class="authRoleClass" value="<?= $key->master_id; ?>"><?= $key->master_name; ?></label>
						</div>

						<div class="categories-container">
						<?php 
						$authItem =AuthItem::find()->where(['master_id' => $key->master_id])->all();
						// foreach ($authItem as $authItemKey) { 
								
								foreach ($authItem as $ai) {
									$checked = AuthAssignment::find()->where(['item_name' => $ai->name,'user_id'=>$userModel->id])->all();
									$checkedItem = "";
									if(count($checked)=="1"){
										$checkedItem = 'checked';
									}
									?>
									<div class="checkbox">
										<div class="line"></div>
										<label><input type="checkbox" <?= $checkedItem; ?> name="AuthAssignment[item_name][]" class="<?= $key->master_id; ?>" value="<?= $ai->name?>"><?= $ai->name?></label>
									</div>
									
							<?php	}

						?>
						
						</div>	
					</div>


				<?php } 
				
			?>
			<div class="col-lg-12 form-group">
		        <button type="submit" class="btn btn-success">Save</button>
		    </div>
			<div class="clearfix"></div>
			 <?php ActiveForm::end(); ?>
		</div>
		
		<div id="formContent"></div>
    </div>
</div>

<?php

$script = <<< JS
	$(".authRoleClass").click(function(){
		var values = $(this).attr('value');
		$('.'+values).prop('checked', this.checked);
	});
   $("#roles").change(function(){

   
   		// $("#formContent").html('asdasd');
   	var role = $(this).val();
   	$("#formContent").load('index.php?r=users%2Fget-auth-role&id='+role);
   });
JS;
$this->registerJs($script);
?>