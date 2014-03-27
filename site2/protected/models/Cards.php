<?php

/**
 * This is the model class for table "yii_cards".
 *
 * The followings are the available columns in table 'yii_cards':
 * @property integer $ID
 * @property string $name
 * @property string $description
 * @property integer $producerID
 * @property integer $price
 * @property integer $sizeX
 * @property integer $sizeY
 * @property integer $sizeZ
 * @property integer $weight
 *
 * The followings are the available model relations:
 * @property Tags[] $yiiTags
 * @property Producers $producer
 * @property Purchases[] $yiiPurchases
 */
class Cards extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'yii_cards';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description, producerID, price, sizeX, sizeY, sizeZ, weight', 'required'),
			array('producerID, price, sizeX, sizeY, sizeZ, weight', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>200),
			array('description', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, name, description, producerID, price, sizeX, sizeY, sizeZ, weight', 'safe', 'on'=>'search'),
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
			'yiiTags' => array(self::MANY_MANY, 'Tags', 'yii_card_tags(cardID, tagID)'),
			'producer' => array(self::BELONGS_TO, 'Producers', 'producerID'),
			'yiiPurchases' => array(self::MANY_MANY, 'Purchases', 'yii_purchase_items(cardID, purchaseID)'),
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
			'description' => 'Description',
			'producerID' => 'Producer',
			'price' => 'Price',
			'sizeX' => 'Size X',
			'sizeY' => 'Size Y',
			'sizeZ' => 'Size Z',
			'weight' => 'Weight',
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
		$criteria->compare('description',$this->description,true);
		$criteria->compare('producerID',$this->producerID);
		$criteria->compare('price',$this->price);
		$criteria->compare('sizeX',$this->sizeX);
		$criteria->compare('sizeY',$this->sizeY);
		$criteria->compare('sizeZ',$this->sizeZ);
		$criteria->compare('weight',$this->weight);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cards the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
