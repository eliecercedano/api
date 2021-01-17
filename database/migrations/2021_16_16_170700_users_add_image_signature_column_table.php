<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UsersAddImageSignatureColumnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->string('image')->nullable();            
            $table->string('signature')->nullable();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('image');
            $table->dropColumn('signature');
        });
    }
}
