<?php
namespace App\AppetiserCodingChallenge\Repository\Eloquent;

use App\AppetiserCodingChallenge\Repository\EventRepositoryInterface;
use App\AppetiserCodingChallenge\Models\Event;

class EventRepository implements EventRepositoryInterface {
  
  public function __construct(Event $event) {
      $this->event = $event;
  }
  
  public function createEvent($request) {
    $this->event->truncate();
    for($i = 0; $i < count($request); $i++) {
        $this->event->insert([
          ['event_year' => $request[$i]['year'], 'event_month' => $request[$i]['month'], 'event_day' => $request[$i]['day'], 'event_name' => $request[$i]['event_name']]
        ]);
    }
    return true;
  }

  public function getEvent() {

    return $this->event->get();

  }
}