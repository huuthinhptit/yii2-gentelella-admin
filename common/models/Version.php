<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gt_version".
 *
 * @property string $id
 * @property string $current_version
 * @property string $url_app
 * @property string $message_en
 * @property string $message_mm
 * @property integer $is_force_update
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class Version extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gt_version';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['current_version', 'url_app', 'message_en','message_mm'], 'required'],
            [['is_force_update', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['current_version'], 'string', 'max' => 50],
            [['url_app'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'current_version' => 'Current Version',
            'url_app' => 'Url App',
            'message_en' => 'Message En',
            'message_mm'    =>  'Message Mm',
            'is_force_update' => 'Is Force Update',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @inheritdoc
     */
    public function fields()
    {
        $fields = parent::fields();
        // remove fields that contain sensitive information
        unset($fields['created_at']);
        unset($fields['updated_at']);
        return $fields;
    }
}
