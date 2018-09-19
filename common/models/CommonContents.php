<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "common_contents".
 *
 * @property int $id
 * @property string $why_you_choose
 * @property string $about_content_footer
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property string $web
 * @property string $facebook_link
 * @property string $twitter_link
 * @property string $linkedin_link
 * @property string $youtube_link
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class CommonContents extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'common_contents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['why_you_choose', 'about_content_footer', 'address'], 'string'],
            [['status', 'CB', 'UB'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
            [['why_you_choose', 'about_content_footer', 'address', 'email', 'phone', 'web', 'facebook_link', 'twitter_link', 'linkedin_link', 'youtube_link'], 'required'],
            [['email', 'phone', 'web', 'facebook_link', 'twitter_link', 'linkedin_link', 'youtube_link'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'why_you_choose' => 'Why You Choose',
            'about_content_footer' => 'About Content Footer',
            'address' => 'Address',
            'email' => 'Email',
            'phone' => 'Phone',
            'web' => 'Web',
            'facebook_link' => 'Facebook Link',
            'twitter_link' => 'Twitter Link',
            'linkedin_link' => 'Linkedin Link',
            'youtube_link' => 'Youtube Link',
            'status' => 'Status',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
            'DOU' => 'Dou',
        ];
    }

}
