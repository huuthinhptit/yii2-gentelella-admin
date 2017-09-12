<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gt_config".
 *
 * @property string $id
 * @property string $key
 * @property string $value
 * @property string $describe
 */
class Config extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gt_config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key'],'unique'],
            [['key'], 'string', 'max' => 100],
            [['value'], 'string', 'max' => 150],
            [['describe'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'value' => 'Value',
            'describe' => 'Describe',
        ];
    }
}
