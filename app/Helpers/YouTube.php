<?php

namespace App\Helpers;

class YouTube
{
    private static $API_URL = 'https://i.ytimg.com/vi/';

    private static $PREVIEW_DEFAULT = 'default.jpg';
    private static $PREVIEW_HQ = 'hqdefault.jpg';
    private static $PREVIEW_MAX = 'maxresdefault.jpg';

    public static function getVideoId($url)
    {
        preg_match("/\?v=(.*)/im", $url, $result);
        if (!isset($result[1]) || !$result[1])
            preg_match("/youtu\.be\/(.*)/im", $url, $result);

        return isset($result[1]) ? $result[1] : null;
    }

    public static function getVideoTitle($url)
    {
        try {
            $html = file_get_contents($url);
            preg_match("/<title>(.*)<\/title>/im", $html, $result);
            $result = str_replace(' - YouTube', '', $result);

            return isset($result[1]) ? $result[1] : null;
        } catch (\Exception $e){
            return null;
        }
    }

    public static function getVideoPreview($url, $format='default'){
        $id = self::getVideoId($url);
        if (!$id) return null;

        switch ($format) {
            case 'default': $format_result = self::$PREVIEW_DEFAULT; break;
            case 'hq': $format_result = self::$PREVIEW_HQ; break;
            case 'max': $format_result = self::$PREVIEW_MAX; break;
            default: $format_result = self::$PREVIEW_DEFAULT;
        }

        return self::$API_URL.$id.'/'.$format_result;
    }

    public static function parseLink( $url ){
        
        $isShortLink = strpos($url,'youtu.be');

        if( $isShortLink ){
            $url = explode('?', $url)[0];
            $url = str_replace('youtu.be/','www.youtube.com/watch?v=', $url);
        }

        return $url;
    }
}
