<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ContactInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contact Information';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-info-index">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


                </div>
                <div class="panel-body">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= Html::a('<i class="fa-th-list"></i><span> Create Contact Info</span>', ['create'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
//                                                            'id',
                            [
                                'attribute' => 'dubai_office_address',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    return wordwrap($data->dubai_office_address, 50, "<br />\n");
                                },
                            ], [
                                'attribute' => 'sharjah_office_address',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    return wordwrap($data->sharjah_office_address, 50, "<br />\n");
                                },
                            ],
                            'phone',
                            'webpage',
                            // 'email:email',
                            // 'status',
                            // 'CB',
                            // 'UB',
                            // 'DOC',
                            ['class' => 'yii\grid\ActionColumn',
                                'template' => '{update}'],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


