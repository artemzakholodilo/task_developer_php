<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Categories Records';
?>
<div class="categories-record-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'name',
            ]
        ]);
        ?>
    </div>
</div>