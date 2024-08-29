<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContributionsTable extends Migration
{
    public function up()
    {
        Schema::create('contributions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('membership_id');
            $table->decimal('amount', 8, 2);
            $table->string('payment_mode');
            $table->date('payment_date');
            $table->string('contribution_type');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contributions');
    }
}
