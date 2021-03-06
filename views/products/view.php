<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $product->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$categories = '<div class="list-group">';

if ($product->categories) {
    foreach ($product->categories as $category) {
        $categories .= Html::tag('span', $category->name, [
            'class' => 'product-category list-group-item'
        ]);
    }
}
else {
    $categories .= Html::tag('span', 'none', [
        'class' => 'product-category-none'
    ]);
}

$categories .= "</div>";
?>
<div class="product-record-view">

    <h1>Product: "<?= Html::encode($this->title) ?>"</h1>

    <?= DetailView::widget([
        'model' => $product,
        'attributes' => [
            'name',
            'price',
            [
                'label' => 'Categories',
                'format' => 'html',
                'value' => $categories
            ],
            [
                'label' => 'Distributor',
                'value' => $distributor->name
            ]
        ],
    ]) ?>

</div>