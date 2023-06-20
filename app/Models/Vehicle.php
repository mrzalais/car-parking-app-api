<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Vehicle
 *
 * @property int $id
 * @property int $user_id
 * @property string $plate_number
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @method static Builder|Vehicle newModelQuery()
 * @method static Builder|Vehicle newQuery()
 * @method static Builder|Vehicle onlyTrashed()
 * @method static Builder|Vehicle query()
 * @method static Builder|Vehicle whereCreatedAt($value)
 * @method static Builder|Vehicle whereDeletedAt($value)
 * @method static Builder|Vehicle whereId($value)
 * @method static Builder|Vehicle wherePlateNumber($value)
 * @method static Builder|Vehicle whereUpdatedAt($value)
 * @method static Builder|Vehicle whereUserId($value)
 * @method static Builder|Vehicle withTrashed()
 * @method static Builder|Vehicle withoutTrashed()
 * @mixin Eloquent
 */
class Vehicle extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['user_id', 'plate_number'];
}
