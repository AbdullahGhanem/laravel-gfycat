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
        $endpoint = 'v1/search';
        $params = [
            'q' => urlencode($query),
            'limit' => (int)$limit,
            'offset' => (int)$offset
        ];
        isset($rating) ? $params['rating'] = urlencode($rating) : null;
        isset($lang) ? $params['lang'] = urlencode($lang) : null;
        return Request::request($endpoint, $params);
    }

    static public function getUserFeeds($user_name, $cursor, $count)
    {
        $endpoint = 'v1/users/' . $user_name . '/gfycats';
        $params = [];
        isset($count) ? $params['count'] = $count : null;
        isset($cursor) ? $params['cursor'] = $cursor : null;
        return Request::request($endpoint, $params);
    }
}
