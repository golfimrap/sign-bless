<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSignaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signatures', function (Blueprint $table) {
            $table->id()->index();
            $table->bigInteger('bless_id')->comment('ตาราง blesses')->unsigned()->index();
            $table->string('name_surname')->comment('ชื่อ-นามสกุล');
            $table->string('slug')->index();
            $table->foreign('bless_id')->references('id')->on('blesses')->onDelete('cascade');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE signatures comment 'ตารางชื่อผู้ลงนามลงนามถวายพระพร'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('signatures');
    }
}
