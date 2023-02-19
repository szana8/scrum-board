<?php

use App\Enums\Priority;
use App\Models\IssueType;
use App\Models\Project;
use App\Models\User;
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
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            $table->text('body')->nullable();
            $table->string('slug')->index();
            $table->foreignIdFor(IssueType::class);
            $table->foreignIdFor(Project::class);
            $table->string('environment')->nullable();
            $table->string('components')->nullable();
            $table->enum('priority', array_map(
                fn ($priority) => $priority->name,
                Priority::cases()
            ));
            $table->string('status')->index();
            $table->dateTime('due_date')->nullable();
            $table->unsignedInteger('original_estimate_time')->nullable();
            $table->unsignedInteger('remaining_estimate_time')->nullable();
            $table->foreignIdFor(User::class, 'reporter_id');
            $table->foreignIdFor(User::class, 'assignee_id');
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
        Schema::dropIfExists('issues');
    }
};
