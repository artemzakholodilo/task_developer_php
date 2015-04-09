<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

$this->title = 'Product Records';
//\app\assets\ProductAssets::register($this);
?>
<div class="product-record-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <div class="col-sm-12 col-md-12">
            <?php
//            $models = \app\models\category\CategoryRecord::find()->all();
//            
//            $categories = array_map(function($model){ return $model->name; },
//                    $models);
//            
//            echo Html::checkboxList('category', null, $categories);
            ?>
        </div>
        <div class="col-md-3">
            
            <?= Html::label('Categories'); ?>
            <?= 
            ListView::widget([
                'dataProvider' => $categoriesProvider,
                'itemView' => '_category'
            ]);
            ?>
            
            <?= Html::a('Drop filters', ['/products/index'], [
                'class' => 'btn btn-danger'
            ]);
            ?>
        </div>
        <div class="col-md-9">
        <?= Html::a("Add product", ['create'], [
            'class' => 'btn btn-primary'
        ]) ?>
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    [
                        'attribute' => 'name',
                        'label' => 'Product',
                        'format' => 'html',
                        'value' => function($model) {
                            $value = "<div class='list-group'>";
                            $value .= Html::img($model->image_url, [
                                'class' => 'img img-responsive product-image'
                            ]);
                            $value .= Html::a($model->name, 
                                         ['products/view?id=' . $model->id]);
                            $value .= "<br/>";
                            $value .= "Categories: ";
                            
                            if ($model->categories) {
                                foreach ($model->categories as $category) {
                                    $value .= Html::tag('span', $category->name, [
                                        'class' => 'product-category list-group-item'
                                    ]);
                                }
                            } else {
                                $value .= Html::tag('span', 'none', [
                                    'class' => 'product-categories-none'
                                ]);
                            }
                            
                            $value .= "</div>";
                            
                            return $value;
                        }
                    ],
                    [
                        'attribute' => 'price',
                        'label' => 'Price',
                        'value' => function($model) {
                               return $model->price . " грн.";
                        }
                    ],
                ]
            ]);
            ?>
        </div>
    </div>
</div>