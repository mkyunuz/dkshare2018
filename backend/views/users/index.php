<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Master User';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="col-lg-12 connectedSortable">
          <div class="box no-radius">
            <div class="box-header">
                <?php  if(Yii::$app->user->can('create-user')){ ?>
                        <?= Html::a('<i class="fa fa-plus"></i>&nbsp; Create Users', ['create'], ['class' => 'btn btn-success']) ?>
                <?php } ?>
            </div>
            <div class="box-body table-responsive no-padding">
<div class="distributor-index col-lg-12">
<div class="users-index">

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'first_name',
            'last_name',
            'username',
            'email:email',
            'level_id',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Action',
                'headerOptions' => ['style' => 'color:#337ab7'],
                'template' => '{view} {update} {assignment} {delete}',
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


                    'assignment' => function ($url, $model) {
                        return Html::a('<button class="btn btn-success btn-sm"><span class="fa fa-key"></span></button> ', $url, [
                                    'title' => Yii::t('app', 'lead-assignment'),
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
                        $url = Url::toRoute(['/users/view','id' => $model->id]);
                        return $url;
                    }

                    if ($action === 'update') {
                        $url = Url::toRoute(['/users/update','id' => $model->id]);
                        return $url;
                    }
                    if ($action === 'assignment') {
                        $url = Url::toRoute(['/users/user-assignment','id' => $model->id]);
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url = Url::toRoute(['/users/delete','id' => $model->id]);
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
</div>
</section>




<?php

$script = <<< JS
    $("#masterMenu").addClass('active');
JS;
$this->registerJs($script);
?>
