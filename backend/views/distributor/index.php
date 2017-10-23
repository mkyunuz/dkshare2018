<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DistributorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Master Distributor';
$this->params['breadcrumbs'][] = $this->title;
?>
 <section class="col-lg-12 connectedSortable">
          <div class="box no-radius box-primary">
            <div class="box-header">
                <?php  if(Yii::$app->user->can('create-distributor')){ ?>
                    <?= Html::a('<i class="fa fa-plus"></i>&nbsp; Create Distributor', ['create'], ['class' => 'btn btn-success']) ?>
                <?php } ?>
            </div>
            <div class="box-body table-responsive no-padding">
<div class="distributor-index col-lg-12">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'distributor_name',
            'username',
            'distributor_id',
            ['attribute' =>'titik_id', 'value' => 'titik.titik_name' ],
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            // 'email:email',
            // 'status',
            // 'created_at',
            // 'updated_at',

            // ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Action',
                'headerOptions' => ['style' => 'color:#337ab7'],
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<button class="btn btn-warning btn-sm"><span class="fa fa-eye"></span></button> ', $url, [
                                    'title' => Yii::t('app', 'lead-view'),
                        ]);
                    },

                    'update' => function ($url, $model) {
                        return Html::a('<button class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button>', $url, [
                                    'title' => Yii::t('app', 'lead-update'),
                        ]);
                    },

                    'delete' => function ($url, $model) {
                        return Html::a(' <button class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button>', $url, [
                                    'title' => Yii::t('app', 'lead-delete'),
                                        'data-confirm' => Yii::t('yii', 'Are you sure to delete this item?'),
                                        'data-method' => 'post',
                        ]);
                    }

                  ],
                  'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url = Url::toRoute(['/distributor/view','id' => $model->id]);
                        return $url;
                    }

                    if ($action === 'update') {
                        $url = Url::toRoute(['/distributor/update','id' => $model->id]);
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url = Url::toRoute(['/distributor/delete','id' => $model->id]);
                        return $url;
                    }

                  }

            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
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