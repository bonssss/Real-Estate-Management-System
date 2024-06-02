<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAgentIdToPropertyTable extends Migration
{
    public function up()
    {
        Schema::table('property', function (Blueprint $table) {
            $table->unsignedBigInteger('agent_id')->nullable();

            // Define foreign key constraint
            $table->foreign('agent_id')
                  ->references('id')
                  ->on('agents')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('property', function (Blueprint $table) {
            $table->dropForeign(['agent_id']);
            $table->dropColumn('agent_id');
        });
    }
}
