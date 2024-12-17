<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\FieldAttribute\Time;

use Dandalf\FormLibrary\FieldAttribute\FieldAttributeInterface;
use DateInterval;
use DateTimeInterface;

/**
 * Interface for fields that accept time-based values (dates, date-times, times, etc)
 */
interface TimeAttributeInterface extends FieldAttributeInterface
{
    public static function getDefaultStep(): DateInterval;

    public function getMax(): ?DateTimeInterface;

    public function setMax(?DateTimeInterface $max): self;

    public function getMin(): ?DateTimeInterface;

    public function setMin(?DateTimeInterface $min): self;

    public function getStep(): DateInterval;

    public function setStep(DateInterval $step): self;
}
