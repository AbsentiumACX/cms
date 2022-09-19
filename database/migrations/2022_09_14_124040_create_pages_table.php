<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->text('content');
            $table->integer('parent')->nullable();
            $table->timestamps();
        });

        DB::table('pages')->insert(
            array(
                'title' => 'Welkom bij ACXDev',
                'content' => '<p>Welkom bij ACXDev!</p>'
                    . '<p>Kijk vooral even rond op de website. Heb je nog vragen? Neem dan contact met ons op via ons contact formulier!</p>',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
