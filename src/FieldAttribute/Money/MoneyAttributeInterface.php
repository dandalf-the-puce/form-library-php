<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\FieldAttribute\Money;

use Dandalf\FormLibrary\FieldAttribute\FieldAttributeInterface;

/**
 * Interface for fields that accept money values that follow specific formatting
 */
interface MoneyAttributeInterface extends FieldAttributeInterface
{
    public function getCurrency(): ?string;

    public function setCurrency(?string $currency): self;

    public function getCurrencyDisplay(): CurrencyDisplay;

    public function setCurrencyDisplay(string|CurrencyDisplay $currency_display): self;

    public function getCurrencySign(): CurrencySign;

    public function setCurrencySign(string|CurrencySign $currency_sign): self;

    public function getLocale(): ?string;

    public function setLocale(?string $locale): self;

    public function getSignDisplay(): SignDisplay;

    public function setSignDisplay(string|SignDisplay $sign_display): self;

    public function getUseGrouping(): UseGrouping;

    public function setUseGrouping(string|UseGrouping $use_grouping): self;
}
