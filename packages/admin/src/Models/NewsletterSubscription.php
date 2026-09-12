<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;

class NewsletterSubscription extends Model
{
    protected $fillable = [
        'email',
        'name',
        'is_subscribed',
        'subscribed_at',
        'unsubscribed_at',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'is_subscribed' => 'boolean',
        'subscribed_at' => 'datetime',
        'unsubscribed_at' => 'datetime',
    ];
}
