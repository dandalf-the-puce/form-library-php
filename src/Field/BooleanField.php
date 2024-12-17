<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\Field;

use Dandalf\FormLibrary\Field\Choice\ChoiceOption;
use Dandalf\FormLibrary\FieldAttribute\Choice\ChoiceAttributeInterface;
use Dandalf\FormLibrary\FieldAttribute\Choice\ChoiceAttributeTrait;

/**
 * A field for `true` and `false` values
 */
class BooleanField implements FieldInterface, ChoiceAttributeInterface
{
    use FieldTrait, ChoiceAttributeTrait {
        FieldTrait::__construct as defaultConstruct;
    }

    protected string $type = 'boolean';

    public function __construct(string $key)
    {
        $this->defaultConstruct($key);

        $this
            ->addOption($this->createOption(true, 'Yes'))
            ->addOption($this->createOption(false, 'No'))
            //
        ;
    }

    /**
     * Change the default label/description for the `true` option
     */
    public function updateTrueOption(string $label, string $description = ''): self
    {
        return $this->updateOption(true, $label, $description);
    }

    /**
     * Change the default label/description for the `false` option
     */
    public function updateFalseOption(string $label, string $description = ''): self
    {
        return $this->updateOption(false, $label, $description);
    }

    /**
     * Private function used for updating default option labels/descriptions
     */
    private function updateOption(bool $value, string $label, string $description = ''): self
    {
        $option = $this->getOption($value);

        $option
            ->setLabel($label)
            ->setDescription($description)
        //
        ;

        return $this;
    }

    /**
     * Private function used to construct default true/false options
     */
    private function createOption(bool $value, string $label): ChoiceOption
    {
        $option = new ChoiceOption();

        return $option
            ->setValue($value)
            ->setLabel($label)
            //
        ;
    }
}
