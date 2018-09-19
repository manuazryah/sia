<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

if (isset($service_details->meta_title) && $service_details->meta_title != '') {
    $this->title = $service_details->meta_title;
} else {
    $this->title = 'Services';
}
?>
<section id="banner">
    <div class="breadcrumb">
        <div class="container">
            <ul>
                <li><?= Html::a('Home', ['/site/index']) ?></li>
                <li><?= Html::a('Services', ['/site/services']) ?></li>
                <li><a class="current" href="javascript:void(0)"><?= $service_details->service_name ?></a></li>
            </ul>
            <h4 class="page-title"><?= $service_details->service_name ?></h4>
        </div>
    </div>
</section>

<section id="service-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <?= \common\components\ServiceMenuWidget::widget() ?>
            </div>
            <div class="col-lg-8">
                <div class="right-side">
                    <h1 class="heading"><?= $service_details->service_name ?></h1>
                    <?= $service_details->detailed_content ?>
                </div>
            </div>
        </div>
    </div>
</section>


