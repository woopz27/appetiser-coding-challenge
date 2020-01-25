<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppetiserCodingChallenge\Repository\EventRepositoryInterface;

class EventController extends Controller
{
    public function __construct(EventRepositoryInterface $event) {
        $this->event = $event;
    }
    public function saveEvent(Request $request) {
        $create_event = $this->event->createEvent($request->data);
        return response()->json($create_event);
    }
    public function getEvent() {
        $get_event = $this->event->getEvent();
        return response()->json($get_event);
    }
}
