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

class FontAwesomeAsset extends AssetBundle
{
    public $sourcePath = '@bower/font-awesome';

    public $css = [
        'css/font-awesome.min.css',
    ];
}