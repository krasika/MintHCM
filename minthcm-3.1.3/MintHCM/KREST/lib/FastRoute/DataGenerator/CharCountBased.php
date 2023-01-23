<?php

namespace FastRoute\DataGenerator;

class CharCountBased extends RegexBasedAbstract
{
    protected function getApproxChunkSize()
    {
        return 30;
    }

    protected function processChunk($regexToRoutesMap)
    {
        $routeMap = [];
        $regexes = [];

        $suffixLen = 0;
        $suffix = '';
        $count = is_array($regexToRoutesMap) || $regexToRoutesMap instanceof \Countable ? count($regexToRoutesMap) : 0;
        foreach ($regexToRoutesMap as $regex => $route) {
            $suffixLen++;
            $suffix .= "\t";

            $regexes[] = '(?:' . $regex . '/(\t{' . $suffixLen . '})\t{' . ($count - $suffixLen) . '})';
            $routeMap[$suffix] = [$route->handler, $route->variables];
        }

        $regex = '~^(?|' . implode('|', $regexes) . ')$~';
        return ['regex' => $regex, 'suffix' => '/' . $suffix, 'routeMap' => $routeMap];
    }
}
