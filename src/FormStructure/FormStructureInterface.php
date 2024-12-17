<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\FormStructure;

use Dandalf\FormLibrary\Field\FieldInterface;
use JsonSerializable;

/**
 * Interface to use to define the structure of a form
 */
interface FormStructureInterface extends JsonSerializable
{
    public function getAutoFocusKey(): ?string;

    public function setAutoFocusKey(?string $key): self;

    public function addField(FieldInterface $field, bool $auto_focus = false): self;

    public function getFields(): array;

    public function removeField(FieldInterface $field): self;

    public function setPruneDisabled(bool $prune_disabled): self;

    public function getPruneDisabled(): bool;
}
