<?php

declare(strict_types=1);

namespace Parrot;

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
        private ParrotTypeEnum $type,
        private int $numberOfCoconuts,
        private NorwegianBlueParams $norwegianBlueParams

    ) {
    }

    public function getSpeed(): float
    {
        return match ($this->type) {
            ParrotTypeEnum::EUROPEAN => $this->getBaseSpeed(),
            ParrotTypeEnum::AFRICAN => $this->getSpeedForAfrican(),
            ParrotTypeEnum::NORWEGIAN_BLUE => $this->getSpeedForNorwegianBlue(),
        };
    }

    private function getSpeedForAfrican(): float
    {
        return max(0, $this->getBaseSpeed() - $this->getLoadFactor() * $this->numberOfCoconuts);
    }

    private function getSpeedForNorwegianBlue(): float
    {
    $params = $this->norwegianBlueParams;

    return $params->isNailed ? 0 : $this->getBaseSpeedWith($params->voltage);
    }

    public function getCry(): string
    {
        return match ($this->type) {
            ParrotTypeEnum::EUROPEAN => self::SQOORK,
            ParrotTypeEnum::AFRICAN => self::SQAARK,
            ParrotTypeEnum::NORWEGIAN_BLUE => $this->getCryForNorwegianBlue(),
        };
    }

    private function getCryForNorwegianBlue(): string
    {
        return $this->norwegianBlueParams->voltage > 0 ? self::BZZZT : self::SILENCE;
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
