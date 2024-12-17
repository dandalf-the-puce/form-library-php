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
use JsonSerializable;

/**
 * Interface for options in a `ChoiceAttributeInterface`
 */
interface ChoiceOptionInterface extends FieldAttributeInterface, JsonSerializable
{
    public function getDescription(): string;

    public function setDescription(string $description): self;

    public function getDisabled(): bool;

    public function setDisabled(bool $disabled): self;

    public function getLabel(): string;

    public function setLabel(string $label): self;

    public function getValue(): mixed;

    public function setValue(mixed $value): self;
}
