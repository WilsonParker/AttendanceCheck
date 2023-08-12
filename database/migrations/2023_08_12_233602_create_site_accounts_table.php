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
        Schema::create('site_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('site_type_code', 32)->nullable(false);
            $table->foreign('site_type_code')
                  ->references('code')
                  ->on('site_types')
                  ->cascadeOnUpdate();
            $table->string('account_id', 1536)->nullable(false);
            $table->string('account_password', 1536)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_accounts', function (Blueprint $table) {
            $table->dropForeign('site_accounts_site_type_code_foreign');
            $table->dropIfExists();
        });
    }
};
