<?php
/**
 * Spiral Framework.
 *
 * @license   MIT
 * @author    Anton Titov (Wolfy-J)
 */
declare(strict_types=1);

namespace Spiral\DotEnv\Tests;

use PHPUnit\Framework\TestCase;
use Spiral\Boot\Directories;
use Spiral\Boot\Environment;
use Spiral\DotEnv\Bootloader\DotenvBootloader;

class LoadTest extends TestCase
{
    public function testNotFound()
    {
        $e = new Environment();
        $d = new Directories([
            'root' => __DIR__
        ]);

        $b = new DotenvBootloader();
        $b->boot($d, $e);

        $this->assertNull($e->get('KEY'));
    }

    public function testFound()
    {
        $e = new Environment();
        $d = new Directories([
            'root' => __DIR__ . '/../'
        ]);

        $b = new DotenvBootloader();
        $b->boot($d, $e);

        $this->assertSame('value', $e->get('KEY'));
    }
}