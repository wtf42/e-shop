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
 * @property string $pix
 *
 * The followings are the available model relations:
 * @property Pix[] $yiiPixes
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
			array('description', 'length', 'max'=>2000),
            array('pix', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('name, description, producer_search, price, sizeX, sizeY, sizeZ, weight', 'safe', 'on'=>'search'),
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
			//'yiiPixes' => array(self::MANY_MANY, 'Pix', 'yii_card_pix(cardID, pixID)'),
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
			'name' => 'Название',
			'description' => 'Описание',
			'producerID' => 'Producer ID',
			'price' => 'Цена',
			'sizeX' => 'Размер X',
			'sizeY' => 'Размер Y',
			'sizeZ' => 'Размер Z',
			'weight' => 'Вес',
            'pix' => 'Картинка',
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
        $criteria->with=array('producer');

		//$criteria->compare('ID',$this->ID);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('t.description',$this->description,true);
        //$criteria->compare('t.producerID',$this->producerID);
        $criteria->compare('producer.name',$this->producer_search,true);
		$criteria->compare('t.price',$this->price);
		$criteria->compare('t.sizeX',$this->sizeX);
		$criteria->compare('t.sizeY',$this->sizeY);
		$criteria->compare('t.sizeZ',$this->sizeZ);
		$criteria->compare('t.weight',$this->weight);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    public $producer_search;

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
