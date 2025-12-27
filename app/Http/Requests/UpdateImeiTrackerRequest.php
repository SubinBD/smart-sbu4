<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; // Import Rule for unique ignoring current record

class UpdateImeiTrackerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Will implement proper authorization later
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $imeiTrackerId = $this->route('imei_tracker'); // Assuming route parameter is 'imei_tracker'

        return [
            'source_name' => ['nullable', 'string', 'max:255'],
            'product_date' => ['nullable', 'date'],
            'pi_number' => ['nullable', 'string', 'max:255'],
            'packing_list_number' => ['nullable', 'string', 'max:255'],
            'ean_upc_code' => ['nullable', 'string', 'max:255'],
            'item_sales' => ['nullable', 'string', 'max:255'],
            'price_dp' => ['nullable', 'numeric'],
            'price_rp' => ['nullable', 'numeric'],
            'price_mrp' => ['nullable', 'numeric'],
            'brand' => ['nullable', 'string', 'max:255'],
            'model_name' => ['nullable', 'string', 'max:255'],
            'marketing_name' => ['nullable', 'string', 'max:255'],
            'color' => ['nullable', 'string', 'max:255'],
            'device_type' => ['nullable', 'string', 'max:255'],
            'app_ref_hash' => ['nullable', 'string', 'max:255'],
            'country_of_origin' => ['nullable', 'string', 'max:255'],
            'manufacturer_as_per_imei' => ['nullable', 'string', 'max:255'],
            'tac' => ['nullable', 'string', 'max:255'],
            'no_of_sim' => ['nullable', 'integer'],
            'battery_capacity' => ['nullable', 'string', 'max:255'],
            'battery_capacity_tested' => ['nullable', 'string', 'max:255'],
            'charger_adapter_type' => ['nullable', 'string', 'max:255'],
            'charger_output' => ['nullable', 'string', 'max:255'],
            'processor' => ['nullable', 'string', 'max:255'],
            'ram' => ['nullable', 'string', 'max:255'],
            'rom' => ['nullable', 'string', 'max:255'],
            'nfc' => ['nullable', 'boolean'],
            'bluetooth' => ['nullable', 'string', 'max:255'],
            'wlan' => ['nullable', 'string', 'max:255'],
            'data_speed_dl' => ['nullable', 'string', 'max:255'],
            'sar_value_w_kg' => ['nullable', 'string', 'max:255'],
            'rear_camera' => ['nullable', 'string', 'max:255'],
            'front_camera' => ['nullable', 'string', 'max:255'],
            'camera_resolution_in_software' => ['nullable', 'string', 'max:255'],
            'radio_interface' => ['nullable', 'string', 'max:255'],
            'supported_spectrum_bands_2g' => ['nullable', 'string', 'max:255'],
            'supported_spectrum_bands_3g' => ['nullable', 'string', 'max:255'],
            'supported_spectrum_bands_4g' => ['nullable', 'string', 'max:255'],
            'motherboard' => ['nullable', 'string', 'max:255'],
            'motherboard_chipset_model' => ['nullable', 'string', 'max:255'],
            'operating_system' => ['nullable', 'string', 'max:255'],
            'shipment_mode' => ['nullable', 'string', 'max:255'],
            'product_type' => ['nullable', 'string', 'max:255'],
            'unit_price_import' => ['nullable', 'numeric'],
            'unit_price_mrp_bdt' => ['nullable', 'numeric'],
            'marketing_period' => ['nullable', 'string', 'max:255'],
            'imei_tac_1' => ['nullable', 'string', 'max:255'],
            'imei_tac_2' => ['nullable', 'string', 'max:255'],
            'imei_tac_3' => ['nullable', 'string', 'max:255'],
            'imei_tac_4' => ['nullable', 'string', 'max:255'],
            'imei_1' => ['nullable', 'string', 'max:255', Rule::unique('imei_trackers')->ignore($imeiTrackerId)],
            'imei_2' => ['nullable', 'string', 'max:255', Rule::unique('imei_trackers')->ignore($imeiTrackerId)],
            'imei_text' => ['nullable', 'string'],
            'serial_no' => ['nullable', 'string', 'max:255', Rule::unique('imei_trackers')->ignore($imeiTrackerId)],
            'send_to_btrc_at' => ['nullable', 'date'],
            'btrc_update_status' => ['nullable', 'string', 'max:255'],
        ];
    }
}