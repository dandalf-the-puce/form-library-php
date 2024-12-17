<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\Field;

use Dandalf\FormLibrary\FieldAttribute\Number\NumberAttributeInterface;
use Dandalf\FormLibrary\FieldAttribute\Number\NumberAttributeTrait;

/**
 * Field for numbers (integers, floats, etc)
 */
class NumberField implements FieldInterface, NumberAttributeInterface
{
    use FieldTrait, NumberAttributeTrait;

    protected string $type = 'number';
}
