<?php

declare(strict_types=1);

namespace Parrot;

use Exception;

class EuropeanParrot extends AbstractParrot
{
    public function getCry(): string
    {
        return 'Sqoork!';
    }
}
