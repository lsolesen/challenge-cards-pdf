<?php
namespace Legestue\Challenge;

use Legestue\Challange\PointInterface;

interface CardInterface
{
    public function getTitle();
    public function getDescription();
    public function getCategory();
    public function getType();
    public function getImage();
    public function getPoints();
}
