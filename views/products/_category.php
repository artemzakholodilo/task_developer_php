<?php

use yii\helpers\Html;
?>

<?=

Html::a($model->name, ['products/index', ['category' => $model->id]], [
    'class' => 'btn btn-default',
    'data-targer' => $model->id
]);
?>