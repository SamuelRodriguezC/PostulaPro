<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained();
            $table->foreignId('platform_id')->nullable()->constrained();
            $table->foreignId('application_status_id')->nullable()->constrained();
            $table->date('applied_at');
            $table->string('position', 150);
            $table->longText('job_description')->nullable();
            $table->longText('requirements')->nullable();
            $table->string('work_location', 150)->nullable();
            $table->string('schedule', 150)->nullable();
            $table->decimal('salary_min', 12, 2)->nullable();
            $table->decimal('salary_max', 12, 2)->nullable();
            $table->string('salary_currency', 10)->default('COP');
            $table->longText('company_problem')->nullable();
            $table->longText('interview_tips')->nullable();
            $table->boolean('email_sent')->default(false);
            $table->string('cv_path', 255);
            $table->string('cover_letter_path', 255)->nullable();
            $table->integer('interest_level')->default(3);
            $table->date('follow_up_date')->nullable();
            $table->date('response_date')->nullable();
            $table->integer('fit_score')->nullable();
            $table->boolean('is_remote')->default(false);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
