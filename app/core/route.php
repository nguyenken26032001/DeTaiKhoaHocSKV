<?php
class route
{
    function handleRoute($url)
    {
        global $arrayRoute;
        $url = trim($url, '/');
        $handleUrl = $url;
        if (!empty($arrayRoute)) {
            foreach ($arrayRoute as $key => $value) {
                if (preg_match('~' . $key . '~is', $url)) {
                    $handleUrl = preg_replace('~' . $key . '~is', $value, $url);
                }
            }
        }
        return $handleUrl;
    }
}