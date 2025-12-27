<?php

namespace App\Imports;

use App\Models\ImeiTracker;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts; // New import
use Maatwebsite\Excel\Concerns\WithChunkReading; // New import

class ImeiTrackersImport implements ToModel, WithHeadingRow, WithValidation, WithBatchInserts, WithChunkReading // Added new concerns
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // ... (existing model creation logic) ...
        return new ImeiTracker([
            'source_name' => $row['source_name'],
            'product_date' => $row['product_date'],
            'pi_number' => $row['pi_number'],
            'packing_list_number' => $row['packing_list_number'],
            'ean_upc_code' => $row['ean_upc_code'],
            'item_sales' => $row['item_sales'],
            'price_dp' => $row['price_dp'],
            'price_rp' => $row['price_rp'],
            'price_mrp' => $row['price_mrp'],
            'brand' => $row['brand'],
            'model_name' => $row['model_name'],
            'marketing_name' => $row['marketing_name'],
            'color' => $row['color'],
            'device_type' => $row['device_type'],
            'app_ref_hash' => $row['app_ref_hash'],
            'country_of_origin' => $row['country_of_origin'],
            'manufacturer_as_per_imei' => $row['manufacturer_as_per_imei'],
            'tac' => $row['tac'],
            'no_of_sim' => $row['no_of_sim'],
            'battery_capacity' => $row['battery_capacity'],
            'battery_capacity_tested' => $row['battery_capacity_tested'],
            'charger_adapter_type' => $row['charger_adapter_type'],
            'charger_output' => $row['charger_output'],
            'processor' => $row['processor'],
            'ram' => $row['ram'],
            'rom' => $row['rom'],
            'nfc' => $row['nfc'],
            'bluetooth' => $row['bluetooth'],
            'wlan' => $row['wlan'],
            'data_speed_dl' => $row['data_speed_dl'],
            'sar_value_w_kg' => $row['sar_value_w_kg'],
            'rear_camera' => $row['rear_camera'],
            'front_camera' => $row['front_camera'],
            'camera_resolution_in_software' => $row['camera_resolution_in_software'],
            'radio_interface' => $row['radio_interface'],
            'supported_spectrum_bands_2g' => $row['supported_spectrum_bands_2g'],
            'supported_spectrum_bands_3g' => $row['supported_spectrum_bands_3g'],
            'supported_spectrum_bands_4g' => $row['supported_spectrum_bands_4g'],
            'motherboard' => $row['motherboard'],
            'motherboard_chipset_model' => $row['motherboard_chipset_model'],
            'operating_system' => $row['operating_system'],
            'shipment_mode' => $row['shipment_mode'],
            'product_type' => $row['product_type'],
            'unit_price_import' => $row['unit_price_import'],
            'unit_price_mrp_bdt' => $row['unit_price_mrp_bdt'],
            'marketing_period' => $row['marketing_period'],
            'imei_tac_1' => $row['imei_tac_1'],
            'imei_tac_2' => $row['imei_tac_2'],
            'imei_tac_3' => $row['imei_tac_3'],
            'imei_tac_4' => $row['imei_tac_4'],
            'imei_1' => $row['imei_1'],
            'imei_2' => $row['imei_2'],
            'imei_text' => $row['imei_text'],
            'serial_no' => $row['serial_no'],
            'send_to_btrc_at' => $row['send_to_btrc_at'],
            'btrc_update_status' => $row['btrc_update_status'],
        ]);
    }

    public function rules(): array
    {
        return [
            // Add validation rules for your IMEI Tracker fields here
            // Example:
            'source_name' => 'required|string|max:255',
            'product_date' => 'nullable|date',
            'pi_number' => 'nullable|string|max:255',
            // ... add more rules as per your ImeiTracker model's validation needs
        ];
    }

    public function batchSize(): int
    {
        return 15; // Adjust based on your needs and server resources
    }

    public function chunkSize(): int
    {
        return 1000; // Adjust based on your needs and server resources
    }
}