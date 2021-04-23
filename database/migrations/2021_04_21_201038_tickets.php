<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_user')->unsigned()->nullable();
            $table->foreign('id_user')->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict')
                ->default(NULL);
    
            $table->string('assunto');
            $table->text('descricao');

            $table->bigInteger('status')->unsigned()->default('1');  
            /*
            $table->foreign('status')->references('id')->on('status_tickets')
            ->onDelete('cascade')
            ->onUpdate('cascade')->default('1');            
            */
     
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
