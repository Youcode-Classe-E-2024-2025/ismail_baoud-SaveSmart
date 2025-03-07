<?php
namespace Tests\Feature;

use App\Http\Controllers\GoalController;
use PHPUnit\Framework\TestCase;

class GoalControllerTest extends TestCase
{
    /**
     * Test the allocateFunds method which doesn't require database access.
     */
    public function test_it_allocates_funds_correctly()
    {
        // Create mock goals as simple objects
        $goal1 = new \stdClass();
        $goal1->target = 500;

        $goal2 = new \stdClass();
        $goal2->target = 1500;

        // Create controller
        $controller = new GoalController();

        // Call the allocateFunds method
        $allocatedFunds = $controller->allocateFunds([$goal1, $goal2], 1000);

        // Assertions
        $this->assertNotEmpty($allocatedFunds);
        $this->assertEquals(2, count($allocatedFunds));

        // Check that the allocation is proportional to the targets
        // 20% of 1000 = 200, so we're allocating 200 total
        // goal1 should get 500/(500+1500) * 200 = 50
        // goal2 should get 1500/(500+1500) * 200 = 150
        $this->assertEquals(50, $allocatedFunds[0]['allocated']);
        $this->assertEquals(150, $allocatedFunds[1]['allocated']);
    }

    /**
     * Test the allocateFunds method with zero total target.
     */
    public function test_it_handles_zero_total_target()
    {
        // Create mock goals with zero targets
        $goal1 = new \stdClass();
        $goal1->target = 0;

        $goal2 = new \stdClass();
        $goal2->target = 0;

        // Create controller
        $controller = new GoalController();

        // Call the allocateFunds method
        $allocatedFunds = $controller->allocateFunds([$goal1, $goal2], 1000);

        // Assertions
        $this->assertNotEmpty($allocatedFunds);
        $this->assertEquals(2, count($allocatedFunds));

        // Check that all allocations are zero
        $this->assertEquals(0, $allocatedFunds[0]['allocated']);
        $this->assertEquals(0, $allocatedFunds[1]['allocated']);
    }

    /**
     * Test the allocateFunds method with empty goals array.
     */
    public function test_it_handles_empty_goals()
    {
        // Create controller
        $controller = new GoalController();

        // Call the allocateFunds method with empty array
        $allocatedFunds = $controller->allocateFunds([], 1000);

        // Assertions
        $this->assertEmpty($allocatedFunds);
    }
}
