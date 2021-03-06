<?php

namespace App\Providers;

use Laravel\Lumen\Application;
use Illuminate\Support\ServiceProvider;

/**
 * Class ConfigsServiceProvider.
 *
 * Загружаем все конфиги, описанные в директории ./config
 */
class ConfigsServiceProvider extends ServiceProvider
{
    /**
     * Регистрация сервис-провайдера.
     */
    public function register()
    {
        $app = $this->getApp();

        foreach (glob($app->getConfigurationPath() . '*.php', GLOB_ERR) as $path) {
            $app->configure(basename($path, '.php'));
        }
    }

    /**
     * Возвращает инстанс приложения.
     *
     * @return Application
     */
    protected function getApp()
    {
        return app(Application::class);
    }
}
