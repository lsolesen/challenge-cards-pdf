<?php
namespace Legestue\Tests;

use Legestue\Challenge\Html;
use Legestue\Challenge\Tests\CardMock;

class HtmlTest extends \PHPUnit_Framework_TestCase
{
    protected $html;

    public function setUp()
    {
        $this->html = new Html(new CardMock);
    }

    public function testHtml()
    {
        $this->assertTrue(($this->html instanceof Html));
    }

    public function testGetHtml()
    {
        $filename = __DIR__ . '/test.html';
        $output = $this->html->getHtml();
        $this->assertTrue(is_string($output));
        file_put_contents($filename, $output);
        //unlink($filename);
    }

    public function testGetPdf()
    {
        $filename = __DIR__ . '/card.pdf';
        $output = $this->html->getPdf();
        $pdf = $output->output();
        $this->assertTrue(is_string($pdf));
        file_put_contents($filename, $pdf);
        //unlink($filename);
    }
}
