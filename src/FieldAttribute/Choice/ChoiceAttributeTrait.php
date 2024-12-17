<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\FieldAttribute\Choice;

use Dandalf\FormLibrary\Exception\InvalidArgumentException;
use Dandalf\FormLibrary\Field\Choice\ChoiceOption;
use Dandalf\FormLibrary\FieldAttribute\BaseFieldAttributeTrait;

/**
 * Built-in trait which follows the `ChoiceAttributeInterface`
 */
trait ChoiceAttributeTrait
{
    use BaseFieldAttributeTrait;

    private bool|string $empty_option = false;

    private bool $multiple = false;

    private array $options = [
        // 'value_as_string' => ChoiceOptionInterface,
    ];

    public function getEmptyOption(): bool|string
    {
        return $this->empty_option;
    }

    public function setEmptyOption(bool|string $empty_option): self
    {
        $this->empty_option = $empty_option;

        return $this;
    }

    public function getMultiple(): bool
    {
        return $this->multiple;
    }

    public function setMultiple(bool $multiple): self
    {
        $this->multiple = $multiple;

        return $this;
    }

    public function getOptions(): array
    {
        return array_values($this->options);
    }

    /**
     * @throws InvalidArgumentException Option already exists
     */
    public function addOption(ChoiceOptionInterface $option): self
    {
        $value_as_string = (string) $option->getValue();

        if (array_key_exists($value_as_string, $this->options)) {
            throw new InvalidArgumentException("Option already exists. Value submitted: $value_as_string");
        }

        $this->options[$value_as_string] = $option;

        return $this;
    }

    /**
     * @throws InvalidArgumentException Option does not exist
     */
    public function removeOption(ChoiceOptionInterface $option): self
    {
        $value_as_string = (string) $option->getValue();

        if (!array_key_exists($value_as_string, $this->options)) {
            throw new InvalidArgumentException("Option not found. Value submitted: $value_as_string");
        }

        unset($this->options[$value_as_string]);

        return $this;
    }

    /**
     * @throws InvalidArgumentException Option does not exist
     */
    protected function getOption(mixed $value): ChoiceOptionInterface
    {
        $value_as_string = (string) $value;

        if (!array_key_exists($value_as_string, $this->options)) {
            throw new InvalidArgumentException("Unknown option: $value_as_string");
        }

        return $this->options[$value_as_string];
    }

    public static function createNewOption(): ChoiceOption
    {
        return new ChoiceOption();
    }

    protected function toArray(): array
    {
        $response = $this->baseAttributesToArray();

        if ($this->empty_option !== false) {
            $response['empty_option'] =  $this->empty_option;
        }

        if ($this->multiple) {
            $response['multiple'] = $this->multiple;
        }

        $response['options'] = array_values($this->options);

        return $response;
    }
}
