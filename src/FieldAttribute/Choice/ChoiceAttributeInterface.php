<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\FieldAttribute\Choice;

use Dandalf\FormLibrary\FieldAttribute\FieldAttributeInterface;

/**
 * Attributes for selecting one or more choices from a list
 */
interface ChoiceAttributeInterface extends FieldAttributeInterface
{
    public function getEmptyOption(): bool|string;

    public function setEmptyOption(bool|string $empty_option): self;

    public function getMultiple(): bool;

    public function setMultiple(bool $multiple): self;

    public function getOptions(): array;

    public function addOption(ChoiceOptionInterface $option): self;

    public static function createNewOption(): ChoiceOptionInterface;
}
