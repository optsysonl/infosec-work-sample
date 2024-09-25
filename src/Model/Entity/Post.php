<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Post Entity
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $body
 */
class Post extends Entity
{
    protected $_fields = ['title', 'description', 'body'];
}
