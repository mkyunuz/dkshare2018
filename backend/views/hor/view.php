<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Hor */

$this->title = $model->hor_name;
$this->params['breadcrumbs'][] = ['label' => 'Master Hor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="col-lg-12 connectedSortable">
          <div class="box no-radius">
            <div class="box-header">
            </div>
            <div class="box-body table-responsive no-padding">
<div class="distributor-index col-lg-12">
<div class="hor-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->hor_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->hor_id], [
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
            'hor_id',
            'hor_name',
        ],
    ]) ?>

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