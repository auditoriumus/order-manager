<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')
                ->nullable();
            $table->unsignedBigInteger('table_id')
                ->nullable();
            $table->string('table_title')->nullable();
            $table->json('menu')->nullable();
            $table->text('description')->nullable();

            $table->unsignedBigInteger('paytype_id')
                ->default(1)
                ->nullable();

            $table->boolean('payment_status')->default(false);

            $table->softDeletes();
            $table->timestamps();


            $table->foreign('paytype_id')
                ->references('id')
                ->on('paytypes');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            /*$table->foreign('table_id')
                ->references('id')
                ->on('tables');*/

            $table->unsignedInteger('total')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
