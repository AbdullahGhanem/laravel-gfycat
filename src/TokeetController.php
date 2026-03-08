<?php

namespace Ewa\Tokeet;

class TokeetController
{
    // Rentals
    public function getRentals(array $params = [])
    {
        return Request::getRentals($params);
    }

    public function getRental(string $rentalId)
    {
        return Request::getRental($rentalId);
    }

    public function createRental(array $data)
    {
        return Request::createRental($data);
    }

    public function updateRental(string $rentalId, array $data)
    {
        return Request::updateRental($rentalId, $data);
    }

    public function deleteRental(string $rentalId)
    {
        return Request::deleteRental($rentalId);
    }

    // Inquiries
    public function getInquiries(array $params = [])
    {
        return Request::getInquiries($params);
    }

    public function getInquiry(string $inquiryId)
    {
        return Request::getInquiry($inquiryId);
    }

    public function createInquiry(array $data)
    {
        return Request::createInquiry($data);
    }

    public function updateInquiry(string $inquiryId, array $data)
    {
        return Request::updateInquiry($inquiryId, $data);
    }

    public function deleteInquiry(string $inquiryId)
    {
        return Request::deleteInquiry($inquiryId);
    }

    // Guests
    public function getGuests(array $params = [])
    {
        return Request::getGuests($params);
    }

    public function getGuest(string $guestId)
    {
        return Request::getGuest($guestId);
    }

    public function createGuest(array $data)
    {
        return Request::createGuest($data);
    }

    public function updateGuest(string $guestId, array $data)
    {
        return Request::updateGuest($guestId, $data);
    }

    // Channels
    public function getChannels(array $params = [])
    {
        return Request::getChannels($params);
    }

    // Rates
    public function getRates(string $rentalId, array $params = [])
    {
        return Request::getRates($rentalId, $params);
    }

    public function createRate(array $data)
    {
        return Request::createRate($data);
    }

    public function deleteRate(string $rateId)
    {
        return Request::deleteRate($rateId);
    }

    // Events
    public function getEvents(array $params = [])
    {
        return Request::getEvents($params);
    }

    public function createEvent(array $data)
    {
        return Request::createEvent($data);
    }

    public function deleteEvent(string $eventId)
    {
        return Request::deleteEvent($eventId);
    }

    // Invoices
    public function getInvoices(array $params = [])
    {
        return Request::getInvoices($params);
    }

    public function getInvoice(string $invoiceId)
    {
        return Request::getInvoice($invoiceId);
    }

    public function createInvoice(array $data)
    {
        return Request::createInvoice($data);
    }

    // Messages
    public function getMessages(array $params = [])
    {
        return Request::getMessages($params);
    }

    public function sendMessage(array $data)
    {
        return Request::sendMessage($data);
    }
}
