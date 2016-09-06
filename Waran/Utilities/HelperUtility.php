<?php

namespace Waran\Utilities;

class HelperUtility
{
    /**
     * Retrieve IDs from YouTube links present in a string.
     * @param  [string] $string String containing links.
     * @return [mixed]          Returns false if nothing found.
     *                          Returns string if one found.
     *                          Returns array if multiple found.
     */
    static function youtubeID($string)
    {
        $pattern = '/https?:\/\/(?:[0-9A-Z-]+\.)?(?:youtu\.be\/|youtube\.com(?:\/embed\/|\/v\/|\/watch\?v=|\/ytscreeningroom\?v=|\/feeds\/api\/videos\/|\/user\S*[^\w\-\s]|\S*[^\w\-\s]))([\w\-]{11})[?=&+%\w-]*/i';

        // find all urls
        preg_match_all($pattern, $string, $links);

        if(count($links[1]) == 0) return (boolean) false;
        if(count($links[1]) == 1) return (string) $links[1][0];
        return (array) $links[1];
    }

    /**
     * Shorten a string and add a tail to it.
     * @param  string  $value  String to be shortened
     * @param  integer $length Length of new string
     * @param  string  $tail   Attached to end of string
     * @return string          Shortened string
     */
    static function shortenString($value, $length = 150, $tail = ' ...')
    {
        // Allow $length and $tail to be reversed when using the function to provide more flexibility.
        if(!is_int($length)) {
          $oldTail = $tail;
          $tail = $length;
          $length = (!is_int($oldTail)) ? 150 : $oldTail;
        }

        // Clean the string up by removing any HTML and new lines.
        $value = trim(strip_tags($value));
        $value = str_replace(array("\r\n", "\r"), " ", $value);

        $valueLength = mb_strlen($value);
        $newLength = $length - mb_strlen(strip_tags($tail));

        $value = ($valueLength > $length) ? mb_substr($value, 0, $newLength) . $tail : $value;

        // Remove any extra last remaining spaces and return the results.
        return trim($value);
    }
}
