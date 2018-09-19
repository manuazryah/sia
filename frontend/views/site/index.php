<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = '';
if (isset($meta_tags->meta_title) && $meta_tags->meta_title != '') {
    $this->title = $meta_tags->meta_title;
} else {
    $this->title = 'Avensia Home';
}
?>

<div id="bootstrap-touch-slider" class="bs-slider carousel-fade carousel slide control-round indicators-line"  data-ride="carousel" data-pause="hover" data-interval="5000">
    <ol class="carousel-indicators">
        <?php
        if (!empty($sliders)) {
            $i = 0;
            foreach ($sliders as $slider) {
                ?>
                <li data-target="#bootstrap-touch-slider" data-slide-to="<?= $i ?>" class="<?= $i == 0 ? 'active' : '' ?>"></li>
                <?php
                $i++;
            }
        }
        ?>
    </ol>
    <div class="carousel-inner">
        <?php
        if (!empty($sliders)) {
            $j = 0;
            foreach ($sliders as $slider) {
                ?>
                <div class="carousel-item <?= $j == 0 ? 'active' : '' ?>">
                    <img class="d-block img-fluid" src="<?= yii::$app->homeUrl ?>uploads/sliders/<?= $slider->id ?>/<?= $slider->id ?>.<?= $slider->image ?>" alt="First slide">
                </div>
                <?php
                $j++;
            }
        }
        ?>
    </div>
</div>

<section id="about-sec">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main-heading">
                    <span class="title">Why you choose</span>
                    <h3 class="heading">SIA accounting and auditing?</h3>
                </div>
                <?= $common_contents->why_you_choose ?>
            </div>
        </div>
        <div class="features">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="round-box">
                        <round><icon><img class="img-fluid" src="<?= yii::$app->homeUrl ?>images/icons/one-step-protection.png" width="48" height="48"/></icon></round>
                        <span>One Stop for Perfection</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="round-box">
                        <round><icon><img class="img-fluid" src="<?= yii::$app->homeUrl ?>images/icons/features-icon2.png" width="48" height="48"/></icon></round>
                        <span>Dedicated Team</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="round-box">
                        <round><icon><img class="img-fluid" src="<?= yii::$app->homeUrl ?>images/icons/features-icon3.png" width="48" height="48"/></icon></round>
                        <span>Free Consultation</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="round-box">
                        <round><icon><img class="img-fluid" src="<?= yii::$app->homeUrl ?>images/icons/features-icon4.png" width="48" height="48"/></icon></round>
                        <span>24/7 Support</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="services-sec">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main-heading">
                    <span class="title">sia Services</span>
                    <h3 class="heading">Our Services Range</h3>
                </div>
            </div>
        </div>
        <div class="services">
            <div class="row">
                <?php
                if (!empty($services)) {
                    foreach ($services as $service) {
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="service-box">
                                <?= Html::a('<img src="' . yii::$app->homeUrl . 'uploads/services/' . $service->id . '/' . $service->id . '.' . $service->service_image . '" class="img-fluid"/>', ['/site/service-details', 'service' => $service->canonical_name], ['class' => 'img-box']) ?>
                                <div class="content-box">
                                    <h5 class="title"><?= $service->service_name ?></h5>
                                    <p class="content">
                                        <?= $service->small_content ?>
                                    </p>
                                </div>
                                <?= Html::a('Read more', ['/site/service-details', 'service' => $service->canonical_name], ['class' => 'read-more']) ?>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>

<section id="contact-sec">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="heading">We are Here to Provide </h2>
                <p class="info">you with superior professional services that needed your business to grow and develop and help you to achieve your financial goals.</p>
            </div>
            <form class="col-12 contact-enquiry" method="post">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group required">
                            <input placeholder="Name" type="text" class="form-control" id="name" name="name" aria-required="true" required>
                        </div> 
                        <div class="form-group required">
                            <input placeholder="Email" type="email" class="form-control" id="email" name="email" aria-required="true" required>
                        </div> 
                        <div class="form-group required">
                            <input placeholder="Phone Holder" type="tel" class="form-control" id="phone" name="phone" aria-required="true" required>
                        </div> 
                        <div class="form-group">
                            <select class="form-control" name="service" id="service" required>
                                <option value="" disabled="" selected="">Select Service</option>
                                <?php
                                if (!empty($services)) {
                                    foreach ($services as $service) {
                                        if (!empty($service)) {
                                            ?>
                                            <option value="<?= $service->service_name ?>"><?= $service->service_name ?></option>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </select>                      
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <textarea placeholder="Message" cols="6" rows="5" class="form-control" id="message" name="message" required></textarea>
                        </div>
                        <button type="submit" id="contact_form_submit" name="contact_submit" class="button send-mail">Send request!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<section id="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="carousel-controls testimonial-carousel-controls">
                    <div class="testimonial-carousel">
                        <?php
                        if (!empty($testimonials)) {
                            foreach ($testimonials as $testimonial) {
                                if (!empty($testimonial)) {
                                    ?>
                                    <div class="one-slide mx-auto">
                                        <div class="testimonial text-center d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                                            <div class="author-dp">
                                                <img src="<?= yii::$app->homeUrl ?>uploads/testimonial/<?= $testimonial->id ?>/<?= $testimonial->id ?>.<?= $testimonial->image ?>" width="122" height="122" class="img-fluid"/>
                                            </div>
                                            <div class="message">
                                                <?= $testimonial->message ?>
                                            </div>
                                            <div class="author-detail">
                                                <h5 class="author-name"><?= $testimonial->name ?></h5>
                                                <span class="author-designation"><?= $testimonial->customr_type ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="brands">
    <div class="brands-slider">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="carousel-controls brands-carousel-controls">
                        <div class="control d-flex align-items-center justify-content-center prev mt-3"><img src="images/icons/back.png" class="img-fluid"/></div>
                        <div class="control d-flex align-items-center justify-content-center next mt-3"><img src="images/icons/next.png" class="img-fluid"/></div>

                        <div class="brands-carousel">
                            <?php
                            if (!empty($clients)) {
                                foreach ($clients as $client) {
                                    if (!empty($client)) {
                                        ?>
                                        <div class="one-slide mx-auto">
                                            <div class="brands text-center d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                                                <img src="<?= yii::$app->homeUrl ?>uploads/our_clients/<?= $client->id ?>/<?= $client->id ?>.<?= $client->logo ?>" class="img-fluid"/>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>