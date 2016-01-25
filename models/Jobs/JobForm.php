<?php

namespace app\models\jobs;
use Yii;
use yii\base\Model;

/**
 * JobForm is the model behind the contact form.
 */
class JobForm extends Model
{
    public $id;
    public $name;
    public $hosts;
    public $cmd;
    public $cron_str;
    public $desc;
    public $mails;
    public $phones;
    public $team;
    public $owner;
    public $host_strategy;
    public $restore_strategy;
    public $retry_strategy;
    public $error_strategy;
    public $exist_strategy;
    public $running_timeout_s;
    public $status;
    public $modify_time;
    public $modify_user;
    public $create_time;
    public $create_user;
    public $start_date;
    public $end_date;
    public $oupput_match_reg;
    public $next_run_time;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['cmd', 'cron_str', 'name', 'hosts'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
//         return [
//             // name, email, subject and body are required
//             [['name', 'email', 'subject', 'body'], 'required'],
//             // email has to be a valid email address
//             ['email', 'email'],
//             // verifyCode needs to be entered correctly
//             ['verifyCode', 'captcha'],
//         ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param  string  $email the target email address
     * @return boolean whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();
            return true;
        } else {
            return false;
        }
    }
}
