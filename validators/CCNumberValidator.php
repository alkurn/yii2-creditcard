<?php
/**
 * @copyright Copyright &copy; 2015 Ganesh Alkurn
 * @package alkurn\yii2-creditcard
 * @license http://opensource.org/licenses/MIT MIT License
 * @link https://github.com/alkurn/yii2-creditcard
 * @version 1.1.1
 */
namespace alkurn\creditcard\validators;

use kartik\base\TranslationTrait;
use yii\validators\Validator;
use yii\web\JsExpression;
use Yii;

/**
 * Yii2 Validator to validator CVC/CVV/CVS credit card attribute in client on blur using $.payment.validateCardNumber
 * from https://github.com/stripe/jquery.payment and working with ActiveForm (yii.activeform.js).
 *
 * @author Ganesh Alkurn <ganesh.alkurn@gmail.com>
 */
class CCNumberValidator extends Validator
{
    use TranslationTrait;

    /**
     * @var array the the internalization configuration for this widget
     */
    public $i18n = [];

    /**
     * @var string translation message file category name for i18n
     */
    protected $_msgCat = 'creditcard';

    public function init()
    {
        parent::init();
        $this->initI18N(__DIR__);
        $this->message = Yii::t('creditcard', 'Card number is invalid.');
    }

    public function clientValidateAttribute($model, $attribute, $view)
    {
        $message = json_encode($this->message, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        return new JsExpression("
            if (!$.payment.validateCardNumber(value)) {
                messages.push($message);
            }
        ");
    }
}
