<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Zone
 *
 * @property int $id
 * @property string $name
 * @property int $price_per_hour
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Zone newModelQuery()
 * @method static Builder|Zone newQuery()
 * @method static Builder|Zone query()
 * @method static Builder|Zone whereCreatedAt($value)
 * @method static Builder|Zone whereId($value)
 * @method static Builder|Zone whereName($value)
 * @method static Builder|Zone wherePricePerHour($value)
 * @method static Builder|Zone whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Zone extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price_per_hour'];
}
