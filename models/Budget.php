<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Budget extends ActiveRecord{

  //public $id;



  public function rules()
    {
      return [
                [['type', 'sum'], 'required', 'message' => 'Заполните это поле'],
                [['category','date'], 'safe'],
          ];
        }

  public static function tableName()
    {
        return '{{buget}}';
    }

  public function attributeLabels()
  {
    return [
            'category' => 'Категория',
            'type' => 'Тип',
            'date' => 'Дата',
            'sum' => 'Сумма',
          ];
  }

  public function addBudget(){

  }

  private function setNegative($sum)
  {
    return (-1 * $sum);
  }


  public function beforeSave($insert)
        {
          if($this->type == 'out'){
            $this->sum = $this::setNegative($this->sum);

          }


          $date = strtotime($this->date);
          $this->date = date('Y-m-d', $date);
          //settype($this->type, "string");
          //settype($this->category, "string");

        //settype($this->sum, "int");



        //  if($this->type == 'Доход'){
        //    $this->type = 'in';
        //  }
          return parent::beforeSave($insert);
        }


    public function getAll()
    {

    }

}
