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
 * Built-in trait which follows the `TimeAttributeInterface` for times only
 */
trait TimeAttributeTrait
{
    use BaseFieldAttributeTrait;

    private ?DateTimeInterface $max = null;

    private ?DateTimeInterface $min = null;

    private int $step_in_seconds = 60;

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
        return new DateInterval('PT' . $this->step_in_seconds . 'S');
    }

    /**
     * @throws InvalidArgumentException Step in seconds must be a positive value
     */
    public function setStep(DateInterval $step): self
    {
        $step_in_seconds = $step->s;

        if ($step_in_seconds < 1) {
            throw new InvalidArgumentException("Step (in seconds) must be greater than zero. Value submitted: $step_in_seconds");
        }

        $this->step = $step_in_seconds;

        return $this;
    }

    public static function getDefaultStep(): DateInterval
    {
        return new DateInterval(self::getDefaultStepValue() . 's');
    }

    private static function getDefaultStepValue(): int
    {
        return 60;
    }

    private static function getValueFormat(): string
    {
        return 'H:i';
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

        $response['step'] = $this->step_in_seconds;

        return $response;
    }
}
