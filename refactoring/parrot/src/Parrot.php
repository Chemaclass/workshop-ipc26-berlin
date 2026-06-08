<?php

declare(strict_types=1);

namespace Parrot;

use Exception;

class Parrot
{
    private const float MIN_VALUE = 24.0;
    private const float LOAD_FACTOR = 9.0;
    private const float BASE_SPEED = 12.0;


    private const string SQOORK ='Sqoork!';
    private const string SQAARK ='Sqaark!';
    private const string BZZZT = 'Bzzzzzz';
    private const string SILENCE='...';
    public function __construct(
        /**
         * @var int ParrotTypeEnum
         */
        private int $type,
        private int $numberOfCoconuts,
        private float $voltage,
        private bool $isNailed
    ) {
    }

    /**
     * @throws Exception
     */
    public function getSpeed(): float
    {
        return match ($this->type) {
            ParrotTypeEnum::EUROPEAN->value => $this->getBaseSpeed(),
            ParrotTypeEnum::AFRICAN->value => $this->getSpeedForAfrican(),
            ParrotTypeEnum::NORWEGIAN_BLUE->value => $this->getSpeedForNorwegianBlue($this->isNailed),
            default => throw new Exception('Should be unreachable'),
        };
    }

    private function getSpeedForAfrican(): float
    {
        return max(0, $this->getBaseSpeed() - $this->getLoadFactor() * $this->numberOfCoconuts);
    }

    private function getSpeedForNorwegianBlue(bool $isNailed): float
    {
        return $isNailed ? 0 : $this->getBaseSpeedWith($this->voltage);
    }

    /**
     * @throws Exception
     */
    public function getCry(): string
    {
        return match ($this->type) {
            ParrotTypeEnum::EUROPEAN->value => self::SQOORK,
            ParrotTypeEnum::AFRICAN->value => self::SQAARK,
            ParrotTypeEnum::NORWEGIAN_BLUE->value => $this->getCryForNorwegianBlue(),
            default => throw new Exception('Should be unreachable'),
        };
    }

    private function getCryForNorwegianBlue(): string
    {
        return $this->voltage > 0 ? self::BZZZT : self::SILENCE;
    }

    private function getBaseSpeedWith(float $voltage): float
    {
        return min(self::MIN_VALUE, $voltage * $this->getBaseSpeed());
    }

    private function getLoadFactor(): float
    {
        return self::LOAD_FACTOR;
    }

    private function getBaseSpeed(): float
    {
        return self::BASE_SPEED;
    }
}
