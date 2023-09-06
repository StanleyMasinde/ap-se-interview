<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type', // Monthly/Annual
        'subscription_date',
        'status' // active/inactive
    ];

    protected $appends = ['next_renew_date'];

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
