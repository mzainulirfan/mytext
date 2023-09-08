<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table            = 'articles';
    protected $primaryKey       = 'article_id';
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = true;
}
