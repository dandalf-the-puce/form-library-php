<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\FieldAttribute\Choice;

/**
 * Built-in trait which follows the `ChoiceOptionInterface`
 */
trait ChoiceOptionTrait
{
    private string $description = '';

    private bool $disabled = false;

    private string $label = '';

    private mixed $value = null;

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDisabled(): bool
    {
        return $this->disabled;
    }

    public function setDisabled(bool $disabled): self
    {
        $this->disabled = $disabled;

        return $this;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getValue(): mixed
    {
        return $this->value;
    }

    public function setValue(mixed $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function jsonSerialize(): object
    {
        $response = [];

        if ($this->description) {
            $response['description'] = $this->description;
        }

        if ($this->disabled) {
            $response['disabled'] = $this->disabled;
        }

        if ($this->label) {
            $response['label'] = $this->label;
        }

        $response['value'] = $this->value;

        return (object) $response;
    }
}
