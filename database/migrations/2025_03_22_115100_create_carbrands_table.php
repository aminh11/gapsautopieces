<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carbrands', function (Blueprint $table) {
            $table->id(); // id auto_increment
            $table->string('name'); // nom de la marque
            $table->string('slug')->unique(); // slug unique
            $table->timestamps(); // created_at / updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carbrands');
    }
};
