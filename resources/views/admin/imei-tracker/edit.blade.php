@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card mt-2">
                <div class="card-header">
                    <h3 class="card-title">Edit IMEI Tracker Entry: {{ $imeiTracker->model_name }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.imei-tracker.update', $imeiTracker->id) }}" method="POST">
                        @csrf
                        @method('PUT') {{-- Use PUT method for update --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="source_name">Source Name</label>
                                    <input type="text" name="source_name" id="source_name" class="form-control @error('source_name') is-invalid @enderror" value="{{ old('source_name', $imeiTracker->source_name) }}">
                                    @error('source_name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="product_date">Product Date</label>
                                    <input type="date" name="product_date" id="product_date" class="form-control @error('product_date') is-invalid @enderror" value="{{ old('product_date', $imeiTracker->product_date ? $imeiTracker->product_date->format('Y-m-d') : '') }}">
                                    @error('product_date')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pi_number">PI Number</label>
                                    <input type="text" name="pi_number" id="pi_number" class="form-control @error('pi_number') is-invalid @enderror" value="{{ old('pi_number', $imeiTracker->pi_number) }}">
                                    @error('pi_number')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="packing_list_number">Packing List Number</label>
                                    <input type="text" name="packing_list_number" id="packing_list_number" class="form-control @error('packing_list_number') is-invalid @enderror" value="{{ old('packing_list_number', $imeiTracker->packing_list_number) }}">
                                    @error('packing_list_number')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ean_upc_code">EAN UPC Code</label>
                                    <input type="text" name="ean_upc_code" id="ean_upc_code" class="form-control @error('ean_upc_code') is-invalid @enderror" value="{{ old('ean_upc_code', $imeiTracker->ean_upc_code) }}">
                                    @error('ean_upc_code')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="item_sales">Item Sales</label>
                                    <input type="text" name="item_sales" id="item_sales" class="form-control @error('item_sales') is-invalid @enderror" value="{{ old('item_sales', $imeiTracker->item_sales) }}">
                                    @error('item_sales')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price_dp">Price (DP)</label>
                                    <input type="number" step="0.01" name="price_dp" id="price_dp" class="form-control @error('price_dp') is-invalid @enderror" value="{{ old('price_dp', $imeiTracker->price_dp) }}">
                                    @error('price_dp')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price_rp">Price (RP)</label>
                                    <input type="number" step="0.01" name="price_rp" id="price_rp" class="form-control @error('price_rp') is-invalid @enderror" value="{{ old('price_rp', $imeiTracker->price_rp) }}">
                                    @error('price_rp')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price_mrp">Price (MRP)</label>
                                    <input type="number" step="0.01" name="price_mrp" id="price_mrp" class="form-control @error('price_mrp') is-invalid @enderror" value="{{ old('price_mrp', $imeiTracker->price_mrp) }}">
                                    @error('price_mrp')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="brand">Brand</label>
                                    <input type="text" name="brand" id="brand" class="form-control @error('brand') is-invalid @enderror" value="{{ old('brand', $imeiTracker->brand) }}">
                                    @error('brand')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="model_name">Model Name</label>
                                    <input type="text" name="model_name" id="model_name" class="form-control @error('model_name') is-invalid @enderror" value="{{ old('model_name', $imeiTracker->model_name) }}">
                                    @error('model_name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="marketing_name">Marketing Name</label>
                                    <input type="text" name="marketing_name" id="marketing_name" class="form-control @error('marketing_name') is-invalid @enderror" value="{{ old('marketing_name', $imeiTracker->marketing_name) }}">
                                    @error('marketing_name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="color">Color</label>
                                    <input type="text" name="color" id="color" class="form-control @error('color') is-invalid @enderror" value="{{ old('color', $imeiTracker->color) }}">
                                    @error('color')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="device_type">Device Type</label>
                                    <input type="text" name="device_type" id="device_type" class="form-control @error('device_type') is-invalid @enderror" value="{{ old('device_type', $imeiTracker->device_type) }}">
                                    @error('device_type')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="app_ref_hash">App Ref#</label>
                                    <input type="text" name="app_ref_hash" id="app_ref_hash" class="form-control @error('app_ref_hash') is-invalid @enderror" value="{{ old('app_ref_hash', $imeiTracker->app_ref_hash) }}">
                                    @error('app_ref_hash')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="country_of_origin">Country of Origin</label>
                                    <input type="text" name="country_of_origin" id="country_of_origin" class="form-control @error('country_of_origin') is-invalid @enderror" value="{{ old('country_of_origin', $imeiTracker->country_of_origin) }}">
                                    @error('country_of_origin')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="manufacturer_as_per_imei">Manufacturer (IMEI)</label>
                                    <input type="text" name="manufacturer_as_per_imei" id="manufacturer_as_per_imei" class="form-control @error('manufacturer_as_per_imei') is-invalid @enderror" value="{{ old('manufacturer_as_per_imei', $imeiTracker->manufacturer_as_per_imei) }}">
                                    @error('manufacturer_as_per_imei')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tac">TAC</label>
                                    <input type="text" name="tac" id="tac" class="form-control @error('tac') is-invalid @enderror" value="{{ old('tac', $imeiTracker->tac) }}">
                                    @error('tac')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="no_of_sim">No of SIM</label>
                                    <input type="number" name="no_of_sim" id="no_of_sim" class="form-control @error('no_of_sim') is-invalid @enderror" value="{{ old('no_of_sim', $imeiTracker->no_of_sim) }}">
                                    @error('no_of_sim')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="battery_capacity">Battery Capacity</label>
                                    <input type="text" name="battery_capacity" id="battery_capacity" class="form-control @error('battery_capacity') is-invalid @enderror" value="{{ old('battery_capacity', $imeiTracker->battery_capacity) }}">
                                    @error('battery_capacity')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="battery_capacity_tested">Battery Capacity (Tested)</label>
                                    <input type="text" name="battery_capacity_tested" id="battery_capacity_tested" class="form-control @error('battery_capacity_tested') is-invalid @enderror" value="{{ old('battery_capacity_tested', $imeiTracker->battery_capacity_tested) }}">
                                    @error('battery_capacity_tested')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="charger_adapter_type">Charger/Adapter Type</label>
                                    <input type="text" name="charger_adapter_type" id="charger_adapter_type" class="form-control @error('charger_adapter_type') is-invalid @enderror" value="{{ old('charger_adapter_type', $imeiTracker->charger_adapter_type) }}">
                                    @error('charger_adapter_type')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="charger_output">Charger Output</label>
                                    <input type="text" name="charger_output" id="charger_output" class="form-control @error('charger_output') is-invalid @enderror" value="{{ old('charger_output', $imeiTracker->charger_output) }}">
                                    @error('charger_output')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="processor">Processor</label>
                                    <input type="text" name="processor" id="processor" class="form-control @error('processor') is-invalid @enderror" value="{{ old('processor', $imeiTracker->processor) }}">
                                    @error('processor')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ram">RAM</label>
                                    <input type="text" name="ram" id="ram" class="form-control @error('ram') is-invalid @enderror" value="{{ old('ram', $imeiTracker->ram) }}">
                                    @error('ram')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="rom">ROM</label>
                                    <input type="text" name="rom" id="rom" class="form-control @error('rom') is-invalid @enderror" value="{{ old('rom', $imeiTracker->rom) }}">
                                    @error('rom')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nfc">NFC</label>
                                    <select name="nfc" id="nfc" class="form-control @error('nfc') is-invalid @enderror">
                                        <option value="1" {{ old('nfc', $imeiTracker->nfc) == '1' ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ old('nfc', $imeiTracker->nfc) == '0' ? 'selected' : '' }}>No</option>
                                    </select>
                                    @error('nfc')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bluetooth">Bluetooth</label>
                                    <input type="text" name="bluetooth" id="bluetooth" class="form-control @error('bluetooth') is-invalid @enderror" value="{{ old('bluetooth', $imeiTracker->bluetooth) }}">
                                    @error('bluetooth')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="wlan">WLAN</label>
                                    <input type="text" name="wlan" id="wlan" class="form-control @error('wlan') is-invalid @enderror" value="{{ old('wlan', $imeiTracker->wlan) }}">
                                    @error('wlan')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="data_speed_dl">Data Speed (D/L)</label>
                                    <input type="text" name="data_speed_dl" id="data_speed_dl" class="form-control @error('data_speed_dl') is-invalid @enderror" value="{{ old('data_speed_dl', $imeiTracker->data_speed_dl) }}">
                                    @error('data_speed_dl')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sar_value_w_kg">SAR Value (W/Kg)</label>
                                    <input type="text" name="sar_value_w_kg" id="sar_value_w_kg" class="form-control @error('sar_value_w_kg') is-invalid @enderror" value="{{ old('sar_value_w_kg', $imeiTracker->sar_value_w_kg) }}">
                                    @error('sar_value_w_kg')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="rear_camera">Rear Camera</label>
                                    <input type="text" name="rear_camera" id="rear_camera" class="form-control @error('rear_camera') is-invalid @enderror" value="{{ old('rear_camera', $imeiTracker->rear_camera) }}">
                                    @error('rear_camera')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="front_camera">Front Camera</label>
                                    <input type="text" name="front_camera" id="front_camera" class="form-control @error('front_camera') is-invalid @enderror" value="{{ old('front_camera', $imeiTracker->front_camera) }}">
                                    @error('front_camera')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="camera_resolution_in_software">Camera Resolution (Software)</label>
                                    <input type="text" name="camera_resolution_in_software" id="camera_resolution_in_software" class="form-control @error('camera_resolution_in_software') is-invalid @enderror" value="{{ old('camera_resolution_in_software', $imeiTracker->camera_resolution_in_software) }}">
                                    @error('camera_resolution_in_software')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="radio_interface">Radio Interface</label>
                                    <input type="text" name="radio_interface" id="radio_interface" class="form-control @error('radio_interface') is-invalid @enderror" value="{{ old('radio_interface', $imeiTracker->radio_interface) }}">
                                    @error('radio_interface')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="supported_spectrum_bands_2g">Supported Spectrum Bands (2G)</label>
                                    <input type="text" name="supported_spectrum_bands_2g" id="supported_spectrum_bands_2g" class="form-control @error('supported_spectrum_bands_2g') is-invalid @enderror" value="{{ old('supported_spectrum_bands_2g', $imeiTracker->supported_spectrum_bands_2g) }}">
                                    @error('supported_spectrum_bands_2g')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="supported_spectrum_bands_3g">Supported Spectrum Bands (3G)</label>
                                    <input type="text" name="supported_spectrum_bands_3g" id="supported_spectrum_bands_3g" class="form-control @error('supported_spectrum_bands_3g') is-invalid @enderror" value="{{ old('supported_spectrum_bands_3g', $imeiTracker->supported_spectrum_bands_3g) }}">
                                    @error('supported_spectrum_bands_3g')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="supported_spectrum_bands_4g">Supported Spectrum Bands (4G)</label>
                                    <input type="text" name="supported_spectrum_bands_4g" id="supported_spectrum_bands_4g" class="form-control @error('supported_spectrum_bands_4g') is-invalid @enderror" value="{{ old('supported_spectrum_bands_4g', $imeiTracker->supported_spectrum_bands_4g) }}">
                                    @error('supported_spectrum_bands_4g')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="motherboard">Motherboard</label>
                                    <input type="text" name="motherboard" id="motherboard" class="form-control @error('motherboard') is-invalid @enderror" value="{{ old('motherboard', $imeiTracker->motherboard) }}">
                                    @error('motherboard')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="motherboard_chipset_model">Motherboard/Chipset Model</label>
                                    <input type="text" name="motherboard_chipset_model" id="motherboard_chipset_model" class="form-control @error('motherboard_chipset_model') is-invalid @enderror" value="{{ old('motherboard_chipset_model', $imeiTracker->motherboard_chipset_model) }}">
                                    @error('motherboard_chipset_model')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="operating_system">Operating System</label>
                                    <input type="text" name="operating_system" id="operating_system" class="form-control @error('operating_system') is-invalid @enderror" value="{{ old('operating_system', $imeiTracker->operating_system) }}">
                                    @error('operating_system')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="shipment_mode">Shipment Mode</label>
                                    <input type="text" name="shipment_mode" id="shipment_mode" class="form-control @error('shipment_mode') is-invalid @enderror" value="{{ old('shipment_mode', $imeiTracker->shipment_mode) }}">
                                    @error('shipment_mode')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="product_type">Product Type (CBU/CKD/SKD)</label>
                                    <input type="text" name="product_type" id="product_type" class="form-control @error('product_type') is-invalid @enderror" value="{{ old('product_type', $imeiTracker->product_type) }}">
                                    @error('product_type')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="unit_price_import">Unit Price $ (Import)</label>
                                    <input type="number" step="0.01" name="unit_price_import" id="unit_price_import" class="form-control @error('unit_price_import') is-invalid @enderror" value="{{ old('unit_price_import', $imeiTracker->unit_price_import) }}">
                                    @error('unit_price_import')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="unit_price_mrp_bdt">Unit Price BDT (MRP)</label>
                                    <input type="number" step="0.01" name="unit_price_mrp_bdt" id="unit_price_mrp_bdt" class="form-control @error('unit_price_mrp_bdt') is-invalid @enderror" value="{{ old('unit_price_mrp_bdt', $imeiTracker->unit_price_mrp_bdt) }}">
                                    @error('unit_price_mrp_bdt')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="marketing_period">Marketing Period</label>
                                    <input type="text" name="marketing_period" id="marketing_period" class="form-control @error('marketing_period') is-invalid @enderror" value="{{ old('marketing_period', $imeiTracker->marketing_period) }}">
                                    @error('marketing_period')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="imei_tac_1">IMEI TAC 1</label>
                                    <input type="text" name="imei_tac_1" id="imei_tac_1" class="form-control @error('imei_tac_1') is-invalid @enderror" value="{{ old('imei_tac_1', $imeiTracker->imei_tac_1) }}">
                                    @error('imei_tac_1')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="imei_tac_2">IMEI TAC 2</label>
                                    <input type="text" name="imei_tac_2" id="imei_tac_2" class="form-control @error('imei_tac_2') is-invalid @enderror" value="{{ old('imei_tac_2', $imeiTracker->imei_tac_2) }}">
                                    @error('imei_tac_2')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="imei_tac_3">IMEI TAC 3</label>
                                    <input type="text" name="imei_tac_3" id="imei_tac_3" class="form-control @error('imei_tac_3') is-invalid @enderror" value="{{ old('imei_tac_3', $imeiTracker->imei_tac_3) }}">
                                    @error('imei_tac_3')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="imei_tac_4">IMEI TAC 4</label>
                                    <input type="text" name="imei_tac_4" id="imei_tac_4" class="form-control @error('imei_tac_4') is-invalid @enderror" value="{{ old('imei_tac_4', $imeiTracker->imei_tac_4) }}">
                                    @error('imei_tac_4')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="imei_1">IMEI 1</label>
                                    <input type="text" name="imei_1" id="imei_1" class="form-control @error('imei_1') is-invalid @enderror" value="{{ old('imei_1', $imeiTracker->imei_1) }}">
                                    @error('imei_1')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="imei_2">IMEI 2</label>
                                    <input type="text" name="imei_2" id="imei_2" class="form-control @error('imei_2') is-invalid @enderror" value="{{ old('imei_2', $imeiTracker->imei_2) }}">
                                    @error('imei_2')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="imei_text">IMEI TEXT</label>
                                    <textarea name="imei_text" id="imei_text" class="form-control @error('imei_text') is-invalid @enderror" rows="3">{{ old('imei_text', $imeiTracker->imei_text) }}</textarea>
                                    @error('imei_text')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="serial_no">Serial No</label>
                                    <input type="text" name="serial_no" id="serial_no" class="form-control @error('serial_no') is-invalid @enderror" value="{{ old('serial_no', $imeiTracker->serial_no) }}">
                                    @error('serial_no')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="send_to_btrc_at">Send to BTRC At</label>
                                    <input type="datetime-local" name="send_to_btrc_at" id="send_to_btrc_at" class="form-control @error('send_to_btrc_at') is-invalid @enderror" value="{{ old('send_to_btrc_at', $imeiTracker->send_to_btrc_at ? $imeiTracker->send_to_btrc_at->format('Y-m-d\TH:i') : '') }}">
                                    @error('send_to_btrc_at')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="btrc_update_status">BTRC Update Status</label>
                                    <input type="text" name="btrc_update_status" id="btrc_update_status" class="form-control @error('btrc_update_status') is-invalid @enderror" value="{{ old('btrc_update_status', $imeiTracker->btrc_update_status) }}">
                                    @error('btrc_update_status')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Update Entry</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection