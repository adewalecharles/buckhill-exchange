<?php
namespace Buckhill\Exchange\Tests;

use Tests\TestCase;

class ExchangeTest extends TestCase
{
    /** @test */
    public function test_we_can_exchange_valid_currency()
    {
        $res = $this->post('/api/exchange',['amount' => 10, 'currency' => 'USD']);

        $res->assertStatus(200);
        $res->assertJsonStructure([
            'amount',
            'currency',
            'exchange_rate',
            'converted_amount'
        ]);
    }

    /** @test */
    public function test_we_can_not_exchange_invalid_currency()
    {
        $res = $this->post('/api/exchange',['amount' => 10, 'currency' => 'USDss']);

        $res->assertStatus(500);
    }

}
