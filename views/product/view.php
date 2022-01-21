<?
/* @var $model app\models\mgcms\db\Product */

use yii\web\View;
$model->language = Yii::$app->language;
?>
<section class="service-wrapper">
    <div class="container">
        <div class="breadcrumb">
            <a href=""> <?= $model->category ?> </a>
            <span><?= $model->name ?></span>
        </div>
        <div class="service">
            <div class="training">
                <div>

                    <div id="SERVICE_SLIDER" class="owl-carousel owl-theme">
                        <? foreach ($model->fileRelations as $relation): ?>

                            <?if ($relation->json == '1' || !$relation->file || !$relation->file->isImage()) continue?>
                            <div class="item">
                                <img src="<?= $relation->file->getImageSrc(765)?>" alt=""/>
                                <? if ($model->company->thumbnail && $model->company->thumbnail->isImage()): ?>
                                    <img src="<?= $model->company->thumbnail->getImageSrc(0, 45) ?>" class="training__logo"/>
                                <? endif; ?>
                            </div>
                        <? endforeach ?>
                    </div>
                </div>
                <div>
                    <div class="training__badge"><?= Yii::t('db', 'PRODUCT') ?></div>
                    <div class="rating hidden">
                        Oceń:
                        <i
                                class="fa fa-star rating__star rating__star--active"
                                aria-hidden="true"
                        ></i>
                        <i
                                class="fa fa-star rating__star rating__star--active"
                                aria-hidden="true"
                        ></i>
                        <i
                                class="fa fa-star rating__star rating__star--active"
                                aria-hidden="true"
                        ></i>
                        <i
                                class="fa fa-star rating__star rating__star--active"
                                aria-hidden="true"
                        ></i>
                        <i
                                class="fa fa-star rating__star rating__star--active"
                                aria-hidden="true"
                        ></i>
                        <i
                                class="fa fa-star rating__star rating__star--active"
                                aria-hidden="true"
                        ></i>
                        <i class="fa fa-star rating__star" aria-hidden="true"></i>
                        <span class="rating__rate">(6,0)</span>
                    </div>
                    <h1><?= $model->name ?></h1>
                    <div class="hr"></div>
                    <div class="label"><?= Yii::t('db', 'Category') ?>:</div>


                    <? foreach (array_reverse($model->category->getCategoryTree()) as $category): ?>
                        <a href="<?= \yii\helpers\Url::to(['product/index', 'category' => $category->id]) ?>"> <?= Yii::t('db', (string)$category) ?></a>
                    <? endforeach ?>

                    <div class="hr"></div>
                    <div class="label"><?= Yii::t('db', 'Seller') ?>:</div>
                    <?= $model->company ?>
                    <div class="hr"></div>
                    <div class="training__prices">
                        <div>
                            <div class="label"><?= Yii::t('db', 'Price') ?> PLN:</div>
                            <?= $model->price ?> PLN / szt
                            <div class="hr"></div>
                        </div>
                        <div class="hidden">
                            <div class="label">Cena USD:</div>
                            - $
                            <div class="hr"></div>
                        </div>
                        <div class="hidden">
                            <div class="label">Cena NFT:</div>
                            <a href="">zapłać tokenami NFT</a>
                            <div class="hr"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service__content">
                <? if ($model->company->agents): ?>
                    <? foreach ($model->company->agents as $agent): ?>
                        <div class="contact-box">
                            <div class="person person--big">
                                <div>
                                    <img
                                            class="person__avatar person__avatar--small"
                                            src="/img/person.png"
                                            alt=""
                                    />
                                </div>
                                <div>
                                    <div class="person__role person__role--normal">
                                        <?= Yii::t('db', 'Contact agent') ?>
                                    </div>

                                </div>
                            </div>
                            <a href="tel:<?= $agent->phone ?>" class="btn btn--primary"><?= $agent->phone ?></a>
                            <a href="mailto:<?= $agent->email ?>" class="btn btn--primary"
                            ><?= $agent->email ?></a
                            >
                        </div>
                    <? endforeach ?>
                <? endif ?>

                <h3><?= Yii::t('db', 'Product description') ?></h3>
                <?=$model->description?>
                <h3><?= Yii::t('db', 'Specification') ?></h3>
                <?=$model->specification?>
                <div class="flex">
                    <?if(count($model->fileRelations)):?>
                    <div>
                        <h3><?= Yii::t('db', 'Multimedia') ?></h3>
                        <? foreach ($model->fileRelations as $relation): ?>
                            <?if ($relation->json != '1' || !$relation->file) continue?>
                            <a href="<?= $relation->file->getLinkUrl() ?>" class="btn btn--primary btn--small">
                                <?= $relation->file->origin_name?>
                            </a>
                        <? endforeach ?>
                    </div>
                    <?endif?>
                    <div class="hidden">
                        <h3>Udostpnij</h3>
                        <div class="social-icons social-icons--color">
                            <a class="social-icons__icon social-icons__icon--fb">
                                <img src="./svg/facebook.svg" alt=""/>
                            </a>
                            <a class="social-icons__icon social-icons__icon--tw">
                                <img src="./svg/twitter.svg" alt=""/>
                            </a>
                            <a class="social-icons__icon social-icons__icon--in">
                                <img src="./svg/instagram.svg" alt=""/>
                            </a>
                            <a class="social-icons__icon social-icons__icon--tik-tok">
                                <img src="./svg/tik-tok.svg" alt=""/>
                            </a>
                            <a class="social-icons__icon social-icons__icon--ln">
                                <img src="./svg/linkedin.svg" alt=""/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
