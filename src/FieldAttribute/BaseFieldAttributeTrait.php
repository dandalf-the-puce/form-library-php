<?php

namespace Dandalf\FormLibrary\FieldAttribute;

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

use Dandalf\FormLibrary\Exception\InvalidArgumentException;

/**
 * Built-in trait which follows the `BaseFieldAttributeInterface`
 */
trait BaseFieldAttributeTrait
{
    private $default_value = null;

    private string $description = '';

    private bool $disabled = false;

    private string $label = '';

    private ?int $rank = null;

    private bool $required = false;

    public function getDefaultValue(): mixed
    {
        return $this->default_value;
    }

    public function setDefaultValue(mixed $default_value): self
    {
        $this->default_value = $default_value;

        return $this;
    }

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

    public function getRank(): ?int
    {
        return $this->rank;
    }

    /**
     * @throws InvalidArgumentException Rank must be null or greater than zero
     */
    public function setRank(?int $rank): self
    {
        if ($rank === 0) {
            $rank = null;
        }

        if ($rank !== null && $rank < 1) {
            throw new InvalidArgumentException("Rank must be `null` or greater than zero. Value submitted: $rank");
        }

        $this->rank = $rank;

        return $this;
    }

    public function getRequired(): bool
    {
        return $this->required;
    }

    public function setRequired(bool $required): self
    {
        $this->required = $required;

        return $this;
    }

    protected function baseAttributesToArray(): array
    {
        $response = [];

        if ($this->default_value !== null) {
            $response['default_value'] = $this->default_value;
        }

        if ($this->description) {
            $response['description'] = $this->description;
        }

        if ($this->disabled) {
            $response['disabled'] = $this->disabled;
        }

        if ($this->label) {
            $response['label'] = $this->label;
        }

        if ($this->rank !== null) {
            $response['rank'] = $this->rank;
        }

        if ($this->required) {
            $response['required'] = $this->required;
        }

        return $response;
    }
}
