<?php
namespace Legestue\Tests;

use Legestue\Challenge\Tests\CardMock;
use Legestue\Challenge\CardPdf;

class CardTest extends \PHPUnit_Framework_TestCase
{
    public function testExceptionIsThrownIfTemporaryDirectoryHasNotBeenSet()
    {
        $this->markTestIncomplete();
        try {
            $pdf = new CardPdf();
            //$pdf->setLogo(new ExerciseImageMock(), 'http://motionsplan.dk');
            //$pdf->setContribLogo(new ExerciseImageMock(), 'http://vih.dk');
            $pdf->addNewPage(new ExerciseMock);
        } catch (\Exception $e) {
            $this->assertTrue(true);
        }
    }

    public function testCard()
    {
        $filename =  __DIR__ . '/test.pdf';
        $pdf = new CardPdf();
        $pdf->setTemporaryDirectory(__DIR__);
        //$pdf->setLogo(new ExerciseImageMock(), 'http://legestue.net');
        //$pdf->setContribLogo(new ExerciseImageMock(), 'http://legestue.net');
        $pdf->addNewPage(new CardMock);
        $pdf->addNewPage(new CardMock);

        // This is not really testing the library - just to see whether functions works.
        $pdf->Output($filename, 'F');

        // Test and cleanup.
        $this->assertTrue(file_exists($filename));
        //unlink($filename);
        array_map('unlink', glob(__DIR__ . '/*.png'));
    }
}
