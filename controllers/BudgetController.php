<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\Budget;

class BudgetController extends Controller{


  public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),

                'rules' => [
                    [
                        'actions' => [
                            'index',
                            'create',
                            'sort',
                            'sort-in',
                            'sort-out',
                            'delete'
                          ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
          ];
      }

  public function actionIndex()
  {
      $all_budgets = Budget::find()
                        ->orderBy('date')
                        ->asArray()
                        ->all();


      return $this->render('index', ['all_budgets'=>$all_budgets]);
  }

  public function actionSort($date_start, $date_end)
  {

    $model = Budget::find()
                      ->Where(['>=', 'date', $date_start])
                      ->andWhere(['<=', 'date', $date_end])
                      ->asArray()
                      ->all();
    return $this->render('/budget/index', ['all_budgets'=>$model]);
  }

  public function actionSortIn()
  {
    $model = Budget::find()
                ->where(['type'=>'in'])
                ->asArray()
                ->all();

    return $this->render('index', ['all_budgets'=>$model]);

  }

  public function actionSortOut()
  {
    $model = Budget::find()
                ->where(['type'=>'out'])
                ->asArray()
                ->all();

    return $this->render('index', ['all_budgets'=>$model]);

  }


  public function actionCreate()
  {
    $model = new Budget();

  //  $model->date = date('Y-m-d H:i:s');


    if($model->load(Yii::$app->request->post()) && $model->save()) {
      return $this->render('create', ['model' => $model]);
    }else if($model->save()){
      Yii::$app->session->setFlash('error', 'Ошибка');
    }
Yii::$app->session->setFlash('success', 'success');
      return $this->render('create', ['model' => $model]);
  }


  public function actionDelete($id){
    $budget = Budget::findOne(['id' => $id]);
    $budget->delete();
    Yii::$app->session->setFlash('PostDeleted');
    return $this->redirect(Yii::$app->request->referrer);
  }



}
