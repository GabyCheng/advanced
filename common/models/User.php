<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use common\components\DZActiveRecord;
use yii\filters\RateLimitInterface;


/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property int $sex
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends DZActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;

//    # 速度控制  6秒内访问3次，注意，数组的第一个不要设置1，设置1会出问题，一定要
//    #大于2，譬如下面  6秒内只能访问三次
//    # 文档标注：返回允许的请求的最大数目及时间，例如，[100, 600] 表示在600秒内最多100次的API调用。
//    public  function getRateLimit($request, $action){
//        return [3, 6];
//    }
//    # 文档标注： 返回剩余的允许的请求和相应的UNIX时间戳数 当最后一次速率限制检查时。
//    public  function loadAllowance($request, $action){
//        //return [1,strtotime(date("Y-m-d H:i:s"))];
//        //echo $this->allowance;exit;
//        return [$this->allowance, $this->allowance_updated_at];
//    }
//    # allowance 对应user 表的allowance字段  int类型
//    # allowance_updated_at 对应user allowance_updated_at  int类型
//    # 文档标注：保存允许剩余的请求数和当前的UNIX时间戳。
//    public  function saveAllowance($request, $action, $allowance, $timestamp){
//        $this->allowance = $allowance;
//        $this->allowance_updated_at = $timestamp;
//        $this->save();
//    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
       // return '{{%dz_user}}';
        return 'dz_user';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            [['username'], 'unique', 'message' => '用户名已被占用'],
            [['email'], 'unique', 'message' => '邮箱已被占用'],
            [['mobile'], 'unique', 'message' => '手机已被占用'],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

//    /**
//     * @inheritdoc
//     */
//    public static function findIdentityByAccessToken($token, $type = null)
//    {
//        return static::findOne(['access_token' => $token]);
//      //  throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
//    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // 如果token无效的话，
        if(!static::apiTokenIsValid($token))
        {
            throw new \yii\web\UnauthorizedHttpException("token is invalid.");
        }

        return static::findOne(['access_token' => $token, 'status' => self::STATUS_ACTIVE]);
        // throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }


    /**
     * 生成 api_token
     */
    public function generateApiToken()
    {
        $this->access_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * api获取access_token
     * api退出, 前期退出不更新access-token, 任何平台都可以登录用户的账号,便于调试,而且不会导致用户登录的token失效
     * 后期如果要实现单点登录时,则清空用户的token即可
     * @return string|null
     */
    public function getAccessToken()
    {
        $this->generateApiToken();
        if(!$this->save()){
            throw new DbException($this->errorsToString());
        }
        return $this->access_token;
    }

    /**
     * 校验api_token是否有效
     */
    public static function apiTokenIsValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.apiTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by mobile
     *
     * @param string $mobile
     * @param int $status 如果为null, 则不过滤status
     * @return self|null
     */
    public static function findOneByMobile($mobile, $status=1)
    {
        if($status === null)
            return self::findOne(['mobile' => $mobile]);
        else
            return self::findOne(['mobile' => $mobile, 'status' => $status]);
    }

    public static function findOneByEmail($email, $status=1)
    {
        if($status === null)
            return self::findOne(['email' =>$email]);
        else
            return self::findOne(['email' => $email, 'status' => $status]);
    }

    /**
     * Finds user by wx_open_id
     *
     * @param string $wx_open_id
     * @param int $status 如果为null, 则不过滤status
     * @return self|null
     */
    public static function findOneByWxopenid($wx_open_id, $status=1)
    {
        if($status === null) {
            return self::findOne(['wx_open_id' => $wx_open_id]);
        }else {
            return self::findOne(['wx_open_id' => $wx_open_id, 'status' => $status]);
        }
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }



    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function getCompany(){
        return $this->hasOne(UserCompany::className(),['user_id'=>'id']);
    }

    public function getResumeCert(){
        return $this->hasOne(ResumeCert::className(),['user_id'=>'id']);
    }
    public function getResumeCompany(){
        return $this->hasOne(ResumeCompany::className(),['user_id'=>'id']);
    }
    public function getResumeEdu(){
        return $this->hasOne(ResumeEdu::className(),['user_id'=>'id']);
    }
    public function getResumeJob(){
        return $this->hasOne(ResumeJob::className(),['user_id'=>'id']);
    }
    public function getResumeOther(){
        return $this->hasOne(ResumeOther::className(),['user_id'=>'id']);
    }
    public function getResumeProject(){
        return $this->hasOne(ResumeProject::className(),['user_id'=>'id']);
    }
}
