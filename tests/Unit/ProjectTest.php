<?php

namespace Tests\Unit;

use App\Models\Project;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_has_a_path()
    {
        $project = factory(Project::class)->create();

        $this->assertEquals("/projects/{$project->id}", $project->path());
    }

    /**
     * @test
     */
    public function it_belongs_to_an_owner()
    {
        $project = factory(Project::class)->create();

        $this->assertInstanceOf(User::class, $project->owner);
    }

    /**
     * @test
     */
    public function it_can_add_task()
    {
        $project = factory(Project::class)->create();

        $task = $project->addTask('Test task');

        $this->assertCount(1, $project->tasks);
        $this->assertTrue($project->tasks->contains($task));
    }
}
