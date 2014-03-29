<?php

/**
 * This is the model class for table "yii_tags".
 *
 * The followings are the available columns in table 'yii_tags':
 * @property integer $ID
 * @property string $name
 *
 * The followings are the available model relations:
 * @property Cards[] $yiiCards
 * @property Subtags $parentTag1
 * @property Tags $parentTag
 * @property Subtags[] $subtags1
 * @property Tags[] $subtags
 */
class Tags extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'yii_tags';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('name', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, name', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'yiiCards' => array(self::MANY_MANY, 'Cards', 'yii_card_tags(tagID, cardID)'),
			'parentTag1' => array(self::HAS_ONE, 'Subtags', 'tagID'),
			'parentTag' => array(self::HAS_ONE, 'Tags', 'parentID','through'=>'parentTag1'),
			'subtags1' => array(self::HAS_MANY, 'Subtags', 'parentID'),
			'subtags' => array(self::HAS_MANY, 'Tags','tagID','through'=>'subtags1'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'name' => 'Name',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID',$this->ID);
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tags the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}