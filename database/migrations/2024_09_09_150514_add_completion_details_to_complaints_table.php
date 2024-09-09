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
        Schema::table('complaints', function (Blueprint $table) {
            $table->text('completion_note')->nullable();
            $table->string('completion_image')->nullable();
            $table->timestamp('completed_date')->nullable();
        });
    }

    public function down()
    {
        Schema::table('complaints', function (Blueprint $table) {
            $table->dropColumn('completion_note');
            $table->dropColumn('completion_image');
            $table->dropColumn('completed_at');
        });
    }
};
