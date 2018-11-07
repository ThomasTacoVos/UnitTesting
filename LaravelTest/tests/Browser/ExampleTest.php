<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     * @throws \Exception
     * @throws \Throwable
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel Unittesting')
                    ->clickLink('Form Products')
                    ->assertPathIs('/unittesting2/unittesing/public/products/create')
                    ->value('#name', 'speelgoedauto')
                    ->value('#description', 'Een mooie speelgoedauto')
                    ->click('input[type="submit"]')
                    ->assertPathIs('/unittesting2/unittesing/public/products');
        });
    }
}
