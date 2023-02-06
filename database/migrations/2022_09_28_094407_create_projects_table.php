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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('key')->unique();
            $table->text('description')->nullable();
            $table
                ->enum(
                    'type',
                    array_map(
                        fn ($type) => $type->name,
                        \App\Enums\ProjectType::cases()
                    )
                )
                ->index();
            $table->string('icon')->nullable();
            $table->foreignIdFor(\App\Models\User::class, 'owner_id');
            $table
                ->foreignIdFor(\App\Models\User::class, 'default_assignee_id')
                ->nullable();
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
        Schema::dropIfExists('projects');
    }
};
