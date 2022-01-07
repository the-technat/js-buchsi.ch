<?php

return function($page) {

 // generate events array based on all listed childrens 
 // sorted by startdate ascending and without past events
  $events = $page->children()->listed()->sortBy(function ($event) {
    if ($event->blueprint()->title() == "JS-Nami") {
      return $event->date()->toDate();
    } else {
      return $event->startdate()->toDate();
    }
  }, 'asc')->filter(function ($event) {
    if ($event->blueprint()->title() == "JS-Nami") {
      return $event->date()->toDate() > time();
    } else {
      return $event->startdate()->toDate() > time();
    }
  });

  return [
    'events' => $events 
  ];
}

?>