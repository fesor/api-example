<?php

namespace Tests\Common\Doctrine;

use Example\Common\Doctrine\NestedArrayHydrator;
use PHPUnit\Framework\TestCase;
use Zend\Code\Reflection\ClassReflection;

class NestedArrayHydratorTest extends TestCase
{
    public function testItAggregatesFieldsUsingDelimeter()
    {
        $row = [
            'id' => 1,
            'foo.bar' => 'bar',
            'foo.baz' => 'baz',
            'bar.bar' => 'bar',
        ];

        $actualRow = $this->postProcessRow($row);

        self::assertEquals([
            'id' => 1,
            'foo' => [
                'bar' => 'bar',
                'baz' => 'baz',
            ],
            'bar' => [
                'bar' => 'bar'
            ]
        ], $actualRow);
    }

    private function postProcessRow($row)
    {
        $hydrator = (new ClassReflection(NestedArrayHydrator::class))
            ->newInstanceWithoutConstructor();

        $invoker = \Closure::bind(function ($hydrator, $row) {
            $hydrator->postProcessRow($row);

            return $row;
        }, null, NestedArrayHydrator::class);

        return $invoker($hydrator, $row);
    }
}
