<?php

namespace Tests\Feature;

use Tests\TestCase;

class ChangelogPageTest extends TestCase
{
    public function test_changelog_page_lists_releases(): void
    {
        $this->get('/changelog')
            ->assertOk()
            ->assertSee('What’s new in Joey')
            ->assertSee('0.2.1')
            ->assertSee('Built-in video player');
    }

    public function test_home_page_links_to_changelog(): void
    {
        $this->get('/')->assertOk()->assertSee('href="/changelog"', escape: false);
    }
}
