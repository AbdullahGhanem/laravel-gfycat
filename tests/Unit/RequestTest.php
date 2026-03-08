<?php

namespace Ewa\Tokeet\Tests\Unit;

use Ewa\Tokeet\Request;
use Ewa\Tokeet\Tests\TestCase;
use Illuminate\Support\Facades\Http;

class RequestTest extends TestCase
{
    /** @test */
    public function it_makes_a_get_request_with_auth_headers()
    {
        Http::fake([
            'capi.tokeet.com/v1/rental*' => Http::response([
                ['pkey' => 'r1', 'name' => 'Beach House'],
                ['pkey' => 'r2', 'name' => 'Mountain Cabin'],
            ]),
        ]);

        $result = Request::getRentals();

        Http::assertSent(function ($request) {
            return $request->hasHeader('Authorization', 'test-api-key')
                && str_contains($request->url(), 'account=test-account-id');
        });

        $this->assertCount(2, $result);
        $this->assertEquals('Beach House', $result[0]['name']);
    }

    /** @test */
    public function it_gets_a_single_rental()
    {
        Http::fake([
            'capi.tokeet.com/v1/rental/r1*' => Http::response([
                'pkey' => 'r1',
                'name' => 'Beach House',
            ]),
        ]);

        $result = Request::getRental('r1');

        $this->assertEquals('Beach House', $result['name']);
    }

    /** @test */
    public function it_creates_a_rental()
    {
        Http::fake([
            'capi.tokeet.com/v1/rental*' => Http::response([
                'pkey' => 'r3',
                'name' => 'Lake House',
            ]),
        ]);

        $result = Request::createRental(['name' => 'Lake House']);

        Http::assertSent(function ($request) {
            return $request->method() === 'POST';
        });
    }

    /** @test */
    public function it_updates_a_rental()
    {
        Http::fake([
            'capi.tokeet.com/v1/rental*' => Http::response([
                'pkey' => 'r1',
                'name' => 'Updated House',
            ]),
        ]);

        $result = Request::updateRental('r1', ['name' => 'Updated House']);

        Http::assertSent(function ($request) {
            return $request->method() === 'PUT';
        });
    }

    /** @test */
    public function it_deletes_a_rental()
    {
        Http::fake([
            'capi.tokeet.com/v1/rental/r1*' => Http::response(['success' => true]),
        ]);

        $result = Request::deleteRental('r1');

        Http::assertSent(function ($request) {
            return $request->method() === 'DELETE';
        });
    }

    /** @test */
    public function it_gets_inquiries()
    {
        Http::fake([
            'capi.tokeet.com/v1/inquiry*' => Http::response([
                ['pkey' => 'i1', 'guest_name' => 'John'],
            ]),
        ]);

        $result = Request::getInquiries();

        $this->assertCount(1, $result);
    }

    /** @test */
    public function it_gets_guests()
    {
        Http::fake([
            'capi.tokeet.com/v1/guest*' => Http::response([
                ['pkey' => 'g1', 'name' => 'Jane Doe'],
            ]),
        ]);

        $result = Request::getGuests();

        $this->assertCount(1, $result);
    }

    /** @test */
    public function it_gets_channels()
    {
        Http::fake([
            'capi.tokeet.com/v1/channel*' => Http::response([
                ['pkey' => 'c1', 'name' => 'Airbnb'],
            ]),
        ]);

        $result = Request::getChannels();

        $this->assertCount(1, $result);
    }

    /** @test */
    public function it_gets_rates()
    {
        Http::fake([
            'capi.tokeet.com/v1/rate*' => Http::response([
                ['pkey' => 'rt1', 'amount' => 100],
            ]),
        ]);

        $result = Request::getRates('r1');

        Http::assertSent(function ($request) {
            return str_contains($request->url(), 'rental_id=r1');
        });
    }

    /** @test */
    public function it_gets_events()
    {
        Http::fake([
            'capi.tokeet.com/v1/event*' => Http::response([
                ['pkey' => 'e1', 'title' => 'Booking'],
            ]),
        ]);

        $result = Request::getEvents();

        $this->assertCount(1, $result);
    }

    /** @test */
    public function it_gets_invoices()
    {
        Http::fake([
            'capi.tokeet.com/v1/invoice*' => Http::response([
                ['pkey' => 'inv1', 'total' => 500],
            ]),
        ]);

        $result = Request::getInvoices();

        $this->assertCount(1, $result);
    }

    /** @test */
    public function it_gets_messages()
    {
        Http::fake([
            'capi.tokeet.com/v1/message*' => Http::response([
                ['pkey' => 'm1', 'body' => 'Hello'],
            ]),
        ]);

        $result = Request::getMessages();

        $this->assertCount(1, $result);
    }

    /** @test */
    public function it_sends_a_message()
    {
        Http::fake([
            'capi.tokeet.com/v1/message*' => Http::response(['success' => true]),
        ]);

        Request::sendMessage(['body' => 'Hello guest']);

        Http::assertSent(function ($request) {
            return $request->method() === 'POST';
        });
    }

    /** @test */
    public function it_returns_error_on_failed_request()
    {
        Http::fake([
            'capi.tokeet.com/v1/rental*' => Http::response(['error' => 'Unauthorized'], 401),
        ]);

        $result = Request::getRentals();

        $this->assertIsArray($result);
        $this->assertEquals(401, $result['status_code']);
    }
}
