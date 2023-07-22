<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variations', function (Blueprint $table) {
            $table->id();
            $table->string('variant');
            $table->decimal('price', 20, 2)->default(0);
            $table->decimal('cost', 20, 2)->default(0);
            $table->integer('quantity')->default(0);
            $table->string('sku')->nullable();
            $table
                ->foreignId('option_id')
                ->constrained()
                ->onDelete('cascade')
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variations');
    }
};
