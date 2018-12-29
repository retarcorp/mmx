<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class ConstructorProduct extends Model
{

    public $category;
    public $socket;
    public $protected;

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['category', 'socket', 'protected'], 'required'],
            [['category'], 'integer'],
            [['socket', 'protected'], 'each', 'rule' => ['integer']]
        ];
    }

    public function activeAttributes()
    {
        return [
            'category' => 'Category',
            'socket' => 'Socket',
            'protected' => 'Protected'
        ];
    }


    public function getProducts()
    {
        $socketIds = implode(',', array_keys($this->socket));
        $socketCount = implode(',', array_values($this->socket));
        $protected = implode(',', $this->protected);


        if (isset($this->protected)) {
            $query = "select * from (
                      select * from socket_2_constructor
                      where socket_id in ({$socketIds})
                      and constructor_id in (select constructor_id
                                from protected_2_constructor
                                where protected_id in ({$protected})
                  ) and socket_2_constructor.count in ({$socketCount})
     ) as result
       left join constructor on constructor.id = result.constructor_id
       left join products on constructor.vendor_code = products.vendor_code
       where category = {$this->category}
group by products.vendor_code
";
        } else {
            $query = "select * from (
                      select * from socket_2_constructor
                      where socket_id in ({$socketIds})
                      and constructor_id in (select constructor_id
                                from protected_2_constructor
                                where protected_id in ({$protected})
                  ) and socket_2_constructor.count in ({$socketCount})
     ) as result
       left join constructor on constructor.id = result.constructor_id
       left join products on constructor.vendor_code = products.vendor_code
group by products.vendor_code
";
        }

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand($query);

        return $command->queryAll();
    }
}