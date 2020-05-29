<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreNoteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @dataProvider wrongValuesProvider
     */
    public function it_validates_form_with_wrong_data($formInput, $formInputValue)
    {
        $this->post('/form', [$formInput => $formInputValue])
            ->assertSessionHasErrors($formInput);
    }

    public function wrongValuesProvider()
    {
        return [
            'empty_text' => ['text', ''],
            'empty_date' => ['date', ''],
            'wrong_date' => ['date', '111'],
            'old_date' => ['date', '1999-01-01'],
            'old_full_date' => ['date', '1999-01-01 00:00:00'],
        ];
    }

    /** @test */
    public function it_validates_form_with_right_data()
    {
        $this->post('/form', [
            'text' => 'test',
            'date' => Carbon::now()->format('Y-m-d H:i:s')
        ])->assertSessionHasNoErrors();
    }

}
