<?

use app\models\mgcms\db\Project;

$projects = Project::find()->all();


?>
<section class="world-map-container">
    <div class="container">
        <h1>Wybierz Twój Rynek lub Kraj</h1>
        <p>
            Meetfaces Trading będzie działać na ponad 90 rynkach. Sprawdź lokalne
            firmy i dowiedz się, jakie produkty dostępne są w Twoim regionie.
        </p>
        <div class="world-map">
            <img src="./svg/mapa_swiata.svg" alt="" />
            <div class="world-map__countries">
                <a class="world-map__country" href="">
                    <img src="./img/flaga_kanada.png" alt="" />
                    <div>Kanada</div>
                </a>
                <a class="world-map__country" href="">
                    <img src="./img/flaga_kuba.png" alt="" />
                    <div>Kuba</div>
                    <a class="world-map__country world-map__country--active" href="">
                        <img src="./img/flaga_meksyk.jpeg" alt="" />
                        <div>Meksyk</div>
                    </a>
                    <a class="world-map__country" href="">
                        <img src="./img/flaga_panama.png" alt="" />
                        <div>Panama</div>
                    </a>
                    <a class="world-map__country" href="">
                        <img src="./img/flaga_usa.svg" alt="" />
                        <div>Stany Zjednoczone</div>
                    </a>
                    <a class="world-map__country" href="">
                        <img src="./img/flaga_kanada.png" alt="" />
                        <div>Kanada</div>
                    </a>
                </a>
            </div>
        </div>
    </div>
</section>
