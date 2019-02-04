<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropOauthClientGrantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('oauth_client_grants');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('oauth_client_grants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_id', 40);
            $table->string('grant_id', 40);
            $table->timestamps();

            $table->index('client_id');
            $table->index('grant_id');

            $table->foreign('client_id')
                ->references('id')->on('oauth_clients')
                ->onDelete('cascade')
                ->onUpdate('no action');

            $table->foreign('grant_id')
                ->references('id')->on('oauth_grants')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
    }
}