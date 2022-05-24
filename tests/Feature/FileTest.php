<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_read_just_txt_or_json_file()
    {
        Storage::fake('affiliates');

        $file = UploadedFile::fake()
            ->createWithContent(
                'test.php',
                '{"latitude": "52.986375", "affiliate_id": 101, "name": "John Travolta 1", "longitude": "-6.043701"}'
            );
        $response = $this->json('POST', 'files/read', ['file'=>$file]);
        $response->assertStatus(422);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_read_file_and_save_content_in_db()
    {
        Storage::fake('affiliates');

        $file = UploadedFile::fake()
            ->createWithContent(
                'test.json',
                '{"latitude": "52.986375", "affiliate_id": 101, "name": "John Travolta 1", "longitude": "-6.043701"}'
            );
        $response = $this->json('POST', 'files/read', ['file'=>$file]);
        $response->assertRedirect();
        $this->assertDatabaseHas('affiliates', ['affiliate_id' => '101']);
    }
}
