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
        Schema::create("Job", function(Blueprint $table){
           $table->string("Title",150);
           $table->text("Description");
           $table->string("Company");
           $table->text("Location");
           $table->decimal(10,2);
           $table->enum("jobtype",['full-time', 'part-time', 'contract', 'freelance']);
           $table->enum('category', [
            'IT',
            'Finance',
            'Marketing',
            'Sales',
            'Customer Service',
            'Human Resources',
            'Healthcare',
            'Education',
            'Engineering',
            'Hospitality',
            'Retail',
            'Manufacturing',
            'Design',
            'Legal',
            'Media',
            'Construction',
            'Consulting',
            'Government',
            'Nonprofit',
            'Other'
        ]);
        $table->string("Experience_Level");
        $table->string("Education_Level");
        $table->string("contact_email");
        $table->string("contact_phone");
        $table->date("posted_date");
        $table->text("benefits");
        $table->boolean("remote_option");
        $table->text(" application_instructions");
        $table->string("status");
        $table->string("company_logo")->nullable();
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
