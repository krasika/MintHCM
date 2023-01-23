<?php

namespace FastRoute\DataGenerator;

class GroupPosBased extends RegexBasedAbstract
{
    protected function getApproxChunkSize()
    {
        return 10;
    }

    protected function processChunk($regexToRoutesMap)
    {
        $routeMap = [];
        $regexes = [];
        $offset = 1;
        foreach ($regexToRoutesMap as $regex => $route) {
            $regexes[] = $regex;
            $routeMap[$offset] = [$route->handler, $route->variables];

            $offset += is_array($route->variables) || $route->variables instanceof \Countable ? count($route->variables) : 0;
        }

        $regex = '~^(?:' . implode('|', $regexes) . ')$~';
        return ['regex' => $regex, 'routeMap' => $routeMap];
    }
}
