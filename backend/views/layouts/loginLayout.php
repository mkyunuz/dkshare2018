<?php

/* @var $this \yii\web\View */
/* @var $content string */

// use backend\assets\AppAsset;
use backend\assets\ThemingAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

ThemingAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<style type="text/css">
  body{
    /*background: #fafafa;*/
  }
  .login-container{
    position: fixed;
    top:50%;
    left:50%;
    width:320px;
    max-width:320px;
    transform: translate(-50%, -50%);
    background: white;
    /*border: 1px solid #eaeaea;*/

  }
  .login-body{

    padding: 10px;
  }

  .login-header{
    /*background: red;*/
    /*margin-bottom: 30px;*/
    padding: 10px;
    /*background: #2C3E50;*/
    color: #336E7B;
    text-align: center;

    
  }
  .login-header .company-name{
    font-size: 24px;
    margin-right: 10px;

    /*border:1px solid red !important;*/
    line-height: 20px;
    padding-bottom: 4px;
  }
  .login-footer{
    padding:5px;
  }
  .text-success{
    color: #00b18d;
  }
</style>
<body  class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>
      <div class="container">
            <?= $content ?>
      </div>
    

  



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
