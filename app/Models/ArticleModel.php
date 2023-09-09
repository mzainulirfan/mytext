<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table            = 'articles';
    protected $primaryKey       = 'article_id';
    protected $allowedFields    = ['article_title', 'article_slug', 'article_content', 'article_intro', 'article_status', 'article_author_id', 'article_category_id', 'publish_at'];

    // Dates
    protected $useTimestamps = true;
}
