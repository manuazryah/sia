<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OurClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Our Clients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="our-client-index">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


                </div>
                <div class="panel-body">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= Html::a('<i class="fa-th-list"></i><span> Add Client</span>', ['create'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
//                                                            'id',
                            [
                                'attribute' => 'logo',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    if (!empty($data->logo))
                                        $img = '<img src="' . Yii::$app->homeUrl . '../uploads/our_clients/' . $data->id . '/small.' . $data->logo . '"/>';
                                    return $img;
                                },
                            ],
                            'client_name',
                            [
                                'attribute' => 'status',
                                'value' => function($model, $key, $index, $column) {
                                    if ($model->status == '0') {
                                        return 'Disabled';
                                    } elseif ($model->status == '1') {
                                        return 'Enabled';
                                    }
                                },
                                'filter' => [0 => 'Disabled', 1 => 'Enabled'],
                            ],
                            // 'CB',
                            // 'UB',
                            // 'DOC',
                            // 'DOU',
                            ['class' => 'yii\grid\ActionColumn',
                                'template' => '{update}{delete}'],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


