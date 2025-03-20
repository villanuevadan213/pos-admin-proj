<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('transaction_items', function (Blueprint $table) {
            $table->renameColumn('transaction_id', 'order_id');
        });
    }
    
    public function down()
    {
        Schema::table('transaction_items', function (Blueprint $table) {
            $table->renameColumn('order_id', 'transaction_id');
        });
    }
};
