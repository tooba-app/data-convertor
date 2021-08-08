<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SalamQuranHelper extends Controller
{
    private static string $endpoint = "https://salamquran.com/api/v6/";
    private static Client $http;
    private static array $error;

    /**
     * [init description]
     *
     * @return  [type]  [return description]
     */
    private static function init()
    {
        if (!isset(self::$http)) {
            self::$http = new Client([
                "base_uri" => self::$endpoint,
            ]);
        }
        if (!isset(self::$error)) {
            self::$error = [];
        }
    }

    /**
     * [error description]
     *
     * @param   [type]  $messages  [$messages description]
     *
     * @return  [type]             [return description]
     */
    private static function error($messages)
    {
        self::$error[] = $messages;
    }

    /**
     * [execute description]
     *
     * @return  [type]  [return description]
     */
    public static function execute(
        string $_route,
        string $_method,
        array $_body = [],
        array $_headers = []
    ) {
        self::init();
        if ($_method !== "GET" && $_method !== "POST") {
            return false;
        }
        $headers = $_headers;
        if (!isset($headers["Accept"])) {
            $headers["Accept"] = "application/json";
        }
        if (!isset($headers["Content-Type"])) {
            $headers["Content-Type"] = "application/json";
        }
        if (!isset($headers["charset"])) {
            $headers["charset"] = "utf-8";
        }

        $resp = self::$http->request($_method, $_route, [
            $_method == "GET" ? "query" : "json" => $_body,
            "headers" => $headers,
        ]);

        if ($resp->getStatusCode() != 200) {
            self::error($resp->getStatusCode());
            return false;
        }

        return json_decode($resp->getBody()->getContents(), true);
    }
}
