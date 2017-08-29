<?php
/**
 * Created by PhpStorm.
 * User: volynets
 * Date: 28.08.17
 * Time: 12:17
 */


/* @var $this yii\web\View */
/* @var $model core\forms\manage\Shop\CategoryForm */

$this->title = 'Create Category';
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
