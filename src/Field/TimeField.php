<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\Field;

use Dandalf\FormLibrary\FieldAttribute\Time\TimeAttributeInterface;
use Dandalf\FormLibrary\FieldAttribute\Time\TimeAttributeTrait;

/**
 * A field for selecting times
 */
class TimeField implements FieldInterface, TimeAttributeInterface
{
    use FieldTrait, TimeAttributeTrait;

    protected string $type = 'time';
}
