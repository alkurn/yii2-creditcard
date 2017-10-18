yii2-creditcard
======================

[![Latest Stable Version](https://poser.pugx.org/alkurn/yii2-creditcard/v/stable)](https://packagist.org/packages/alkurn/yii2-creditcard)
[![License](https://poser.pugx.org/alkurn/yii2-creditcard/license)](https://packagist.org/packages/alkurn/yii2-creditcard)

Yii2 Bootstrap 3 components, providing client validated and masked credit card number, expiry and cvc fields with credit card icon changing to match credit card type when detectable.

Uses client validation courtesy of Stripe (https://github.com/stripe/jquery.payment) and works with validation in ActiveForm.

For PCI compliance, there is the ability to prevent submit of these fields via the `submit` property by excluding the name attribute from the rendered input element.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/). Check the [composer.json](https://github.com/alkurn/yii2-creditcard/blob/master/composer.json) for this extension's requirements and dependencies. Read this [web tip /wiki](http://webtips.krajee.com/setting-composer-minimum-stability-application/) on setting the `minimum-stability` settings for your application's composer.json.

To install

```
$ php composer.phar require alkurn/yii2-creditcard "@dev"
```

or add

```
"alkurn/yii2-creditcard": "@dev"
```

to the `require` section of your `composer.json` file.

## Latest Release

> NOTE: The latest version of the module is v1.1.0. Refer the [CHANGE LOG](https://github.com/alkurn/yii2-creditcard/blob/master/CHANGE.md) for details.

## Usage in view

Note that the input names here have been chosen to fit work with the tuyakhov\braintree extension

```php
<?php
use yii\bootstrap\ActiveForm;
use alkurn\creditcard\CreditCardNumber;
use alkurn\creditcard\CreditCardExpiry;
use alkurn\creditcard\CreditCardCVCode;
?>

<?php $form = ActiveForm::begin() ?>
    <div class="container">
        <div id="card" class="row">
            <div class="col-xs-7">
                <?= $form->field($bookingForm, 'creditCard_number')->widget(CreditCardNumber::className(), ['submit' => false,]) ?>
            </div>
            <div class="col-xs-3">
                <?= $form->field($bookingForm, 'creditCard_expirationDate')->widget(CreditCardExpiry::className(), ['submit' => false,]) ?>
            </div>
            <div class="col-xs-2">
                <?= $form->field($bookingForm, 'creditCard_cvv')->widget(CreditCardCVCode::className(), ['submit' => false,]) ?>
            </div>
        </div>
    </div>
<?php ActiveForm::end() ?>
```
## License

**yii2-creditcard** is released under the MIT License. See the bundled `LICENSE.md` for details.
