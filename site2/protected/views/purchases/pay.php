<?php
/* @var $this PurchasesController */
/* @var $model Purchases */

$this->layout='//layouts/user';
$this->breadcrumbs=array(
    'Мои покупки'=>array('index'),
    'Оплата покупки #'.$model->ID
);

?>
<form action='/purchases/pay_mid/<?php echo $model->ID; ?>' METHOD='POST'>
    <input type='image' name='paypal_submit' id='paypal_submit'  src='https://www.paypal.com/en_US/i/btn/btn_dg_pay_w_paypal.gif' border='0' align='top' alt='Pay with PayPal'/>
</form>
<br />
<?php echo CHtml::link('Обратно к моим покупкам',array('/purchases/index'), array('class'=>'btn btn-default')); ?>

<script src='https://www.paypalobjects.com/js/external/dg.js' type='text/javascript'></script>
<script>
    var dg = new PAYPAL.apps.DGFlow(
        {
            trigger: 'paypal_submit',
            expType: 'instant'
        });
</script>
