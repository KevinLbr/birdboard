<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\Task;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTasksTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @test
     */
    public function a_project_can_have_tasks()
    {
        $this->signIn();

        $project = auth()->user()->projects()->create(factory(Project::class)->raw());

        $this->post($project->path() . '/tasks', ['body' => 'Test task']);

        $this->get($project->path())->assertSee("Test task");
    }

    public function a_task_required_body()
    {
        $this->signIn();

        $project = auth()->user()->projects()->create(factory(Project::class)->raw());

        $attributes = factory(Task::class)->raw(['body' => '']);

        $this->post($project->path() . '/tasks', $attributes)->assertSessionHasErrors("body");
    }
}
