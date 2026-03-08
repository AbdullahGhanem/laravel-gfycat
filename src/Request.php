<?php

namespace Ewa\Tokeet;

use Illuminate\Support\Facades\Http;

class Request
{
    /**
     * Make an API request to the Tokeet API.
     */
    public static function request(string $method, string $endpoint, array $params = [])
    {
        $params['account'] = config('tokeet.account_id');

        $baseUrl = config('tokeet.base_url', 'https://capi.tokeet.com/v1');

        $response = Http::withHeaders([
            'Authorization' => config('tokeet.api_key'),
        ])->$method($baseUrl . $endpoint, $params);

        if ($response->ok()) {
            $data = $response->json();

            return collect(is_array($data) ? $data : ($data['data'] ?? $data));
        }

        return [
            'status_code' => $response->status(),
            'error' => $response->json() ?? $response->body(),
        ];
    }

    /**
     * Get all rentals.
     */
    public static function getRentals(array $params = [])
    {
        return self::request('get', '/rental', $params);
    }

    /**
     * Get a single rental by ID.
     */
    public static function getRental(string $rentalId)
    {
        return self::request('get', '/rental/' . $rentalId);
    }

    /**
     * Create a new rental.
     */
    public static function createRental(array $data)
    {
        return self::request('post', '/rental', $data);
    }

    /**
     * Update a rental.
     */
    public static function updateRental(string $rentalId, array $data)
    {
        $data['pkey'] = $rentalId;

        return self::request('put', '/rental', $data);
    }

    /**
     * Delete a rental.
     */
    public static function deleteRental(string $rentalId)
    {
        return self::request('delete', '/rental/' . $rentalId);
    }

    /**
     * Get all inquiries (bookings).
     */
    public static function getInquiries(array $params = [])
    {
        return self::request('get', '/inquiry', $params);
    }

    /**
     * Get a single inquiry by ID.
     */
    public static function getInquiry(string $inquiryId)
    {
        return self::request('get', '/inquiry/' . $inquiryId);
    }

    /**
     * Create a new inquiry.
     */
    public static function createInquiry(array $data)
    {
        return self::request('post', '/inquiry', $data);
    }

    /**
     * Update an inquiry.
     */
    public static function updateInquiry(string $inquiryId, array $data)
    {
        $data['pkey'] = $inquiryId;

        return self::request('put', '/inquiry', $data);
    }

    /**
     * Delete an inquiry.
     */
    public static function deleteInquiry(string $inquiryId)
    {
        return self::request('delete', '/inquiry/' . $inquiryId);
    }

    /**
     * Get all guests.
     */
    public static function getGuests(array $params = [])
    {
        return self::request('get', '/guest', $params);
    }

    /**
     * Get a single guest by ID.
     */
    public static function getGuest(string $guestId)
    {
        return self::request('get', '/guest/' . $guestId);
    }

    /**
     * Create a new guest.
     */
    public static function createGuest(array $data)
    {
        return self::request('post', '/guest', $data);
    }

    /**
     * Update a guest.
     */
    public static function updateGuest(string $guestId, array $data)
    {
        $data['pkey'] = $guestId;

        return self::request('put', '/guest', $data);
    }

    /**
     * Get all channels.
     */
    public static function getChannels(array $params = [])
    {
        return self::request('get', '/channel', $params);
    }

    /**
     * Get rates for a rental.
     */
    public static function getRates(string $rentalId, array $params = [])
    {
        $params['rental_id'] = $rentalId;

        return self::request('get', '/rate', $params);
    }

    /**
     * Create or update a rate.
     */
    public static function createRate(array $data)
    {
        return self::request('post', '/rate', $data);
    }

    /**
     * Delete a rate.
     */
    public static function deleteRate(string $rateId)
    {
        return self::request('delete', '/rate/' . $rateId);
    }

    /**
     * Get all events (calendar).
     */
    public static function getEvents(array $params = [])
    {
        return self::request('get', '/event', $params);
    }

    /**
     * Create an event.
     */
    public static function createEvent(array $data)
    {
        return self::request('post', '/event', $data);
    }

    /**
     * Delete an event.
     */
    public static function deleteEvent(string $eventId)
    {
        return self::request('delete', '/event/' . $eventId);
    }

    /**
     * Get all invoices.
     */
    public static function getInvoices(array $params = [])
    {
        return self::request('get', '/invoice', $params);
    }

    /**
     * Get a single invoice by ID.
     */
    public static function getInvoice(string $invoiceId)
    {
        return self::request('get', '/invoice/' . $invoiceId);
    }

    /**
     * Create an invoice.
     */
    public static function createInvoice(array $data)
    {
        return self::request('post', '/invoice', $data);
    }

    /**
     * Get all messages.
     */
    public static function getMessages(array $params = [])
    {
        return self::request('get', '/message', $params);
    }

    /**
     * Send a message.
     */
    public static function sendMessage(array $data)
    {
        return self::request('post', '/message', $data);
    }
}
