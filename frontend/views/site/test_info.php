<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\models\UserTest;

AppAsset::register($this);
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
<body>
<?php $this->beginBody() ?>


<div class="wrap">
    <div class="container">
        <form action="" method="post">
            <div class="mycenter">
                <div class="mysign"style="margin-top:20%">
                    <div class="col-lg-11 text-center text-info">
                        <h2>点孵测评</h2>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="请输入手机号码" required autofocus/>
                    </div>
                    <div class="col-lg-10"></div>
                    <div class="col-lg-8" style="margin-top:20px;padding-bottom: 5px;">
                        <input type="text" class="form-control" name="realname" id="realname" placeholder="真实姓名" required autofocus/>
                    </div>
                    <div class="col-lg-10"></div>

                    <div class="col-lg-10"></div>
                    <div class="col-lg-10" style="margin-top:30px;padding-bottom: 5px;">
                        <button type="button" style="width:100%;" id="btn" class="btn btn-success col-lg-12">提交</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<input type="hidden" id="token" value="<?= $token?>">

<?php $this->beginBlock('weixin') ?>
$('#btn').click(function(){

var token = $('#token').val();
var mobile = $('#mobile').val();
var realname= $('#realname').val();
window.location="http://dzapi.bibicars.com/v1/eval/1?token="+token+"&mobile="+mobile+"&realname="+realname;

});

<?php $this->endBlock() ?>
<?php $this->registerJs($this->blocks['weixin'], \yii\web\View::POS_END); ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>