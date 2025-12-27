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
        Schema::create('imei_trackers', function (Blueprint $table) {
            $table->id();
            $table->string('source_name')->nullable();
            $table->date('product_date')->nullable();
            $table->string('pi_number')->nullable();
            $table->string('packing_list_number')->nullable();
            $table->string('ean_upc_code')->nullable();
            $table->string('item_sales')->nullable();
            $table->decimal('price_dp', 10, 2)->nullable();
            $table->decimal('price_rp', 10, 2)->nullable();
            $table->decimal('price_mrp', 10, 2)->nullable();
            $table->string('brand')->nullable();
            $table->string('model_name')->nullable();
            $table->string('marketing_name')->nullable();
            $table->string('color')->nullable();
            $table->string('device_type')->nullable();
            $table->string('app_ref_hash')->nullable();
            $table->string('country_of_origin')->nullable();
            $table->string('manufacturer_as_per_imei')->nullable();
            $table->string('tac')->nullable();
            $table->integer('no_of_sim')->nullable();
            $table->string('battery_capacity')->nullable();
            $table->string('battery_capacity_tested')->nullable();
            $table->string('charger_adapter_type')->nullable();
            $table->string('charger_output')->nullable();
            $table->string('processor')->nullable();
            $table->string('ram')->nullable();
            $table->string('rom')->nullable();
            $table->boolean('nfc')->nullable();
            $table->string('bluetooth')->nullable();
            $table->string('wlan')->nullable();
            $table->string('data_speed_dl')->nullable();
            $table->string('sar_value_w_kg')->nullable();
            $table->string('rear_camera')->nullable();
            $table->string('front_camera')->nullable();
            $table->string('camera_resolution_in_software')->nullable();
            $table->string('radio_interface')->nullable();
            $table->string('supported_spectrum_bands_2g')->nullable();
            $table->string('supported_spectrum_bands_3g')->nullable();
            $table->string('supported_spectrum_bands_4g')->nullable();
            $table->string('motherboard')->nullable();
            $table->string('motherboard_chipset_model')->nullable();
            $table->string('operating_system')->nullable();
            $table->string('shipment_mode')->nullable();
            $table->string('product_type')->nullable();
            $table->decimal('unit_price_import', 10, 2)->nullable();
            $table->decimal('unit_price_mrp_bdt', 10, 2)->nullable();
            $table->string('marketing_period')->nullable();
            $table->string('imei_tac_1')->nullable();
            $table->string('imei_tac_2')->nullable();
            $table->string('imei_tac_3')->nullable();
            $table->string('imei_tac_4')->nullable();
            $table->string('imei_1')->nullable();
            $table->string('imei_2')->nullable();
            $table->text('imei_text')->nullable();
            $table->string('serial_no')->nullable();
            $table->timestamp('send_to_btrc_at')->nullable();
            $table->string('btrc_update_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imei_trackers');
    }
};
