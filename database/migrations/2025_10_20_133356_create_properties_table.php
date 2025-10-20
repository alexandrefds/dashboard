<?php

use App\Enums\PropertiesTypesEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->text('description', 225);
            $table->boolean('for_sale')->default(false);
            $table->boolean('for_rent')->default(false);
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->decimal('rent_price', 10, 2)->nullable();
            $table->decimal('condominium_price', 10, 2)->nullable();
            $table->enum('type', array_column(PropertiesTypesEnum::cases(), 'value'));
            $table->boolean('active')->default(false);

            $table->foreignId('created_by')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
