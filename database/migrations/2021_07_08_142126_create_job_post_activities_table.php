<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPostActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_post_activities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('job_seeker_id', false, true);
            $table->bigInteger('job_post_id', false, true);
            $table->timestamps();

            // $table->primary(['job_seeker_id','job_post_id']);
            $table->foreign('job_seeker_id')->references('id')->on('job_seekers');
            $table->foreign('job_post_id')->references('id')->on('job_posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_post_activities');
    }
}
