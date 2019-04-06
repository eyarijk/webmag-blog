<?php

namespace App\Tests\Unit;

use App\Service\ImageUpload;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageUploadTest extends TestCase
{
    /**
     * @var string
     */
    private $dir;

    /**
     * @var UploadedFile
     */
    private $image;

    /**
     * @var string|null
     */
    private $path;

    public function setUp()
    {
        $this->dir = sys_get_temp_dir();

        $file = tempnam($this->dir, 'upl');

        imagepng(imagecreatetruecolor(10, 10), $file);

        $this->image = new UploadedFile(
            $file,
            'image.png',
            null,
            null,
            true
        );
    }

    public function testUploadImage(): void
    {
        $imageUpload = new ImageUpload($this->dir);

        $fileName = $imageUpload->upload($this->image);

        $this->path = $this->dir . DIRECTORY_SEPARATOR . $fileName;

        $this->assertFileExists($this->path);
        $this->assertEquals(mime_content_type($this->path),'image/png');
    }

    public function tearDown(): void
    {
        unlink($this->path);
    }
}
