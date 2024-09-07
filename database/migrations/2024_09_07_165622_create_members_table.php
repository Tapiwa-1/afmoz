<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('first_name'); // Member's first name
            $table->string('last_name'); // Member's last name
            $table->string('email')->nullable(); // Member's email address
            $table->string('phone'); // Member's phone number
            $table->string('address')->nullable(); // Member's address
            $table->foreignId('church_id')->constrained()->onDelete('cascade'); // Foreign key referencing the 'churches' table
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
