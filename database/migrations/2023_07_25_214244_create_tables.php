<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    public function up()
    {
        // Create roles table
        Schema::create('roles', function (Blueprint $table) {
            $table->id('role_id');
            $table->string('role_name');
            $table->timestamps();
        });

        // Create class_levels table
        Schema::create('class_levels', function (Blueprint $table) {
            $table->id('cl_id');
            $table->string('cl_name');
            $table->timestamps();
        });

        // Modify users table to include account-related columns
        Schema::table('users', function (Blueprint $table) {
            $table->string('acc_unique_num')->nullable();
            $table->string('acc_birthplace')->nullable();
            $table->date('acc_datebirth')->nullable();
            $table->string('acc_address')->nullable();
            $table->string('acc_phone')->nullable();
            $table->string('acc_religion')->nullable();
            $table->string('acc_gender')->nullable();
            $table->string('acc_class')->nullable();
            $table->unsignedBigInteger('id_role')->nullable();
            $table->unsignedBigInteger('id_cl')->nullable();
            $table->integer('nis')->nullable();


            $table->foreign('id_role')->references('role_id')->on('roles');
            $table->foreign('id_cl')->references('cl_id')->on('class_levels');
        });

        // Create transactions table
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('tr_id');
            $table->unsignedBigInteger('id_acc');
            $table->integer('tr_debt')->nullable();
            $table->integer('tr_credit')->nullable();
            $table->timestamps();

            $table->foreign('id_acc')->references('id')->on('users'); // Reference users table
        });
    }

    public function down()
    {
        // Drop the transactions table first to avoid foreign key constraint issues
        Schema::dropIfExists('transactions');

        // Modify users table to drop added columns
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['id_role']);
            $table->dropForeign(['id_cl']);

            $table->dropColumn([
                'acc_unique_num',
                'acc_birthplace',
                'acc_datebirth',
                'acc_address',
                'acc_phone',
                'acc_religion',
                'acc_gender',
                'acc_class',
                'id_role',
                'id_cl',
                'nis',
            ]);
        });


        Schema::dropIfExists('class_levels');
        Schema::dropIfExists('roles');
    }
}
