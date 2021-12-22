<?

use app\widgets\NobleMenu;
use yii\helpers\Html;
use \app\components\mgcms\MgHelpers;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */

$isHomePage = $this->context->id == 'site' && $this->context->action->id == 'index';

$menu = new NobleMenu(['name' => 'header_' . Yii::$app->language, 'loginLink' => false]);

?>
<div class="menu-wrapper">
    <div class="container">
        <div class="menu">
            <a href="/">
                <img
                        class="menu__logo"
                        src="/img/logo_meetfaces_trading.png"
                        alt=""
                />
            </a>

            <div>
                <div class="arr-down">
                    <div class="dropdown">
                        <a href="#">Więcej o MFT</a>
                        <a href="#">Dla inwestorów</a>
                        <a href="#">Produkty w promocji</a>
                        <a href="#">Jak kupić reklamy?</a>
                    </div>
                </div>
            </div>
            <div class="search-wrapper">
                <form action="./wyniki-wyszukiwania.html">
                    <input
                            type="text"
                            placeholder="Filmy, usługi, produkty, NIP, REGON, KRS..."
                            class="search"
                    />
                    <img class="search-wrapper__icon" src="/svg/lupa.svg" alt="" />
                </form>
            </div>
            <div>
                <a class="btn btn--secondary" href="./register.html"
                >Zarejestruj się</a
                >
            </div>
            <div>
                <a class="btn btn--primary" href="./login.html">Zaloguj się</a>
            </div>
            <div class="language-select">
                <img
                        class="language-select__selected-lang"
                        src="/img/flaga_pl.png"
                        alt=""
                />
                <div class="dropdown">
                    <img
                            class="language-select__selected-lang"
                            src="/img/flaga_panama.png"
                            alt=""
                    />
                    <img
                            class="language-select__selected-lang"
                            src="/img/flaga_kanada.png"
                            alt=""
                    />
                </div>
            </div>
        </div>
    </div>
</div>

