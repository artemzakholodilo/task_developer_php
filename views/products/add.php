<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//var_dump($categories); exit;
?>

<?php
$form = ActiveForm::begin([
        ]);
?>

<div class="container">
    <h1 class="text-primary">Add new product</h1>
    <hr/>
    <div class="input-group">
        <?= $form->field($product, 'name')->textInput([
            
        ]);
        ?>
    </div>
    
    <div class="input-group">
        <?= $form->field($product, 'price')->textInput([
            
        ]);
        ?>
    </div>
    
    <div class="input-group">
        <?= $form->field($product, 'image_url')->fileInput() ?>
    </div>

    <div class="categories-checkbox-list">
        <fieldset>
            <legend>Check product categories</legend>
            <?= Html::checkboxList("category", null, $categories, []); ?>
        </fieldset>
    </div>
    
    <hr/>
    
    <div class="input-group">
        <label>Choose prooduct distributor</label><br/>
        <?= Html::dropDownList("distributor", null, $distributors, [
            'class' => ''
        ]); ?>
    </div>
    
    <br/>
    
    <div class="form-group">
        <?= Html::submitButton('Create', [
            'class' => 'btn btn-success'
        ]); ?>
    </div>

</div>