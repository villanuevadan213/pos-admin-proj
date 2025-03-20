<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOrderIdColumnInTransactionItemsTable extends Migration
{
    public function up()
    {
        Schema::table('transaction_items', function (Blueprint $table) {
            $table->string('order_id')->change(); // Change to VARCHAR
        });
    }

    public function down()
    {
        Schema::table('transaction_items', function (Blueprint $table) {
            $table->integer('order_id')->change(); // Revert to INTEGER if needed
        });
    }
}
