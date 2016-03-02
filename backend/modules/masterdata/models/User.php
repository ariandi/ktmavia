<?php

namespace backend\modules\masterdata\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $FirstName
 * @property string $LastName
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $RoleID
 *
 * @property Role[] $roles
 * @property Rolestruc[] $rolestrucs
 * @property Role $role
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /*Field Tambahan*/
    //public $Role;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			['username', 'filter', 'filter' => 'trim'],
            [['FirstName', 'LastName', 'username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at', 'companyid', 'Role'], 'required'],
            [['status', 'created_at', 'updated_at', 'companyid'], 'integer'],
            [['FirstName', 'LastName', 'username', 'password_hash', 'password_reset_token', 'email', 'Role'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            //[['username'], 'unique'],
			['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'FirstName' => 'First Name',
            'LastName' => 'Last Name',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'companyid' => 'Company',
            'Role' => 'Role',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoles()
    {
        return $this->hasMany(Role::className(), ['createby' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRolestrucs()
    {
        return $this->hasMany(Rolestruc::className(), ['personid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
	public function getCompany()
    {
        return $this->hasOne(Company::className(), ['companyid' => 'companyid']);
    }
}
