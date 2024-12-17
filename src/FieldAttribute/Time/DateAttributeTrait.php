<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\FieldAttribute\Time;

use Dandalf\FormLibrary\Exception\InvalidArgumentException;
use Dandalf\FormLibrary\FieldAttribute\BaseFieldAttributeTrait;
use DateInterval;
use DateTimeInterface;

/**
 * Built-in trait which follows the `TimeAttributeInterface` for dates only
 */
trait DateAttributeTrait
{
    use BaseFieldAttributeTrait;

    private ?DateTimeInterface $max = null;

    private ?DateTimeInterface $min = null;

    private int $step_in_days = 1;

    public function getMax(): ?DateTimeInterface
    {
        return $this->max;
    }

    public function setMax(?DateTimeInterface $max): self
    {
        $this->max = $max;

        return $this;
    }

    public function getMin(): ?DateTimeInterface
    {
        return $this->min;
    }

    public function setMin(?DateTimeInterface $min): self
    {
        $this->min = $min;

        return $this;
    }

    public function getStep(): DateInterval
    {
        return new DateInterval('P' . $this->step_in_days . 'D');
    }

    /**
     * @throws InvalidArgumentException Interval must be a positive value of days
     */
    public function setStep(DateInterval $step): self
    {
        $step_in_days = $step->days ?? 0;

        if ($step_in_days < 1) {
            throw new InvalidArgumentException("Step (in days) must be greater than zero. Value submitted: $step_in_days");
        }

        $this->step = $step_in_days;

        return $this;
    }

    public static function getDefaultStep(): DateInterval
    {
        return new DateInterval(self::getDefaultStepValue() . 'd');
    }

    private static function getDefaultStepValue(): int
    {
        return 1;
    }

    private static function getValueFormat(): string
    {
        return 'Y-m-d';
    }

    protected function toArray(): array
    {
        $response = $this->baseAttributesToArray();

        if ($this->max) {
            $response['max'] = $this->max->format(self::getValueFormat());
        }

        if ($this->min) {
            $response['min'] = $this->min->format(self::getValueFormat());
        }

        $response['step'] = $this->step_in_days;

        return $response;
    }
}
