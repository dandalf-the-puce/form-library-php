<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\FieldAttribute\Number;

use Dandalf\FormLibrary\FieldAttribute\FieldAttributeInterface;

/**
 * Interface for fields that accept number values
 */
interface NumberAttributeInterface extends FieldAttributeInterface
{
    public function getMaxValue(): int|float|null;

    public function setMaxValue(int|float|null $max_value): self;

    public function getMinValue(): int|float|null;

    public function setMinValue(int|float|null $min_value): self;

    public function getStep(): int|float|null;

    public function setStep(int|float|null $step): self;
}
