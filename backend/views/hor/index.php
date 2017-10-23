<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\HorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Master Hor';
$this->params['breadcrumbs'][] = $this->title;
?> <section class="col-lg-12 connectedSortable">
          <div class="box no-radius">
            <div class="box-header">
                <?php  if(Yii::$app->user->can('create-hor')){ ?>
                      <?= Html::a('Create Hor', ['create'], ['class' => 'btn btn-primary']) ?>
                <?php } ?>
            </div>
            <div class="box-body table-responsive no-padding">
<div class="distributor-index col-lg-12">
<div class="hor-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
      
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'hor_id',
            'hor_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
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