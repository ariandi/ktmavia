<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\masterdata\models\AuthItem;
use backend\modules\masterdata\models\Company;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $model backend\modules\masterdata\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

   <?= $form->field($model, 'Role')->dropDownList(
            ArrayHelper::map(AuthItem::findAll(['type' => '1',]),'name','name'),
            ['prompt'=>'Select Role']
        ) ?>

   <?= $form->field($model, 'companyid')->dropDownList(
            ArrayHelper::map(Company::find()->all(),'companyid','companyname'),
            ['prompt'=>'Select Company']
        ) ?>
		
    <?= $form->field($model, 'FirstName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LastName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>    

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    
    <?php if(!$model->isNewRecord)
    {
        //echo Html::a('Click Here To Change Password',['/changpassword/', 'id' => 'asdad'],);
        echo Html::a('Click Here To Change Password', 
        ['user/cpassword', 'id' =>$model->id]);
    }
    else
    {
        echo $form->field($model, 'password_hash')->textInput(['maxlength' => true]);
    }
    ?>

    <br />
    <br />

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>