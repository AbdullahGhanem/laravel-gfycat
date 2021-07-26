<?php

namespace Ghanem\Gfycat;

class Request
{
    static public function request($endpoint, array $params = [])
    {
        $params['api_key'] = config('gfycat.key');
        $result = file_get_contents('https://api.gfycat.com/' . $endpoint . "?" . http_build_query($params));
        return json_decode($result);
    }

    static public function search($query, $limit, $offset, $rating, $lang)
    {
        $endpoint = 'v1/' . $type . '/search';
        $params = [
            'q' => urlencode($query),
            'limit' => (int)$limit,
            'offset' => (int)$offset
        ];
        isset($rating) ? $params['rating'] = urlencode($rating) : null;
        isset($lang) ? $params['lang'] = urlencode($lang) : null;
        return Request::request($endpoint, $params);
    }

    static public function trending($limit, $rating)
    {
        $endpoint = 'v1/' . $type . '/trending';
        $params = [
            'limit' => (int)$limit
        ];
        isset($rating) ? $params['rating'] = urlencode($rating) : null;
        return Request::request($endpoint, $params);
    }

    static public function translate($query, $rating, $lang)
    {
        $endpoint = 'v1/' . $type . '/translate';
        $params = [
            's' => urlencode($query)
        ];
        isset($rating) ? $params['rating'] = urlencode($rating) : null;
        isset($lang) ? $params['lang'] = urlencode($lang) : null;
        return Request::request($endpoint, $params);
    }

    static public function random($query, $rating)
    {
        $endpoint = 'v1/' . $type . '/random';
        $params = [
            'tag' => urlencode($query)
        ];
        isset($rating) ? $params['rating'] = urlencode($rating) : null;
        return Request::request($endpoint, $params);
    }

    static public function getUserFeeds($user_name)
    {
        $endpoint = 'v1/users/' . $user_name. '/gfycats';
        return Request::request($endpoint);
    }
}
