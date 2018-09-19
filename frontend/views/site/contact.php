<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

if (isset($meta_tags->meta_title) && $meta_tags->meta_title != '') {
    $this->title = $meta_tags->meta_title;
} else {
    $this->title = 'Contact Us';
}
?>
<section id="banner">
    <div class="breadcrumb">
        <div class="container">
            <ul>
                <li><?= Html::a('Home', ['/site/index']) ?></li>
                <li><a class="current" href="javascript:void(0)">Contact us</a></li>
            </ul>
            <h4 class="page-title">Contact us</h4>
        </div>
    </div>
</section>

<section id="contact-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 pull-lg-12 order-two">
                <h3 class="module-header">Contact Form</h3>
                <form class="contact-form contact-enquiry" method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <i class="fa fa-user highlight2" aria-hidden="true"></i>
                                <input type="text" aria-required="true" size="30" value="" name="name" id="name" class="form-control" placeholder="Full Name" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <i class="fa fa-phone highlight2" aria-hidden="true"></i>
                                <input type="text" aria-required="true" size="30" value="" name="phone" id="phone" class="form-control" placeholder="Phone Number" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <i class="fa fa-envelope highlight2" aria-hidden="true"></i>
                                <input type="email" aria-required="true" size="30" value="" name="email" id="email" class="form-control" placeholder="Email Address" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <i class="fa fa-flag highlight2" aria-hidden="true"></i>
                                <select class="form-control" name="service" required>
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
                        <div class="col-sm-12">
                            <div class="form-group">
                                <i class="fa fa-comment highlight2" aria-hidden="true"></i>
                                <textarea aria-required="true" rows="3" cols="45" name="message" id="message" class="form-control" placeholder="Message" required></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 mbtm0">
                            <div class="contact-form-submit">
                                <button type="submit" id="contact_form_submit" name="contact_submit" class="button">Send request!</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 push-lg-12 order-one">
                <div class="with_border with_padding">
                    <ul class="list1 no-bullets no-top-border no-bottom-border">

                        <li>
                            <div class="media">
                                <div class="media-left">
                                    <i class="far fa-building highlight fontsize_18"></i>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading grey">Dubai Office:</h5>
                                    <?= $contact_info->dubai_office_address ?>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <div class="media-left">
                                    <i class="far fa-building highlight fontsize_18"></i>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading grey">Sharjah Office:</h5>
                                    <?= $contact_info->sharjah_office_address ?>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <div class="media-left">
                                    <i class="fas fa-mobile-alt highlight fontsize_18"></i>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading grey">Phone:</h5>
                                    <?= $contact_info->phone ?>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <div class="media-left">
                                    <i class="far fa-envelope highlight fontsize_18"></i>
                                </div>
                                <div class="media-body greylinks">
                                    <h5 class="media-heading grey">Email:</h5>
                                    <a href="mailto:<?= $contact_info->email ?>"><?= $contact_info->email ?></a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <div class="media-left">
                                    <i class="fas fa-globe highlight fontsize_18"></i>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading grey">Webpage:</h5>
                                    <a target="blank" href="http://<?= $contact_info->webpage ?>">Web : <?= $contact_info->webpage ?></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
