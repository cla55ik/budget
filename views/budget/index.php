<?php

  use yii\widgets\ActiveForm;
  use yii\helpers\Html;


  $this->title = 'Бюджет';
 ?>




<div class="container">
  <h1>Бюджет</h1>
  <div class="row">
    <span><?= Html::a('Добавить', ['create'], ['class'=>'btn btn-success']);?></span>
  </div>
</div>

<div class="row">
  <div class="col-lg-1">
    ID
  </div>
  <div class="col-lg-2">
    Тип
  </div>
  <div class="col-lg-2">
    Категория
  </div>
  <div class="col-lg-2">
    Сумма
  </div>
  <div class="col-lg-3">
    Дата
  </div>
  <div class="col-lg-2">

  </div>
</div>
  <?php foreach ($all_budgets as $budget): ?>
    <div class="row">
      <div class="col-lg-1">
        <?= $budget['id'];  ?>
      </div>
      <div class="col-lg-2">
        <?php if($budget['type'] == 'in'){
          echo "Доход";
        } else {echo "Расход";}; ?>
      </div>
      <div class="col-lg-2">
        <?= $budget['category'];  ?>
      </div>
      <div class="col-lg-2">
        <?= $budget['sum'];  ?>
      </div>
      <div class="col-lg-3">
        <?= $budget['date'];  ?>
      </div>
      <div class="col-lg-2">
        <?= Html::a('Удалить', ['/budget/delete', 'id' => $budget['id']], ['class'=>'btn btn-warning']);?>
      </div>
    </div>

  <?php endforeach; ?>
  <div class="">

  </div>
