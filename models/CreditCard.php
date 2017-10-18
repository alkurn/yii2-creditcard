<?php
/**
 * @copyright Copyright &copy; 2015 Ganesh Alkurn
 * @package alkurn\yii2-creditcard
 * @license http://opensource.org/licenses/MIT MIT License
 * @link https://github.com/alkurn/yii2-creditcard
 * @version 1.1.1
 */
namespace alkurn\creditcard\models;

use yii\base\Model;
use alkurn\creditcard\validators\CCNumberValidator;
use alkurn\creditcard\validators\CCExpiryValidator;
use alkurn\creditcard\validators\CCCVCodeValidator;
use Yii;

/**
 * Credit card model.
 *
 * @author Ganesh Alkurn <ganesh.alkurn@gmail.com>
 */
class CreditCard extends Model
{
    public $numberAttribute = 'creditCard_number';

    public $expiryAttribute = 'creditCard_expirationDate';

    public $cvcAttribute = 'creditCard_cvv';

    private $_attributes = [];

    public function __get($name)
    {
        if (in_array($name, ['creditCard_number', 'creditCard_expirationDate', 'creditCard_cvv'])) {
            if (!isset($this->_attributes[$name])) {
                $this->_attributes[$name] = null;
            }

            return $this->_attributes[$name];
        }

        return parent::__get($name);
    }

    public function __set($name, $value)
    {
        if (in_array($name, ['creditCard_number', 'creditCard_expirationDate', 'creditCard_cvv'])) {
            $this->_attributes[$name] = $value;
        }

        return parent::__set($name, $value);
    }

    public function rules()
    {
        return [
            [[$this->numberAttribute, $this->expiryAttribute, $this->cvcAttribute], 'required'],
            [[$this->numberAttribute], CCNumberValidator::className()],
            [[$this->expiryAttribute], CCExpiryValidator::className()],
            [[$this->cvcAttribute], CCCVCodeValidator::className()],
        ];
    }

    public function attributeLabels()
    {
        return [
            $this->numberAttribute => Yii::t('creditcard', 'Card number'),
            $this->expiryAttribute => Yii::t('creditcard', 'Expiry'),
            $this->cvcAttribute => Yii::t('creditcard', 'CV Code'),
        ];
    }
}
