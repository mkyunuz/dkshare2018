<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

$this->title = $model->first_name." ".$model->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Master User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="col-lg-12 connectedSortable">
    <div class="box no-radius box-primary">
        <div class="box-header"></div>
        <div class="box-body table-responsive no-padding">
            <div class="users-view col-lg-12">
                <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                                'id',
                                'first_name',
                                'last_name',
                                'username',
                                // 'auth_key',
                                // 'password_hash',
                                // 'password_reset_token',
                                'email:email',
                                'status',
                                'created_at',
                                'updated_at',
                                'level_id',
                            ],
                        ]) 
                    ?>
                <p class="pull-right">
                    <?= Html::a('<i class="fa fa-edit"></i>&nbsp; Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <a class="btn btn-success" href="<?= Url::toRoute(['/users/auth-assignment', 'id' => $model->id]);?>"><i class="fa fa-key"></i>&nbsp; Set Assignment</a>
                    <?= Html::a('<i class="fa fa-trash"></i>&nbsp; Delete', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]);
                    ?>        
                </p>
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