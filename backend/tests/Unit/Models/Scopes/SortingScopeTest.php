<?php

namespace Tests\Unit\Models\Scopes;

use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SortingScopeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_orders_results_by_descending_id()
    {
        $first = Patient::factory()->create();
        $second = Patient::factory()->create();
        $third = Patient::factory()->create();

        $models = Patient::all();

        $this->assertTrue($models->first()->id === $third->id);

        $expectedOrder = [$third->id, $second->id, $first->id];
        $actualOrder = $models->pluck('id')->all();
        $this->assertEquals($expectedOrder, $actualOrder);
    }
}
