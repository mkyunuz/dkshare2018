<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Distributor */

$this->title = $model->distributor_name;
$this->params['breadcrumbs'][] = ['label' => 'Master Distributor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

 <section class="col-lg-12 connectedSortable">
          <div class="box no-radius">
            <div class="box-header">
                
            </div>
            <div class="box-body table-responsive no-padding">
<div class="distributor-view col-lg-12">


    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'distributor_name',
            'username',
            'distributor_id',
            'titik_id',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

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