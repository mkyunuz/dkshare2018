<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Home';
?>
<div class="col-lg-12">
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully logged in Deka Share application.</p>

        <p><a class="btn btn-lg btn-success" href="<?= Url::toRoute(['my-drive'])?>">Backup Data Now</a></p>
    </div>

</div>
</div>
