<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\FieldAttribute;

/**
 * All `Field` classes must implement this field attribute interface
 */
interface BaseFieldAttributeInterface extends FieldAttributeInterface
{
    public function getDefaultValue(): mixed;

    public function setDefaultValue(mixed $default_value): self;

    public function getDescription(): string;

    public function setDescription(string $description): self;

    public function getDisabled(): bool;

    public function setDisabled(bool $disabled): self;

    public function getLabel(): string;

    public function setLabel(string $label): self;

    public function getRank(): ?int;

    public function setRank(?int $rank): self;

    public function getRequired(): bool;

    public function setRequired(bool $required): self;
}
