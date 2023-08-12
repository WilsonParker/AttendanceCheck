<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Site\SiteType::class)
                  ->constrained()
                  ->cascadeOnUpdate();
            $table->string('id', 256)->nullable(false);
            $table->string('password', 256)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sites', function (Blueprint $table) {
            $table->dropForeign(['site_type_id']);
            $table->dropIfExists();
        });
    }
};
