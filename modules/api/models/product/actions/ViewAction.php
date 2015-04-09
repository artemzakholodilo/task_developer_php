<?php
namespace app\modules\api\models\product\actions;

use Yii;
use yii\data\ActiveDataProvider;
use yii\rest\ViewAction as BaseAction;

class ViewAction extends BaseAction
{
    public function run($id) {
        $model = $this->findModel($id);
        
        if ($this->checkAccess) {
            call_user_func($this->checkAccess, $this->id, $model);
        }
        
        $response = [
            'product' => $model,
            'categories' => $model->categories,
        ];
        
        return $response;
    }
}
