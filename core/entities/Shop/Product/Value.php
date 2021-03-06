<?php
/**
 * Created by PhpStorm.
 * User: volynets
 * Date: 16.08.17
 * Time: 15:53
 */

namespace core\entities\Shop\Product;

use core\entities\Shop\Characteristic\Characteristic;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * Class Value
 * @package core\entities\Shop\Product
 * @property integer $characteristic_id
 * @property string $value
 *
 * @property Characteristic $characteristic
 * Сущьность описывает значения какойто одной характеристики (атрибута) продукта.
 */
class Value extends ActiveRecord
{
    public static function create($characteristicId, $value): self
    {
        $object = new static();
        $object->characteristic_id = $characteristicId;
        $object->value = $value;
        return $object;
    }

    public static function blank($characteristicId): self
    {
        $object = new static();
        $object->characteristic_id = $characteristicId;
        return $object;
    }

    public function change($value): void
    {
        $this->value = $value;
    }

    public function isForCharacteristic($id): bool
    {
        return $this->characteristic_id == $id;
    }

    public function getCharacteristic(): ActiveQuery
    {
        return $this->hasOne(Characteristic::class, ['id' => 'characteristic_id']);
    }

    public static function tableName(): string
    {
        return '{{%shop_values}}';
    }

}