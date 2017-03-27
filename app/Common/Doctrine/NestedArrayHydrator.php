<?php

namespace Example\Common\Doctrine;

use Doctrine\ORM\Internal\Hydration\ArrayHydrator;

class NestedArrayHydrator extends ArrayHydrator
{
    protected function hydrateRowData(array $row, array &$result)
    {
        parent::hydrateRowData($row, $result);

        foreach ($result as &$row) {
            $this->postProcessRow($row);
        }
    }

    private function postProcessRow(&$row)
    {
        $aggregated = [];

        foreach ($row as $key => $value) {
            if (strpos($key, '.') === false) {
                continue;
            }

            $path = explode('.', $key);
            $aggregated[$path[0]][$path[1]] = $value;
            unset($row[$key]);
        }

        foreach ($aggregated as $key => $aggregatedValue) {
            $row[$key] = $aggregatedValue;
        }
    }
}
