<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Country */

$this->title = Yii::t('common','Update Country'). $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common','Country'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->code]];
$this->params['breadcrumbs'][] = Yii::t('common','Update Country');
?>
<div class="country-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
