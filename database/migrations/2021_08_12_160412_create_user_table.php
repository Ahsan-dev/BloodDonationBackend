<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->text('user_name');
            $table->text('mobile');
            $table->text('alt_mobile');
            $table->text('email');
            $table->text('blood_group');
            $table->text('religion');
            $table->text('gender');
            $table->text('division');
            $table->text('district');
            $table->text('police_station');
            $table->text('weight');
            $table->text('birth_date');
            $table->text('image');
            $table->text('details');
            $table->text('password');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
