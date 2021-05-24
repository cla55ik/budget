
<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
 ?>



<?php $form = ActiveForm::begin() ?>
<?= $form->field($model,'date')->textInput(['type' => 'date']); ?>
<?= $form->field($model,'type')->radioList(['in' => 'Доход', 'out'=>'Расход']);?>
<?= $form->field($model,'category')->radioList(['client' => 'Клиенты', 'flat' => 'Квартира', 'other' => 'Другое']);  ?>
<?= $form->field($model,'sum')->textInput(['type' => 'text']); ?>
<?= $form->field($model,'comment')->textInput(['type' => 'text']); ?>
<?= Html::submitButton('Сохранить',['class'=>'btn btn-success'])?>
<?php ActiveForm::end() ?>
