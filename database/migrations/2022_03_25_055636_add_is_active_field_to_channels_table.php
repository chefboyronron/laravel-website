<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsActiveFieldToChannelsTable extends Migration
{
    /**
     * Run the migrations.
     * Run specific migration file
     * php artisan migrate:rollback --path=./database/migrations/{FILE_NAME.php}
     * @return void
     */
    public function up()
    {
        Schema::table('channels', function (Blueprint $table) {
            $table->integer('is_active')->after('name')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     * Run specific migration file
     * php artisan migrate:rollback --path=./database/migrations/{FILE_NAME.php}
     *
     * @return void
     */
    public function down()
    {
        Schema::table('channels', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });
    }
}
