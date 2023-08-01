<?
/* @var $items \app\models\mgcms\db\User[] */
$currentUserId = Yii::$app->getRequest()->getQueryParam('CompanySearch')['created_by'];
?>

<ol class="dd-list">
    <?php foreach ($items as $item): ?>
        <li class="dd-item" data-id="<?php echo $item->id ?>">
            <div class="dd-handle <?= $currentUserId == $item->id ? 'active' : '' ?>"
                 data-user-id="<?= $item->id ?>"><?php echo $item ?> </div>
            <?php if (!empty($item->children)): ?>
                <?php echo $this->render('_submenu', array('items' => $item->children)); ?>
            <?php endif ?>
        </li>
    <?php endforeach ?>
</ol>
