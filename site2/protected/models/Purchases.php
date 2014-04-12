<?php

/**
 * This is the model class for table "yii_purchases".
 *
 * The followings are the available columns in table 'yii_purchases':
 * @property integer $ID
 * @property integer $userID
 * @property string $userComment
 * @property string $date
 * @property string $paymentState
 * @property string $deliveryState
 * @property integer $marker
 * @property string $payment_token
 * @property string $payment_transaction
 *
 * The followings are the available model relations:
 * @property Cards[] $yiiCards
 * @property Users $user
 */
class Purchases extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'yii_purchases';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userID', 'required'),
			array('userID, marker', 'numerical', 'integerOnly'=>true),
			array('userComment', 'length', 'max'=>500),
			array('paymentState, deliveryState', 'length', 'max'=>50),
            array('payment_token, payment_transaction', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, userID, userComment, date, paymentState, deliveryState, marker', 'safe', 'on'=>'search'),
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
			'yiiCards' => array(self::MANY_MANY, 'Cards', 'yii_purchase_items(purchaseID, cardID)'),
			'user' => array(self::BELONGS_TO, 'Users', 'userID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'userID' => 'Пользователь',
			'userComment' => 'Комментарий к покупке',
			'date' => 'Дата покупки',
			'paymentState' => 'Состояние оплаты',
			'deliveryState' => 'Состояние доставки',
			'marker' => 'Этап покупки',
            'payment_token' => 'Payment Token',
            'payment_transaction' => 'Payment Transaction',
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
        $criteria->with=array('user');

		//$criteria->compare('ID',$this->ID);
		//$criteria->compare('userID',$this->userID);
		$criteria->compare('userComment',$this->userComment,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('paymentState',$this->paymentState,true);
		$criteria->compare('deliveryState',$this->deliveryState,true);
		$criteria->compare('marker',$this->marker);
        //$criteria->compare('payment_token',$this->payment_token,true);
        //$criteria->compare('payment_transaction',$this->payment_transaction,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Purchases the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}



    public function scopes()
    {
        return array(
            'need_admin'=>array(
                'condition'=>'marker=1',
            ),
        );
    }
}
