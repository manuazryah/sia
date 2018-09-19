<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property int $id
 * @property string $service_name
 * @property string $canonical_name
 * @property string $small_content
 * @property string $detailed_content
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class Services extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['small_content', 'detailed_content'], 'string'],
            [['status', 'CB', 'UB'], 'integer'],
            [['DOC', 'DOU', 'meta_title', 'meta_description', 'meta_keyword', 'page_url'], 'safe'],
            [['service_name', 'canonical_name', 'small_content', 'detailed_content', 'meta_title', 'meta_description', 'meta_keyword', 'page_url'], 'required'],
            [['service_name', 'canonical_name'], 'string', 'max' => 200],
            [['service_image'], 'required', 'on' => 'create'],
            [['service_image'], 'file', 'extensions' => 'jpg, png,jpeg'],
            [['small_content'], 'string', 'max' => 130],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'service_name' => 'Service Name',
            'canonical_name' => 'Canonical Name',
            'small_content' => 'Small Content',
            'detailed_content' => 'Detailed Content',
            'status' => 'Status',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
            'DOU' => 'Dou',
        ];
    }

}
