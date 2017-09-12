<?php

/**
 *
 *
 */
namespace backend\models;

use common\models\Profile;
use yii\base\Model;
use Yii;
use yii\data\ArrayDataProvider;

class ProfileRegisterSearch extends Model
{

    public $startTime;
    public $endTime;
    public $time;
    public $mercharnt;

    public $yotel_id;
    public $reason_code;
    public $reason;
    public $match_id;
    public $type;
    public $data;
    public $deal_status;
    public $created_at;
    public $sync_at;

    public $page = 1;
    public $limit = 20;
    public $defaultPageSize = 20;
    public $totalCount = 0;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['startTime', 'endTime','time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [

        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }


    /**
     * Tim kiem theo ngay thang
     * @param $params
     */
    public function search($params)
    {
        $filters = array();

        $game_id =[];
        $gameIcashHistory = [];
        $this->load($params);
        $session = Yii::$app->session;

        if (!empty($this->startTime)) {
            $session->set('cur_start_time', $this->startTime);
        }

        if (!empty($this->endTime)) {
            $session->set('cur_end_time', $this->endTime);
        }

        $startTime = $this->startTime;
        $endTime = $this->endTime;

        //lấy các game_id của đại lý theo thời gian
        $partner = Profile::find()->select(['count(id) as num_register ', 'DATE_FORMAT(`created_at`, \'%Y-%m-%d\') as `register_at`'])
                                ->where(['status'=>1])
                                ->groupBy(['register_at'])
                                ->andWhere(['>=', 'created_at', $startTime . ' 00:00:00'])
                                ->andWhere(['<=', 'created_at', $endTime . ' 12:59:59'])
                                ->asArray()->all();

        // tim kiem theo start time va endtime
//        $filters[] = 'startTime=+' . $startTime->format('Y-m-d') ;
//        $filters[] = 'endTime=+'   . $endTime->format('Y-m-d');

        return new ArrayDataProvider([
            'key' => 'id',
            'sort' => [
                'attributes' => ['id', 'created_at'],
            ],
            'allModels' => $partner,
        ]);
    }
}
