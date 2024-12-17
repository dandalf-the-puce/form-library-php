<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\Field;

use Dandalf\FormLibrary\FieldAttribute\Money\MoneyAttributeInterface;
use Dandalf\FormLibrary\FieldAttribute\Money\MoneyAttributeTrait;

/**
 * Field for displaying numbers formatted to a specific currency
 */
class MoneyField implements FieldInterface, MoneyAttributeInterface
{
    use FieldTrait, MoneyAttributeTrait;

    protected string $type = 'money';
}
