<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {

            //creo la colonna con unsignedBigInteger
            $table->unsignedBigInteger('type_id')->nullable()->after('id');

            //creo la FK
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //elimino la FK
            // $table->dropForeign('projects_type_id_foreign');
            $table->dropForeign(['type_id']);

            //elimino la colonna
            $table->dropColumn('type_id');
        });
    }
};
