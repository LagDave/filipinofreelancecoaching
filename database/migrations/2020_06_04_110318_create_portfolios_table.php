<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedInteger('user_id');
            $table->string('username');
            $table->string('theme')->default('litera');

            $table->string('full_name');
            $table->string('role')->default("FFC Student");
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('resume_link')->nullable();
            $table->string('profile_pic')->default('/portfolio-images/dp.png');
            $table->text('about_content')->nullable();
            $table->string('address')->default('Bldg. 21, Sunflower st., Barangay Matina, Davao City');
            $table->string('phone_number')->default('0910xxxxxxx');
            $table->string('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portfolios');
    }
}
