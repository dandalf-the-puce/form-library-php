<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\Field;

use Dandalf\FormLibrary\FieldAttribute\Time\DateTimeAttributeTrait;
use Dandalf\FormLibrary\FieldAttribute\Time\TimeAttributeInterface;

/**
 * A field for selecting date-times
 */
class DateTimeField implements FieldInterface, TimeAttributeInterface
{
    use FieldTrait, DateTimeAttributeTrait;

    protected string $type = 'date-time';
}
