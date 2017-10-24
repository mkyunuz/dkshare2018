<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\MasterPageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Master Pages';
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="col-lg-12 connectedSortable">
          <div class="box no-radius">
            <div class="box-header">
                <?php  if(Yii::$app->user->can('create-master-page')){ ?>
                        <?= Html::a('<i class="fa fa-plus"></i>&nbsp; Create Master Page', ['create'], ['class' => 'btn btn-success']) ?>
                <?php } ?>
            </div>
            <div class="box-body table-responsive no-padding">
<div class="master-page-index col-lg-12">

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'master_id',
            'master_name',
            'created_at',

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
                        $url = Url::toRoute(['/master-page/view','id' => $model->master_id]);
                        return $url;
                    }

                    if ($action === 'update') {
                        $url = Url::toRoute(['/master-page/update','id' => $model->master_id]);
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url = Url::toRoute(['/master-page/delete','id' => $model->master_id]);
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
    $("#utilitesMenu").addClass('active');
JS;
$this->registerJs($script);
?>