<?php
/**
 * @copyright Copyright &copy; 2015 Ganesh Alkurn
 * @package alkurn\yii2-creditcard
 * @license https://github.com/alkurn/yii2-creditcard/blob/master/LICENSE.md MIT License
 * @link https://github.com/alkurn/yii2-creditcard
 * @version 1.1.1
 */
namespace alkurn\creditcard;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Credit card number validation for Yii2 framework configured to use client validation courtesy of stripe as per
 * https://github.com/stripe/jquery.payment and to work with yii.activeform.js.
 *
 * @author Ganesh Alkurn <ganesh.alkurn@gmail.com>
 */
class CreditCardNumber extends InputWidget
{

    public $addon = '<i class="fa fa-lg fa-credit-card"></i>';

    public $autocomplete = 'cc-number';

    public function registerAssets()
    {
        parent::registerAssets();
        $this->registerPlugin('ccNumber');
    }

}