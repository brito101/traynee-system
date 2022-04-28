<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->integer('code');
            $table->string('name');
            $table->string('interval')->default('month');
            $table->integer('trial_days')->default(0);
            $table->decimal('amount', 12, 2)->default(0);
            $table->integer('payment_methods')->nullable();
            $table->boolean('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    //     array:13 [▼
    //     "id" => "plan_9O8vK6XkfWfR1mzl"
    //     "name" => "sdadasd"
    //     "url" => "plans/plan_9O8vK6XkfWfR1mzl/escola-tecnica-test/sdadasd"
    //     "interval" => "month"
    //     "interval_count" => 1
    //     "billing_type" => "prepaid"
    //     "payment_methods" => array:1 [▼
    //       0 => "boleto"
    //     ]
    //     "installments" => array:1 [▶]
    //     "status" => "active"
    //     "currency" => "BRL"
    //     "created_at" => "2022-04-27T23:53:45Z"
    //     "updated_at" => "2022-04-27T23:53:45Z"
    //     "items" => array:1 [▼
    //       0 => array:7 [▼
    //         "id" => "pi_rxe9N1PiZ8i5zZnP"
    //         "name" => "sdadasd"
    //         "quantity" => 1
    //         "status" => "active"
    //         "created_at" => "2022-04-27T23:53:45Z"
    //         "updated_at" => "2022-04-27T23:53:45Z"
    //         "pricing_scheme" => array:2 [▼
    //           "price" => 111
    //           "scheme_type" => "unit"
    //         ]
    //       ]
    //     ]
    //   ]


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
