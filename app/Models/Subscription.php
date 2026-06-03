<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'zip',
        'plan_key',
        'plan_label',
        'amount',
        'recurring_amount',
        'invoice_number',
        'transaction_id',
        'auth_code',
        'arb_subscription_id',
        'customer_profile_id',
        'customer_payment_profile_id',
        'status',
        'subscribed_at',
        'next_billing_date',
    ];

    protected $casts = [
        'amount'            => 'decimal:2',
        'recurring_amount'  => 'decimal:2',
        'subscribed_at'     => 'datetime',
        'next_billing_date' => 'datetime',
    ];
}
