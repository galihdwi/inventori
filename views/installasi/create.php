<?php

use yii\helpers\Html;

$this->title = 'Create Installasi';
$this->params['breadcrumbs'][] = ['label' => 'Installasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="installasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
