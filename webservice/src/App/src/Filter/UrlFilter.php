<?php

namespace App\Filter;

/**
 * Description of UrlFilter
 *
 * @author reginaldo.neto
 */
class UrlFilter implements FilterInterface
{

    public function filter(string $value): string
    {
        $parsedUrl = parse_url($value);
        $scheme   = isset($parsedUrl['scheme']) ? $parsedUrl['scheme'].'://' : 'http://';
        $host     = isset($parsedUrl['host']) ? $parsedUrl['host'] : '';
        $port     = isset($parsedUrl['port']) ? ':'.$parsedUrl['port'] : '';
        $user     = isset($parsedUrl['user']) ? $parsedUrl['user'] : '';
        $pass     = isset($parsedUrl['pass']) ? ':'.$parsedUrl['pass'] : '';
        $pass     = ($user || $pass) ? "$pass@" : '';
        $path     = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';
        $query    = isset($parsedUrl['query']) ? '?'.$parsedUrl['query'] : '';
        $fragment = isset($parsedUrl['fragment']) ? '#'.$parsedUrl['fragment']
                : '';
        return "$scheme$user$pass$host$port$path$query$fragment";
    }
}