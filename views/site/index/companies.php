<?
/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use yii\web\View;
use app\models\mgcms\db\Company;

$companies = Company::find()->all();

?>
<section class="companies-wrapper">
    <div class="container">
        <h1>Firmy</h1>
        <div class="companies">
            <?foreach($companies as $company):?>
                <a href="<?=$company->linkUrl?>" class="company">
                    <?if($company->thumbnail && $company->thumbnail->isImage()):?>
                        <img class="company__logo" src="<?=$company->thumbnail->getImageSrc(0, 70)?>" alt="" />
                    <?endif;?>
                    <div class="company__name"><?=$company->name?></div>
                    <div class="company__industry">
                        <div class="badge"><?=$company->category->name?></div>
                    </div>
                </a>

            <?endforeach;?>

        </div>
        <div class="text-center">
            <a href="#" class="btn btn--primary"> Załaduj więcej </a>
        </div>
    </div>
</section>
