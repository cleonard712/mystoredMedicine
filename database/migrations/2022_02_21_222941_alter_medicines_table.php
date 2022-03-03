<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicines',function(Blueprint $table){
            $table ->string('generic_name');
             $table ->string('form');
            $table->string('restriction_formula');
            $table -> double('price',12,2);
            $table ->string('description');
            $table->boolean('faskes_TK1');
            $table->boolean('faskes_TK2');
            $table->boolean('faskes_TK3');
            $table->string('url');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicines',function(Blueprint $table){
            $table ->dropColumn('generic_name');
             $table ->dropColumn('form');
             $table ->dropColumn('restriction_formula');
             $table ->dropColumn('forms');
             $table ->dropColumn('faskes_TK1');
             $table ->dropColumn('faskes_TK2');
             $table ->dropColumn('faskes_TK3');
            });
    }
}
