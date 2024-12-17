<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\FieldAttribute\Money;

use Dandalf\FormLibrary\Exception\InvalidArgumentException;
use Dandalf\FormLibrary\FieldAttribute\BaseFieldAttributeTrait;
use Symfony\Component\Intl\Currencies;
use Symfony\Component\Intl\Locales;

/**
 * Built-in trait which follows the `MoneyAttributeInterface`
 */
trait MoneyAttributeTrait
{
    use BaseFieldAttributeTrait;

    private ?string $currency = null;

    private ?CurrencyDisplay $currency_display = null;

    private ?CurrencySign $currency_sign = null;

    private ?string $locale = null;

    private ?SignDisplay $sign_display = null;

    private ?UseGrouping $use_grouping = null;

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @throws InvalidArgumentException When symfony/intl is installed and the currency code does not exist
     */
    public function setCurrency(?string $currency_code): self
    {
        if ($currency_code && class_exists(Currencies::class) && !Currencies::exists($currency_code)) {
            throw new InvalidArgumentException("Unknown currency code: $currency_code");
        }

        $this->currency = $currency_code;

        return $this;
    }

    public function getCurrencyDisplay(): CurrencyDisplay
    {
        if (!$this->currency_display) {
            $this->currency_display = new CurrencyDisplay();
        }
        
        return $this->currency_display;
    }

    public function setCurrencyDisplay(string|CurrencyDisplay $currency_display): self
    {
        if (!is_a($currency_display, CurrencyDisplay::class)) {
            $currency_display = new CurrencyDisplay($currency_display);
        }

        $this->currency_display =  $currency_display;

        return $this;
    }

    public function getCurrencySign(): CurrencySign
    {
        if (!$this->currency_sign) {
            $this->currency_sign = new CurrencySign();
        }
        
        return $this->currency_sign;
    }

    public function setCurrencySign(string|CurrencySign $currency_sign): self
    {
        if (!is_a($currency_sign, CurrencySign::class)) {
            $currency_sign = new CurrencySign($currency_sign);
        }

        $this->currency_sign =  $currency_sign;

        return $this;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    /**
     * @throws InvalidArgumentException When symfony/intl is installed and the locale code does not exist
     */
    public function setLocale(?string $locale_code): self
    {
        if ($locale_code && class_exists(Locales::class) && !Locales::exists($locale_code)) {
            throw new InvalidArgumentException("Unknown locale code: $locale_code");
        }

        $this->locale = $locale_code;
        
        return $this;
    }

    public function getSignDisplay(): SignDisplay
    {
        if (!$this->sign_display) {
            $this->sign_display = new SignDisplay();
        }

        return $this->sign_display;
    }

    public function setSignDisplay(string|SignDisplay $sign_display): self
    {
        if (!is_a($sign_display, SignDisplay::class)) {
            $sign_display = new SignDisplay($sign_display);
        }

        $this->sign_display =  $sign_display;

        return $this;
    }

    public function getUseGrouping(): UseGrouping
    {
        if (!$this->use_grouping) {
            $this->use_grouping = new UseGrouping();
        }

        return $this->use_grouping;
    }

    public function setUseGrouping(string|UseGrouping $use_grouping): self
    {
        if (!is_a($use_grouping, UseGrouping::class)) {
            $use_grouping = new UseGrouping($use_grouping);
        }

        $this->use_grouping =  $use_grouping;

        return $this;
    }

    protected function toArray(): array
    {
        $response = $this->baseAttributesToArray();

        if ($this->currency) {
            $response['currency'] = $this->currency;
        }

        $response['currency_display'] = $this->getCurrencyDisplay();

        $response['currency_sign'] = $this->getCurrencySign();

        if ($this->locale) {
            $response['locale'] = $this->locale;
        }

        $response['sign_display'] = $this->getSignDisplay();

        $response['use_grouping'] = $this->getUseGrouping();

        return $response;
    }
}
