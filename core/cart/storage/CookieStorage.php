<?php
/**
 * Created by PhpStorm.
 * User: volynets
 * Date: 13.09.17
 * Time: 15:53
 */

namespace core\cart\storage;

use core\cart\CartItem;
use core\entities\Shop\Product\Product;
use Yii;
use yii\helpers\Json;
use yii\web\Cookie;
use yii\helpers\ArrayHelper;

class CookieStorage implements StorageInterface
{
    private $key;
    private $timeout;

    public function __construct($key, $timeout)
    {
        $this->key = $key;
        $this->timeout = $timeout;
    }

    public function load(): array
    {

        if ($cookie = Yii::$app->request->cookies->get($this->key)) {
            return array_filter(array_map(function (array $row) {
                if (isset($row['p'], $row['q']) && $product = Product::find()->active()->andWhere(['id' => $row['p']])->one()) {
                    /** @var Product $product */
                    return new CartItem($product, array_map(function($modificationId) use ($product){
                            return $product->getModificationAssign($modificationId);
                        }, Json::decode($row['m'])) ?? null, $row['q']);
                }
                return false;
            }, Json::decode($cookie->value)));
        }
        return [];
    }

    public function save(array $items): void
    {
        Yii::$app->response->cookies->add(new Cookie([
            'name' => $this->key,
            'value' => Json::encode(array_map(function (CartItem $item) {
                return [
                    'p' => $item->getProductId(),
                    'm' => Json::encode(ArrayHelper::getColumn($item->getModifications(), 'id')),
                    'q' => $item->getQuantity(),
                ];
            }, $items)),
            'expire' => time() + $this->timeout,
        ]));
    }
}