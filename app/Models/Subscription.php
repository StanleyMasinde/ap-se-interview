<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Subscription
 *
 * @property int $id
 * @property int $user_id
 * @property string $subscription_date
 * @property string $status
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $next_renew_date
 * @method static \Database\Factories\SubscriptionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereSubscriptionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereUserId($value)
 * @property-read \App\Models\User|null $user
 * @mixin \Eloquent
 */
class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type', // Monthly/Annual
        'subscription_date',
        'status' // active/inactive
    ];

    /**
     * Attributes to append
     */
    protected $appends = ['next_renew_date'];

    /**
     * Get the user that the current subscription belongs to.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the next renew date attribute.
     */
    public function getNextRenewDateAttribute()
    {
        if ($this->status !== 'active') {
            return 'N/A';
        }
        if ($this->type == 'monthly') {
            return Carbon::createFromDate($this->subscriptionDate)->addMonth()->format('Y-m-d');
        }
        return Carbon::createFromDate($this->subscriptionDate)->addYear()->format('Y-m-d');
    }
}
