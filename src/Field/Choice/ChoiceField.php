<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\Field\Choice;

use Dandalf\FormLibrary\Field\FieldInterface;
use Dandalf\FormLibrary\Field\FieldTrait;
use Dandalf\FormLibrary\FieldAttribute\Choice\ChoiceAttributeInterface;
use Dandalf\FormLibrary\FieldAttribute\Choice\ChoiceAttributeTrait;

/**
 * A field with a list of choices to select from
 */
class ChoiceField implements FieldInterface, ChoiceAttributeInterface
{
    use FieldTrait, ChoiceAttributeTrait;

    protected string $type = 'select';
}
