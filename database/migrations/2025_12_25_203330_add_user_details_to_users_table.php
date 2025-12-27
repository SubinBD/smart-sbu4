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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
            $table->string('employee_id')->nullable()->unique()->after('phone');
            $table->string('position')->nullable()->after('employee_id');
            $table->string('division')->nullable()->after('position');
            $table->string('district')->nullable()->after('division');
            $table->string('upozila')->nullable()->after('district');
            $table->string('region')->nullable()->after('upozila');
            $table->string('nsm')->nullable()->after('region');
            $table->string('csm')->nullable()->after('nsm');
            $table->string('rsm')->nullable()->after('csm');
            $table->string('asm')->nullable()->after('rsm');
            $table->string('tsm')->nullable()->after('asm');
            $table->string('sr')->nullable()->after('tsm');
            $table->string('retailer')->nullable()->after('sr');
            $table->string('distributor')->nullable()->after('retailer');
            $table->string('image')->nullable()->after('distributor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone',
                'employee_id',
                'position',
                'division',
                'district',
                'upozila',
                'region',
                'nsm',
                'csm',
                'rsm',
                'asm',
                'tsm',
                'sr',
                'retailer',
                'distributor',
                'image',
            ]);
        });
    }
};
