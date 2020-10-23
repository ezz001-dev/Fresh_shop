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
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->string('username');
            $table->string('email')->unique(); //=> eorror jadi tidak bisa repeat order
            $table->text('addres');
            $table->string('country');
            $table->string('provinci');
            $table->string('districts');
            $table->string('city');
            $table->string('sub_districts');
            $table->string('pos_Code');
            $table->integer('total');
            $table->string('payment');
            $table->enum('status',['WAITING','PROCESS','FINISH','CANCEL']);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
