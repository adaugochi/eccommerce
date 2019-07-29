<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products',function (Blueprint $table){
            $table->integer('quantity')->after('amount');
            $table->string('status')->after('title');
            $table->foreign('status')->references('key')->on('statuses')->onDelete('cascade');
            $table->integer('bought_items')->default(0)->after('quantity');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function($table) {
            $table->dropColumn(['quantity', 'status', 'bought_item', 'created_by']);
        });
    }
}
