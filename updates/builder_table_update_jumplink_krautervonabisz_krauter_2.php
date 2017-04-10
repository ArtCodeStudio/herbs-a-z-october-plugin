<?php namespace JumpLink\KrauterVonAbisZ\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateJumplinkKrautervonabiszKrauter2 extends Migration
{
    public function up()
    {
        Schema::table('jumplink_krautervonabisz_krauter', function($table)
        {
            $table->text('description')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('jumplink_krautervonabisz_krauter', function($table)
        {
            $table->dropColumn('description');
        });
    }
}
