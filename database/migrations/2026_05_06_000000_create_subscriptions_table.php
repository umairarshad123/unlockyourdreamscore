<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();

            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email', 150);
            $table->string('phone', 30);
            $table->string('address', 255);
            $table->string('city', 100);
            $table->string('state', 10);
            $table->string('zip', 20);

            $table->string('plan_key', 50);
            $table->string('plan_label', 150);
            $table->decimal('amount', 10, 2);
            $table->decimal('recurring_amount', 10, 2)->nullable();

            $table->string('invoice_number', 100)->unique();
            $table->string('transaction_id', 100)->nullable();
            $table->string('auth_code', 50)->nullable();
            $table->string('arb_subscription_id', 100)->nullable();
            $table->string('customer_profile_id', 100)->nullable();
            $table->string('customer_payment_profile_id', 100)->nullable();

            $table->string('status', 30)->default('active');
            $table->timestamp('subscribed_at')->nullable();
            $table->timestamp('next_billing_date')->nullable();

            $table->timestamps();

            $table->index('email');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
