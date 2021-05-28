<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBlessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blesses', function (Blueprint $table) {
            $table->id()->index();
            $table->string('title_name')->comment('ชื่อวันลงนาม');
            $table->string('slug')->index();
            $table->string('file_background')->comment('ชื่อไฟล์รูปพื้นหลัง');
            $table->string('file_picture')->comment('ชื่อไฟล์รูป');
            $table->string('file_text')->comment('ชื่อไฟล์รูปข้อความ');
            $table->date('start_date_bless')->comment('วันที่เริ่มลงนาม');
            $table->date('end_date_bless')->comment('วันที่สิ้นสุดลงนาม');
            $table->string('button_text')->comment('ปุ่มกด');
            $table->string('button_color')->comment('สีปุ่มกด');
            $table->string('text_color')->comment('สีปุ่มกด');
            $table->integer('status')->comment('สถานะการใช้งาน 1 = active, 0 = disable')->default(0)->unsigned();
            $table->timestamps();
        });

        DB::statement("ALTER TABLE blesses comment 'ตารางวันสำคัญ'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blesses');
    }
}
