<?php

$url = 'https://www.somehost.com/test/index.html?param1=4&param2=3&param3=2&param4=1&param5=3';

function functionForSecondTask($url) {
    $urlArray = parse_url($url);
    parse_str($urlArray['query'], $params);

    while ($keyToDelete = array_search(3, $params)) {
        unset($params[$keyToDelete]);
    }

    asort($params, SORT_NUMERIC);
    $params['url'] = $urlArray['path'];
    $paramsString = http_build_query($params);

    return $urlArray['scheme'] . '://' . $urlArray['host'] . '/?' . $paramsString;
}

echo functionForSecondTask($url);
