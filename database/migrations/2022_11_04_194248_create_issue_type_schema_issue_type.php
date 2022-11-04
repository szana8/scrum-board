<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issue_type_issue_type_schema', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('issue_type_id')->references('id')->on('issue_type')->onDelete('cascade');
            $table->unsignedInteger('issue_type_schema_id')->references('id')->on('issue_type_schemas')->onDelete('cascade');
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
        Schema::dropIfExists('issue_type_schema_issue_type');
    }
};
