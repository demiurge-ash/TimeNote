<?php

namespace Tests\Feature;

use App\Helpers\Routines;
use App\Note;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NoteTest extends TestCase
{
    use RefreshDatabase;

    protected $message = 'Test message';

    /** @test */
    public function delete_old_notes()
    {
        $twoWeekBefore = Carbon::now()->subWeek(2)->format('Y-m-d H:i:s');
        $noteCreated = factory(Note::class)->create(['time_show' => $twoWeekBefore]);

        Note::deleteOld();

        $noteFromDB = Note::whereId($noteCreated->id)->first();
        $this->assertEmpty($noteFromDB);
    }

    /** @test */
    public function create_and_view_note()
    {
        $noteCreated = factory(Note::class)->create(['message' => encrypt($this->message)]);

        $noteFromDB = Note::first();
        $this->assertEquals($noteCreated->message, $noteFromDB->message);

        $response = $this->get("/box/".$noteFromDB->hash);
        $response->assertStatus(200);
        $response->assertSee($this->message);
    }

    /** @test */
    public function create_note_and_get_warning_too_early()
    {
        $twoWeekAfter = Carbon::now()->addWeek(2)->format('Y-m-d H:i:s');
        $note = factory(Note::class)->create(['time_show' => $twoWeekAfter]);

        $response = $this->get("/box/".$note->hash);
        $response->assertStatus(200);
        $message = __('messages.error_not_now', ['time' => Routines::formatDate($note->time_show)]);
        $response->assertSee($message);
    }
}
