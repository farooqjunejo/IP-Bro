<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('lookup_histories', function (Blueprint $table) {
            $table->id();
            $table->string('original_target');
            $table->string('normalized_target');
            $table->string('input_type');
            $table->string('resolved_ip')->nullable();
            $table->string('user_ip')->nullable();
            $table->json('result_summary')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('lookup_histories');
    }
};