<?

/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;

$continents = [
    0 => MgHelpers::getSettingsArray('kontynent - ameryka pólnocna'),
    1 => MgHelpers::getSettingsArray('kontynent - ameryka południowa'),
    2 => MgHelpers::getSettingsArray('kontynent - euroazja'),
    3 => MgHelpers::getSettingsArray('kontynent - afryka'),
    4 => MgHelpers::getSettingsArray('kontynent - australia'),
]
?>
<section class="world-map-container">
    <div class="container">
        <h1>Wybierz Twój Rynek lub Kraj</h1>
        <p>
            Meetfaces Trading będzie działać na ponad 90 rynkach. Sprawdź lokalne
            firmy i dowiedz się, jakie produkty dostępne są w Twoim regionie.
        </p>
        <div class="world-map">
            <div class="map-container">
                <img
                        class="continent continent__1"
                        src="/svg/mapa_kontynent1.svg"
                        alt=""
                        onclick="showContinent(0)"
                />
                <img
                        class="continent continent__2"
                        src="/svg/mapa_kontynent2.svg"
                        alt=""
                        onclick="showContinent(1)"
                />
                <img
                        class="continent continent__3"
                        src="/svg/mapa_kontynent3.svg"
                        alt=""
                        onclick="showContinent(2)"
                />
                <img
                        class="continent continent__4"
                        src="/svg/mapa_kontynent4.svg"
                        alt=""
                        onclick="showContinent(3)"
                />
                <img
                        class="continent continent__5"
                        src="/svg/mapa_kontynent5.svg"
                        alt=""
                        onclick="showContinent(4)"
                />
            </div>

            <? foreach ($continents as $continentIndex => $countries): ?>
                <div class="world-map__countries" id="country_<?= $continentIndex ?>" style="display: none">
                    <? foreach ($countries as $country): ?>
                        <a class="world-map__country"
                           href="<?= \yii\helpers\Url::to(['/company/index', 'country' => $country]) ?>">
                            <img src="<?= MgHelpers::getSetting('flaga - ' . $country) ?>" alt=""/>
                            <div><?= Yii::t('db', $country) ?></div>
                        </a>
                    <? endforeach ?>
                </div>
            <? endforeach ?>

        </div>
    </div>
</section>

<script>
  function showContinent (index) {
    $('.world-map__countries').hide();
    $('#country_' + index).show();
  }
</script>
