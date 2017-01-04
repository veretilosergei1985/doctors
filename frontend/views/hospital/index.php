<?php

use yii\widgets\ListView;
?>

<div class="container staff">
    <div class="tablenav top row">
        <div class="count left">
            <b><?= $listDataProvider->getTotalCount() < $hospitalPerPage ? $listDataProvider->getTotalCount() : $hospitalPerPage ?></b><span> hospitals from </span><b><?= $listDataProvider->getTotalCount(); ?></b><span> total</span>
        </div>
        <div class="sort right hidden-sm hidden-xs">
            <label>Sort BY:</label>
            <button type="button" class="buttonWithCaret">
                <span class="btn-name">Rating</span><span class="caret"></span>
            </button>
            <button type="button" class="buttonWithCaret">
                <span class="btn-name">Popular</span><span class="caret"></span>
            </button>
        </div>
    </div>
    <div class="clear"></div>
    <div class="profiles-loop row alternate">
        <div class="bg-ajax-loader">
            <img alt="loader image" src="img/ajax-loader.gif"/>
        </div>     

        <?= ListView::widget([
            'dataProvider' => $listDataProvider,
            'itemView' => '_list',
            'summary' => '',
            'layout' => "{items}",
            'itemOptions' => ['tag' => 'li', 'class' => 'hospital-item'],
            'options' => [
                'tag' => 'div',
                'class' => '',
            ]
        ]);
        ?>


        <div class="clear"></div>
    </div>
    <nav class="row">
        <?php echo \yii\widgets\LinkPager::widget([
            'pagination' => $listDataProvider->pagination,
            'options' => ['class' => 'pagination pagination-lg hidden-xs'],
            'maxButtonCount' => 3,
        ]); ?>
    </nav>
</div>