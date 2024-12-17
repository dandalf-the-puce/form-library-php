<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\Field\Choice;

use Dandalf\FormLibrary\FieldAttribute\Choice\ChoiceOptionInterface;
use Dandalf\FormLibrary\FieldAttribute\Choice\ChoiceOptionTrait;

/**
 * An option for a `ChoiceField`
 */
class ChoiceOption implements ChoiceOptionInterface
{
    use ChoiceOptionTrait;
}
