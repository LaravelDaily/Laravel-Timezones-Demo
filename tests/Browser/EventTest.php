<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class EventTest extends DuskTestCase
{

    public function testCreateEvent()
    {
        $admin = \App\User::find(1);
        $event = factory('App\Event')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $event) {
            $browser->loginAs($admin)
                ->visit(route('admin.events.index'))
                ->clickLink('Add new')
                ->type("title", $event->title)
                ->type("start_time", $event->start_time)
                ->press('Save')
                ->assertRouteIs('admin.events.index')
                ->assertSeeIn("tr:last-child td[field-key='title']", $event->title)
                ->assertSeeIn("tr:last-child td[field-key='start_time']", $event->start_time)
                ->logout();
        });
    }

    public function testEditEvent()
    {
        $admin = \App\User::find(1);
        $event = factory('App\Event')->create();
        $event2 = factory('App\Event')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $event, $event2) {
            $browser->loginAs($admin)
                ->visit(route('admin.events.index'))
                ->click('tr[data-entry-id="' . $event->id . '"] .btn-info')
                ->type("title", $event2->title)
                ->type("start_time", $event2->start_time)
                ->press('Update')
                ->assertRouteIs('admin.events.index')
                ->assertSeeIn("tr:last-child td[field-key='title']", $event2->title)
                ->assertSeeIn("tr:last-child td[field-key='start_time']", $event2->start_time)
                ->logout();
        });
    }

    public function testShowEvent()
    {
        $admin = \App\User::find(1);
        $event = factory('App\Event')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $event) {
            $browser->loginAs($admin)
                ->visit(route('admin.events.index'))
                ->click('tr[data-entry-id="' . $event->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='title']", $event->title)
                ->assertSeeIn("td[field-key='start_time']", $event->start_time)
                ->logout();
        });
    }

}
