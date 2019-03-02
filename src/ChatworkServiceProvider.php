<?php

namespace Revolution\NotificationChannels\Chatwork;

use GuzzleHttp\Client as HttpClient;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

class ChatworkServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->app->when(ChatworkChannel::class)
                  ->needs(Chatwork::class)
                  ->give(function () {
                      return new Chatwork(
                          Config::get('services.chatwork.api_token'),
                          new HttpClient(),
                          Config::get('services.chatwork.endpoint')
                      );
                  });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
