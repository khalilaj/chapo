<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Home;
use Spatie\GoogleCalendar\Event;
class HomeController extends Controller
{
    public function nyumbani(){
     
      // get all future events on a calendar
$events = Event::get();
foreach($events as $event){
dd($event->attendees);
echo '<br/><br/><br/>';
}
      //present/view
    }
}
