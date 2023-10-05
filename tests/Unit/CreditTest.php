<?php

namespace Tests\Unit;

use App\Models\Credit;
use App\Models\Payment;
use App\Models\Recipient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreditTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    use RefreshDatabase;

    /** @test */
    public function it_can_calculate_monthly_payment(): void
    {
        $credit = Credit::factory()->create([
            'amount' => 1000,
            'term_months' => 12,
            'interest_rate' => 7.9,
        ]);

        $monthlyPayment = $credit->calculateMonthlyPayment();

        $this->assertEquals(89.92, round($monthlyPayment, 2));
    }

    /** @test */
    public function it_can_calculate_remaining_balance(): void
    {
        $credit = Credit::factory()->create([
            'amount' => 1000,
        ]);

        Payment::factory()->create([
            'credit_id' => $credit->id,
            'amount' => 500,
        ]);

        $remainingBalance = $credit->calculateRemainingBalance();

        $this->assertEquals(500, $remainingBalance);
    }

    /** @test */
    public function it_can_get_credit_id_1_and_add_leading_zeros(): void
    {
        $credit = Credit::factory()->create([
            'id' => '1',
            'recipient_id' => Recipient::factory()->create()->id,
            'amount' => 1000,
            'term_months' => 6,
        ]);

        $creditIdWithZeros = $credit->getCreditId();

        $this->assertEquals('0000001', $creditIdWithZeros);
    }

    /** @test */
    public function it_can_get_credit_id_10_and_add_leading_zeros(): void
    {
        $credit = Credit::factory()->create([
            'id' => '10',
            'recipient_id' => Recipient::factory()->create()->id,
            'amount' => 2300,
            'term_months' => 10,
        ]);

        $creditIdWithZeros = $credit->getCreditId();

        $this->assertEquals('0000010', $creditIdWithZeros);
    }

    /** @test */
    public function it_can_get_credit_id_1000000_and_add_leading_zeros(): void
    {
        $credit = Credit::factory()->create([
            'id' => '1000000',
            'recipient_id' => Recipient::factory()->create()->id,
            'amount' => 6000,
            'term_months' => 30,
        ]);

        $creditIdWithZeros = $credit->getCreditId();

        $this->assertEquals('1000000', $creditIdWithZeros);
    }
}
