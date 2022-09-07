<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string("gorev_adi");
            $table->string("gorevli");
            $table->string("aciklama");
            $table->bigInteger("user_id")->unsigned();
            $table->bigInteger("status_id")->unsigned();
            $table->timestamps();
            $table->softDeletes();


            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("status_id")->references("id")->on("statuses");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
