<?php
namespace Legestue\Challenge;

use Legestue\Challenge\CardInterface;
use Dompdf\Dompdf;

class Html
{
    protected $html;
    protected $card;

    public function __construct(CardInterface $card)
    {
        $this->card = $card;
        $loader = new \Twig_Loader_Filesystem(__DIR__);
        $twig = new \Twig_Environment($loader, array('debug' => true));
        $twig->addExtension(new \Twig_Extension_Debug());
        $template = $twig->loadTemplate('card.html');
        $this->html = $template->render(array(
            'card' => $this->card
        ));
    }

    public function getHtml()
    {
        return $this->html;
    }

    public function getPdf()
    {
        $dompdf = new Dompdf();
        $dompdf->setBasePath(__DIR__);
        $dompdf->loadHtml($this->html);
        $dompdf->setPaper('A7', 'portrait');
        $dompdf->render();
        return $dompdf;
    }
}
