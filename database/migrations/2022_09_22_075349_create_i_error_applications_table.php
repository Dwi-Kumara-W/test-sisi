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
        Schema::create('i_error_applications', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('error_date');
            $table->string('modules');
            $table->string('controller');
            $table->string('function');
            $table->string('error_line');
            $table->string('error_message');
            $table->string('status');
            $table->string('param');
            $table->string('created_date')->nullable();
            $table->string('deleted_mark')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('i_error_applications');
    }
};
