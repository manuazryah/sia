<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact_info".
 *
 * @property int $id
 * @property string $dubai_office_address
 * @property string $sharjah_office_address
 * @property string $phone
 * @property string $webpage
 * @property string $email
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 */
class ContactInfo extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'contact_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['dubai_office_address', 'sharjah_office_address'], 'string'],
            [['dubai_office_address', 'sharjah_office_address', 'phone', 'email', 'webpage'], 'required'],
            [['status', 'CB', 'UB'], 'integer'],
            [['DOC'], 'safe'],
            [['phone'], 'string', 'max' => 25],
            [['webpage'], 'string', 'max' => 200],
            [['email'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'dubai_office_address' => 'Dubai Office Address',
            'sharjah_office_address' => 'Sharjah Office Address',
            'phone' => 'Phone',
            'webpage' => 'Webpage',
            'email' => 'Email',
            'status' => 'Status',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
        ];
    }

}
