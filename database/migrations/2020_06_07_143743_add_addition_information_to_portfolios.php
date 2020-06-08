<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionInformationToPortfolios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->string('full_name');
            $table->string('role')->default("FFC Student");
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('resume_link')->nullable();
            $table->string('profile_pic')->default('/portfolio-images/dp.png');
            $table->text('about_content')->default('Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure dolorum dolorem itaque odit earum dolor vitae architecto ea asperiores ab! Voluptatem, nam! Quo quisquam perferendis sit et error facilis eveniet. Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, dignissimos commodi? Modi sapiente dolorem reprehenderit architecto sint dolore, nostrum inventore consequuntur vel odit, explicabo tenetur. Sunt possimus facere id nemo. Lorem ipsum dolor sit amet consectetur adipisici.');
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
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn('full_name');
            $table->dropColumn('facebook_link');
            $table->dropColumn('twitter_link');
            $table->dropColumn('linkedin_link');
            $table->dropColumn('resume_link');
            $table->dropColumn('about_content');
            $table->dropColumn('address');
            $table->dropColumn('phone_number');
            $table->dropColumn('email');
        });
    }
}
