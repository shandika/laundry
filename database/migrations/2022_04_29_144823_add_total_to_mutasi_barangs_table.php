<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalToMutasiBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mutasi_barangs', function (Blueprint $table) {
            $table->bigInteger('total')->after('jumlah_akhir');
            $table->bigInteger('sisa')->after('total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mutasi_barangs', function (Blueprint $table) {
            $table->dropColumn('total');
            $table->dropColumn('sisa');
        });
    }
}
