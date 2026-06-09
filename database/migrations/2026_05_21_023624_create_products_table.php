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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // ဒေတာဘေ့စ် ချိတ်ဆက်မှု: category_id က categories table ထဲက id ကို လှမ်းချိတ်တာပါ
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('name'); // Computer / Product နာမည်
            $table->text('description'); // Specification တွေ (ဥပမာ - Core i7, 16GB RAM)
            $table->decimal('price', 10, 2); // ဈေးနှုန်း
            $table->integer('stock')->default(0); // ပစ္စည်းလက်ကျန် အရေအတွက်
            $table->string('image')->nullable(); // Computer ပုံ သိမ်းဖို့
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
