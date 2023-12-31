<?php

namespace App\Providers;

use App\Models\Parking;
use App\Models\Vehicle;
use App\Observers\ParkingObserver;
use App\Observers\VehicleObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Vehicle::observe(VehicleObserver::class);
        Parking::observe(ParkingObserver::class);
    }
}
