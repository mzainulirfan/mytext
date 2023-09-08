<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArticleModel;

class Articles extends BaseController
{
    private $articleModel;
    public function __construct()
    {
        $this->articleModel = new ArticleModel;
    }
    public function index()
    {
        $perPage = $this->request->getVar('perPage');
        if ($perPage) {
            session()->set('perPage', $perPage);
            return redirect()->to('article')->withInput(); // Sesuaikan URL dengan URL halaman Anda
        } else {
            $perPage = session()->get('perPage');
        }
        $articleData = $this->articleModel->join('users', 'users.user_id=articles.article_author_id')->paginate($perPage, 'articles');
        $currentPage = $this->request->getVar('page_articles') ? $this->request->getVar('page_articles') : 1;
        $counAllArticle = $this->articleModel->countAllResults();
        $data = [
            'title' => 'Article',
            'articleData' => $articleData,
            'pager' => $this->articleModel->pager,
            'currentPage' => $currentPage,
            'perPage' => $perPage,
            'counAllArticle' => $counAllArticle
        ];
        return view('articles/list', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Create article'
        ];
        return view('articles/create', $data);
    }
    public function save()
    {

        $articleTitle = $this->request->getVar('title');
        $articleSlug = url_title($articleTitle, '-', true) . '-' . getRandomString(20);
        $articleContent = $this->request->getVar('content');

        $validationRules = [
            'title' => 'required',
            'preview' => 'required',
            'content' => 'required'
        ];
        $data = [
            'article_title' => $articleTitle,
            'article_slug' => $articleSlug,
            'article_content' => $articleContent,
            'article_author_id' => 1,
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('article/create')->withInput()->with('validation', $this->validator);
        }
        $this->articleModel->save($data);
        session()->setFlashdata('success', 'New Article has been submited!');
        return redirect()->to('article');
    }

    public function detail($articleSlug)
    {
        $articleData = $this->articleModel->join('users', 'users.user_id=articles.article_author_id')->where('article_slug', $articleSlug)->first();
        $data = [
            'title' => 'Detail article',
            'articleData' => $articleData
        ];
        return view('articles/detail', $data);
    }
}
