<?php namespace JumpLink\KrauterVonAbisZ\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateJumplinkKrautervonabiszKrauter extends Migration
{
    public function up()
    {
        Schema::create('jumplink_krautervonabisz_krauter', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name')->nullable();
            $table->string('name_latein')->nullable();
            $table->string('image')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('jumplink_krautervonabisz_krauter');
    }
}
