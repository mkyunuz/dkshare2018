<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
 <div class="login-container">
        <div class="login-header">
          <img  src="<?= Url::to('@web/../../assets/images/logo/icon-red.png', true)?>">
           <div class="company-name"><b>Deka </b><span class="text-success">Share</span></div>
        </div>
          <div class="login-body">
<div class="site-login">


    <div class="row">
        <div class="col-lg-12">

            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder'=> 'Username'])->label(false) ?>

                <?= $form->field($model, 'password')->passwordInput(['placeholder'=> 'Password'])->label(false) ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-success btn-block', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
</div>
</div>
