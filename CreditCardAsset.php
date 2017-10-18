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
use yii\web\AssetBundle;

class CreditCardAsset extends AssetBundle
{
    public $depends = [
        'yii\web\JqueryAsset',
        'alkurn\creditcard\JqueryPaymentAsset',
        'alkurn\creditcard\FontAwesomeAsset',
    ];

    public $sourcePath = '@alkurn/creditcard/assets';

    public $css = [
        'css/creditcard.css',
    ];

    public $js = [
        'js/creditcard.js',
    ];
}