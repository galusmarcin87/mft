<?php
/* @var $this yii\web\View */

/* @var $models \app\models\mgcms\db\Product[] */

use app\extensions\mgcms\yii2TinymceWidget\TinyMce;
use yii\helpers\Html;
use app\components\mgcms\MgHelpers;
use \yii\helpers\Url;
use yii\bootstrap\ActiveForm;



?>
<section class="companies-wrapper companies-wrapper--dashboard">
    <div class="container">
        <div class="search-results search-results--dashboard">
            <?= $this->render('_leftMenu') ?>
            <div>
                <div class="dashboard-wrapper">
                    <h1 class="text-left">Lista przedstawicieli</h1>
                    <div class="flex">
                        <div>
                            <div class="search-wrapper search-wrapper--small">
                                <form action="./wyniki-wyszukiwania.html">
                                    <input type="text" placeholder="Szukaj" class="search" />
                                    <img
                                            class="search-wrapper__icon"
                                            src="/svg/lupa.svg"
                                            alt=""
                                    />
                                </form>
                            </div>
                        </div>
                        <div class="text-right">
                            <a class="btn btn--secondary">+ Dodaj</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="person-list person-list-header">
                            <div class="text-left">Zdjecie</div>
                            <div class="text-left sort">
                                Nazwa
                                <i class="fa fa-sort" aria-hidden="true"></i>
                            </div>
                            <div>Widoczność</div>
                            <div>Edytuj</div>
                            <div>Usuń</div>
                            <div>Zobacz</div>
                        </div>
                        <div class="contact-box contact-box--light">
                            <div class="person person--big person-list">
                                <div class="text-left">
                                    <img
                                            class="person__avatar person__avatar--small"
                                            src="./img/person.png"
                                            alt=""
                                    />
                                </div>
                                <div class="text-left">Jan nowak</div>
                                <div>
                                    <div>
                                        <input
                                                type="checkbox"
                                                class="checkbox"
                                                name="zapamietaj"
                                                id="check-1"
                                        />
                                        <label for="check-1"></label>
                                    </div>
                                </div>
                                <div>
                                    <a href="">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div>
                                    <a href="">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div>
                                    <a href="">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="contact-box contact-box--light">
                            <div class="person person--big person-list">
                                <div class="text-left">
                                    <img
                                            class="person__avatar person__avatar--small"
                                            src="./img/person.png"
                                            alt=""
                                    />
                                </div>
                                <div class="text-left">Jan nowak</div>
                                <div>
                                    <div>
                                        <input
                                                type="checkbox"
                                                class="checkbox"
                                                name="zapamietaj"
                                                id="check-1"
                                        />
                                        <label for="check-1"></label>
                                    </div>
                                </div>
                                <div>
                                    <a href="">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div>
                                    <a href="">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div>
                                    <a href="">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="contact-box contact-box--light">
                            <div class="person person--big person-list">
                                <div class="text-left">
                                    <img
                                            class="person__avatar person__avatar--small"
                                            src="./img/person.png"
                                            alt=""
                                    />
                                </div>
                                <div class="text-left">Jan nowak</div>
                                <div>
                                    <div>
                                        <input
                                                type="checkbox"
                                                class="checkbox"
                                                name="zapamietaj"
                                                id="check-1"
                                        />
                                        <label for="check-1"></label>
                                    </div>
                                </div>
                                <div>
                                    <a href="">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div>
                                    <a href="">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div>
                                    <a href="">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="contact-box contact-box--light">
                            <div class="person person--big person-list">
                                <div class="text-left">
                                    <img
                                            class="person__avatar person__avatar--small"
                                            src="./img/person.png"
                                            alt=""
                                    />
                                </div>
                                <div class="text-left">Jan nowak</div>
                                <div>
                                    <div>
                                        <input
                                                type="checkbox"
                                                class="checkbox"
                                                name="zapamietaj"
                                                id="check-1"
                                        />
                                        <label for="check-1"></label>
                                    </div>
                                </div>
                                <div>
                                    <a href="">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div>
                                    <a href="">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div>
                                    <a href="">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
