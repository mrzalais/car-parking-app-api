<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Parking
 *
 * @property int $id
 * @property int $user_id
 * @property int $vehicle_id
 * @property int $zone_id
 * @property Carbon|null $start_time
 * @property Carbon|null $stop_time
 * @property int|null $total_price
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Parking newModelQuery()
 * @method static Builder|Parking newQuery()
 * @method static Builder|Parking query()
 * @method static Builder|Parking whereCreatedAt($value)
 * @method static Builder|Parking whereId($value)
 * @method static Builder|Parking whereStartTime($value)
 * @method static Builder|Parking whereStopTime($value)
 * @method static Builder|Parking whereTotalPrice($value)
 * @method static Builder|Parking whereUpdatedAt($value)
 * @method static Builder|Parking whereUserId($value)
 * @method static Builder|Parking whereVehicleId($value)
 * @method static Builder|Parking whereZoneId($value)
 * @property-read Vehicle $vehicle
 * @property-read Zone $zone
 * @method static Builder|Parking active()
 * @method static Builder|Parking stopped()
 * @mixin Eloquent
 */
class Parking extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'vehicle_id', 'zone_id', 'start_time', 'stop_time', 'total_price'];

    protected $casts = [
        'start_time' => 'datetime',
        'stop_time' => 'datetime',
    ];

    public function zone(): BelongsTo
    {
        return $this->belongsTo(Zone::class);
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function scopeActive($query)
    {
        return $query->whereNull('stop_time');
    }

    public function scopeStopped($query)
    {
        return $query->whereNotNull('stop_time');
    }

    protected static function booted(): void
    {
        static::addGlobalScope('user', function (Builder $builder) {
            $builder->where('user_id', auth()->id());
        });
    }
}
