<?php

namespace App\Providers;

use App\Services\Parser;
use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\ClientBuilder;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->bindSearchClient();
    }

    public function boot(): void
    {
        JsonResource::withoutWrapping();
    }

    private function bindSearchClient()
    {
        $this->app->bind(Client::class, function () {
            return ClientBuilder::create()
                ->setHosts(config('services.elastic.hosts'))
                ->setBasicAuthentication('elastic', ' zcH-vO0emq1OnZaULGRS')
                ->build();
        });
    }
}
