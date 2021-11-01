<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_category_id');
            $table->foreignId('vendor_id');
            $table->string('status')->default('Available')->comment('Available|Booking|Sold');
            $table->string('name');
            $table->string('brand');
            $table->string('model');
            $table->double('purchase_price')->default(0);
            $table->double('selling_price')->default(0);
            $table->double('vat_percentage')->default(0);
            $table->double('discount_percentage')->default(0);
            $table->string('image')->nullable();
            $table->string('registration')->nullable();
            $table->string('mileages')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->foreignId('created_by')->nullable();
            $table->foreignId('updated_by')->nullable();
            $table->foreignId('deleted_by')->nullable();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}