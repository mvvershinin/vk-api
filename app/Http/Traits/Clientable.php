<?php


namespace App\Http\Traits;

use App\Aboutus;
use Illuminate\Support\Facades\Cache;
use phpDocumentor\Reflection\Types\Integer;
use VK\Client\VKApiClient;

define('VK_SERVICE_API_KEY', env('VK_SERVICE_API_KEY'));
define('SEARCH_SIZE', 15);
define('SEARCH_CACHE', 'search_cache');
define('CACHE_TIME', 60);

trait Clientable
{
    public static function getRespose(String $q)
    {
        $vk = new VKApiClient();
        $responce = Cache::tags([SEARCH_CACHE])
            ->remember(SEARCH_CACHE, CACHE_TIME, function () use ($vk, $q) {
                return $vk->newsfeed()->search(VK_SERVICE_API_KEY, array(
                    'q' => $q,
                    'extended' => 1,
                    'start_from' => 0,
                    'count' => SEARCH_SIZE,
                    'wait' => 5000
                ));
            });

        return $responce;
    }

    public function getData(String $q, int $start)
    {
        $array = self::getRespose($q);
        $profiles = Collect($array['profiles']);

        dump($array);


        dump($profiles->mapWithKeys(function ($item) {
            return [$item['id'] => $item['first_name'] . ' ' . $item['last_name']];
        }));
        dump($array['items']);
        return $array;
    }
}
