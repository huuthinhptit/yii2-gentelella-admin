<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ConfigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Configs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <h1><?= Html::encode($this->title) ?></h1>
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>

        <div class="x_panel">
            <p>
                <?= Html::a('Create Config', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?php Pjax::begin(); ?>
            <?php $fileName = "configs" ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'pjax' => true,
                'pjaxSettings' => [
                    'options' => ['id' => 'kv-pjax-container'],
                ],
                'panel' => [
                    'type' => GridView::TYPE_DEFAULT,
                    'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-credit-card"></i> Configs</h3>',
                ],

                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'kartik\grid\SerialColumn'],

                    'id',
                    'key',
                    'value',
                    'describe',
                    [
                        'class' => 'kartik\grid\ActionColumn',
                    ],
                ],
                'showPageSummary' => true,
                'export' => [
                    'showConfirmAlert' => false,
                    'target' => GridView::TARGET_BLANK,
                ],
                'exportConfig' => [
                    GridView::CSV => [
                        'filename' => $fileName,
                    ],
                    GridView::PDF => [
                        'filename' => $fileName,
                    ],
                    GridView::EXCEL => [
                        'filename' => $fileName,
                    ],
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>