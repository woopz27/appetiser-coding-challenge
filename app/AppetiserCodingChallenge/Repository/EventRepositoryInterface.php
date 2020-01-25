<?php
namespace App\AppetiserCodingChallenge\Repository;

interface EventRepositoryInterface {
  
  public function createEvent($request);

  public function getEvent();

}