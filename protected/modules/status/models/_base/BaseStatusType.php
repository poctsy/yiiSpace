<?php

/**
* This is the model base class for the table "status_type".
* DO NOT MODIFY THIS FILE! It is automatically generated by giix.
* If any changes are necessary, you must set or override the required
* property or method in class "StatusType".
*
* Columns in table "status_type" available as properties of the model,
* and there are no model relations.
*
* @property integer $id
* @property string $type_name
* @property string $type_reference
* @property integer $active
* @property string $type_name_other
*
*/
abstract class BaseStatusType extends YsActiveRecord {

public static function model($className=__CLASS__) {
return parent::model($className);
}

public function tableName() {
return 'status_type';
}

public static function representingColumn() {
return 'type_name';
}

public function rules() {
return array(
array('type_name, type_reference', 'required'),
array('active', 'numerical', 'integerOnly'=>true),
array('type_name', 'length', 'max'=>25),
array('type_reference', 'length', 'max'=>120),
array('type_name_other', 'length', 'max'=>255),
array('active, type_name_other', 'default', 'setOnEmpty' => true, 'value' => null),
array('id, type_name, type_reference, active, type_name_other', 'safe', 'on'=>'search'),
);
}

public function relations() {
return array(
);
}

public function pivotModels() {
return array(
);
}

public function attributeLabels() {
return array(
'id' => Yii::t('status_type', 'id'),
'type_name' => Yii::t('status_type', 'type_name'),
'type_reference' => Yii::t('status_type', 'type_reference'),
'active' => Yii::t('status_type', 'active'),
'type_name_other' => Yii::t('status_type', 'type_name_other'),
);
}

public function search() {
$criteria = new CDbCriteria;

$criteria->compare('id', $this->id);
$criteria->compare('type_name', $this->type_name, true);
$criteria->compare('type_reference', $this->type_reference, true);
$criteria->compare('active', $this->active);
$criteria->compare('type_name_other', $this->type_name_other, true);

return new CActiveDataProvider($this, array(
'criteria' => $criteria,
));
}
}