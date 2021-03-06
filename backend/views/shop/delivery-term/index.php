<?php
/**
 * Created by PhpStorm.
 * User: volynets
 * Date: 21.12.17
 * Time: 11:01
 */

/**@var \core\entities\Shop\DeliveryTerm[] $deliveryTerms */

use yii\data\ArrayDataProvider;
use yii\grid\ActionColumn;
use yii\helpers\Html;

$this->title = 'Delivery terms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="extra-statuses">
    <p>
        <?= Html::a('Create delivery term', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Delivery Terms</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?= yii\grid\GridView::widget([
                'dataProvider' => new ArrayDataProvider(['allModels' => $deliveryTerms]),
                'columns' => [
                    'id',
                    'name',
                    'value',
                    'external_id',
                    [
                        'class' => ActionColumn::class,  'template' => '{update} {delete}',
                        'buttons' => [
                            'update' => function ($url, $model, $index) {
                                return Html::a(
                                    '<span class="glyphicon glyphicon-pencil"></span>',
                                    \yii\helpers\Url::to(['update', 'id' => $model->id]), [
                                    'data-method' => 'post',
                                ]);
                            },
                            'delete' => function ($url, $model, $index) {
                                return Html::a(
                                    '<span class="glyphicon glyphicon-trash"></span>',
                                    \yii\helpers\Url::to(['delete', 'id' => $model->id]), [
                                    'data-method' => 'post',
                                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                ]);
                            },
                        ],
                    ]
                ]
            ]); ?>
        </div>
    </div>
</div>
