<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Illuminate\Contracts\Events\Dispatcher;
use App\Status;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add([
                'text' => 'Registrar evento',
                'icon' => 'share',
                'submenu' => [
                    [
                        'text' => 'Contacto Telefónico',
                        'url'  => route('contacts/form', ['event_type_id' => 1])
                    ],
                    [
                        'text' => 'Contacto en Oficina',
                        'url'  => route('contacts/form', ['event_type_id' => 2])
                    ],
                    [
                        'text' => 'Muestra de Propiedad ',
                        'url'  => route('properties_schedules/form', ['event_type_id'=> 3])
                    ],
                ]
            ]);
            $event->menu->add('BUSCAR POR ESTADO');
            $statuses = Status::all();
            foreach ($statuses as $status) {
                $event->menu->add([
                    'text' => $status->title,
                    'url' => 'clients_status/' . $status->id,
                    'hexa_color' => $status->color
                ]);
            };
        });
    }
}
