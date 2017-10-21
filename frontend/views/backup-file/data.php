<?php 
use yii\helpers\Url;

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

use common\models\BackupFileLib;
use frontend\models\BackupFileDetail;

?>
 <?= Html::button('Upload File', ['value '=> Url::toRoute(['/backup-file/upload','w' => $week],['data-method' => 'post']), 'class' => 'btn btn-success', 'id'=> 'modalButton']) ?>

<?php
        Modal::begin([
                'header' => '<h4>Upload File</h4>',
                'id' => 'modal',
                'size' => 'modal-lg',
            ]);
       echo '<div id="modalContent"></div>';
        Modal::end();


        $data = new BackupFileLib;
        $data->distributor_id = Yii::$app->user->identity->distributor_id;
        $data->week = $week;
        echo '<pre>';
        print_r($data->getBackupFileDetail());
        echo '</pre>';
     
        $uploadPath = $data->setDefaultBackupPath().DIRECTORY_SEPARATOR.$data->setTargetUploadDist();
        echo $uploadPath;
      
?>
