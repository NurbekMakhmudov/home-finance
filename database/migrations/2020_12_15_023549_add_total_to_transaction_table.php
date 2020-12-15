<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalToTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaction', function (Blueprint $table) {
            if (!Schema::hasColumn('transaction', 'total')){
                $table->double('total')->after('amount');
            };
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaction', function (Blueprint $table) {
            $table->dropColumn(['total']);
        });
    }
}
