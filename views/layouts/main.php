<?php
use yii\helpers\Html;

//\app\assets\ApplicationUiAssetBundle::register($this);
\yii\web\AssetBundle::register($this);
\yii\bootstrap\BootstrapAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="utf-8">
        <title><?= Html::encode($this->title); ?></title>
        <?php $this->head() ?>
        <?= Html::csrfMetaTags(); ?>
    </head>
    <body>
        <?php $this->beginBody(); ?>
        <div class="container">
            <?= $content; ?>
        </div>
        <footer class="footer"><?= Yii::powered(); ?></footer>
        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>