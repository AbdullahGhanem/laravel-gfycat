<?php

namespace Ghanem\Gfycat;

use Ghanem\Gfycat\Request;

class GfycatController
{
    public function search($query, $limit = 25, $offset = 0, $rating = null, $lang = null)
    {
        return Request::search('gifs', $query, $limit, $offset, $rating, $lang);
    }


    public function getUserFeeds($user_id, $cursor = null, $count = null)
    {
        return Request::getUserFeeds($user_id, $cursor, $count);
    }
}
