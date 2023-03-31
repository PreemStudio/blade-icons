<?php

declare(strict_types=1);

namespace Tests\Application;

use PreemStudio\Jetpack\TestBench\AbstractAnalysisTestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class AnalysisTest extends AbstractAnalysisTestCase
{
    protected static function getIgnored(): array
    {
        return [
            'PreemStudio\Icons\svg',
        ];
    }
}
