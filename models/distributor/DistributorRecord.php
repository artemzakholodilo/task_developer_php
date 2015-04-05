<?php
namespace app\models\distributor;

use yii\db\ActiveRecord;
use app\models\product\ProductRecord;

class DistributorRecord extends ActiveRecord
{
    private static $distributors = null;
    
    public static function tableName() {
        return "distributors";
    }
    
    public function behaviors() {
        return [
            'timestamp' => [
                'class' => \yii\behaviors\TimestampBehavior::className(),
            ],
            'blame' => [
                'class' => \yii\behaviors\BlameableBehavior::className()
            ],
        ];
    }

    public function rules() {
        return [
            ['id', 'number'],
            ['name', 'required'],
            ['name', 'unique'],
            ['name', 'string', 'max' => 256],
        ];
    }
    
    public function getProducts() {
        return $this->hasMany(ProductRecord::className(), 
                    [
                        'id' => 'product_id'
                    ]
        );
    }
    
    public static function getDistributors() {
        if (is_null(self::$distributors)) {
            self::$distributors = self::find()->all();
        }
        
        return self::$distributors;
    }

}