<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('device_id')->constrained()->onDelete('cascade');
            $table->text('description');
            $table->enum('status', ['en cours', 'terminée']);
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->decimal('cost', 10, 2)->nullable();
        });
    }

    public function down(): void {
        Schema::dropIfExists('repairs');
    }
};
