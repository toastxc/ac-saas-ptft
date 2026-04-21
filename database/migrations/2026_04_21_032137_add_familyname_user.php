<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Renames not-null 'name' field to given name.
     * created nullable 'family_name' field.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('family_name')->nullable();
            $table->renameColumn('name', 'given_name');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('family_name');
            $table->renameColumn('given_name', 'name');
        });
    }
};
