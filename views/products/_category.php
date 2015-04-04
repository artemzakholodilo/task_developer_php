<?php

use yii\helpers\Html;

?>

<li>
    <?=
    Html::a($model->name, "#{$model->id}", [
        'class' => 'btn btn-default',
        'data-targer' => $model->id
    ]);
    ?>
</li>