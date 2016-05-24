<?php

namespace Legestue\Challenge\Tests;

use Legestue\Challenge\CardInterface;

class CardMock implements CardInterface
{
    public function getTitle()
    {
        return 'My awesome card';
    }

    public function getDescription()
    {
        return 'This is an amazing card. Everyone would want one of these cards. It is just too awesome.';
    }

    public function getCategory()
    {
        return 'Player';
    }

    public function getType()
    {
        return 'Juggle';
    }

    public function getImage()
    {
        return;
    }

    public function getPoints()
    {
        return '3/4';
    }
}
