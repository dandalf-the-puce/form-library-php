<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\FieldAttribute\Number;

use Dandalf\FormLibrary\FieldAttribute\BaseFieldAttributeTrait;

/**
 * Built-in trait which follows the `NumberAttributeInterface`
 */
trait NumberAttributeTrait
{
    use BaseFieldAttributeTrait;

    private int|float|null $max_value = null;

    private int|float|null $min_value = null;

    private int|float|null $step = null;

    public function getMaxValue(): int|float|null
    {
        return $this->max_value;
    }

    public function setMaxValue(int|float|null $max_value): self
    {
        $this->max_value = $max_value;

        return $this;
    }

    public function getMinValue(): int|float|null
    {
        return $this->min_value;
    }

    public function setMinValue(int|float|null $min_value): self
    {
        $this->min_value = $min_value;

        return $this;
    }

    public function getStep(): int|float|null
    {
        return $this->step;
    }

    public function setStep(int|float|null $step): self
    {
        $this->step = $step;

        return $this;
    }

    protected function toArray(): array
    {
        $response = $this->baseAttributesToArray();

        if ($this->max_value !== null) {
            $response['max_value'] = $this->max_value;
        }

        if ($this->min_value !== null) {
            $response['min_value'] = $this->min_value;
        }

        if ($this->step !== null) {
            $response['step'] = $this->step;
        }

        return $response;
    }
}
