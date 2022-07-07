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
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->timestamps();
        });
        DB::table('grupos')
            ->insert([
                "tipo" => "Familia"
            ]);
        DB::table('grupos')
            ->insert([
                "tipo" => "Amigos"
            ], [
                "tipo" => "otros"
            ]);
        DB::table('grupos')
            ->insert([
                "tipo" => "otros"
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos');
    }
};
