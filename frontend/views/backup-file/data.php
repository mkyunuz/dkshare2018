<?php 

use yii\helpers\Url;

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

use common\models\BackupFileLib;
use frontend\models\BackupFileDetail;

?>
<style type="text/css">
    .thumb-file{
        border: 1px solid #ECEFF1;
        /*border-radius:5px;*/
        background-color:#FAFAFA;
        /*box-shadow: inset 0 0 0 1px #FAFAFA;*/
        padding:10px;
        /*text-align: center;*/
    }

    
    .thumb-file > .thumb-file-info p{
        color: #212121;
        font-size: 12px;
        padding: 0px;
        /*border: 1px solid red;*/
        margin:0px;
        line-height: 16px;
    }
    .thumb-file > .thumb-file-info p.detail{
        font-size: 9px;
    }
    .custom-col{
        margin-bottom:25px;
    }
    .thumb-file-icon{
        font-size: 48px;
        /*width: 33.33%;*/
        padding: 0px 10px;
        color: #37474F;
        line-height: 10px;
        /*border: 1px solid red;*/
        display: table-cell;
        /*border:1px solid red;*/
        /*text-align: center;*/
    }
    .thumb-file > .thumb-file-info{
        text-align: left;
        display: table-cell;
        vertical-align: top;
        /*border:1px solid red;*/
    }
    .thumb-file .download-attr{
        /*text-align: right;*/
        font-size: 11px;
        /*border: 1px solid red !important;*/
        display: block;
    }
    .thumb-file .download-attr a{
        margin-left: 15px;
    }
</style>
 <?= Html::button('Upload File', ['value '=> Url::toRoute(['/backup-file/upload','w' => $week],['data-method' => 'post']), 'class' => 'btn btn-success', 'id'=> 'modalButton']) ?>

<?php
        Modal::begin([
                'header' => '<h4>Upload File</h4>',
                'id' => 'modal',
                'size' => 'modal-lg',
            ]);
        echo '<div id="modalContent"></div>';
        Modal::end();
?>

<div class="clearfix">&nbsp;</div>
<div id="backupData"></div>

<div class="row">
    <?php
            $data = new BackupFileLib;
            $data->distributor_id = Yii::$app->user->identity->distributor_id;
            $data->week = $week;
            foreach ($data->getBackupFileDetail() as $key) {
                $fullPath = $key['path'];
                $filesize = filesize ($fullPath);

            ?>
                


                <div class="col-md-4 custom-col">
                    <div class="thumb-file">
                        <div class="thumb-file-icon">
                            <i class="fa fa-archive"></i>
                        </div>
                        <div class="thumb-file-info">
                            <p><?= $key['backup_file_name']; ?></p>
                            <p class="detail"><?php echo $data->human_filesize($filesize); ?> <?= date ("Y/m/d H:i", filemtime($fullPath)) ?></p>
                            <p class="detail"><a ><i class="fa fa-download"></i> Download</a>
                            <a ><i class="fa fa-trash"></i> Remove</a></p>
                        </div>
                    </div>
                </div>
           <?php }
           
          
    ?>
    
</div>
<?php
$distributor_id = 10;
$week = 1;
$script = <<< JS
    // $("#backupData").html('asd');
    loadData($distributor_id,$week);
    function loadData(distributor_id="",week=""){
        alert(distributor_id);
    }
JS;
$this->registerJs($script);
?>