<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArticleModel;
use App\Models\CategoriesModel;

class Articles extends BaseController
{
    private $articleModel;
    private $categoriesModel;
    public function __construct()
    {
        $this->articleModel = new ArticleModel;
        $this->categoriesModel = new CategoriesModel;
    }
    public function index()
    {
        $viewPerPage = $this->request->getVar('viewPerPage');
        if ($viewPerPage) {
            session()->set('viewPerPage', $viewPerPage);
            return redirect()->to('article')->withInput(); // Sesuaikan URL dengan URL halaman Anda
        } else {
            $viewPerPage = session()->get('viewPerPage');
        }
        $articleData = $this->articleModel->join('users', 'users.user_id=articles.article_author_id', 'left')->join('categories', 'categories.category_id=articles.article_category_id', 'left')->paginate($viewPerPage, 'articles');
        $currentPage = $this->request->getVar('page_articles') ? $this->request->getVar('page_articles') : 1;
        $counAllArticle = $this->articleModel->countAllResults();
        $data = [
            'title' => 'Article',
            'articleData' => $articleData,
            'pager' => $this->articleModel->pager,
            'currentPage' => $currentPage,
            'viewPerPage' => $viewPerPage,
            'counAllArticle' => $counAllArticle
        ];
        return view('articles/list', $data);
    }
    public function create()
    {
        $dataCategories = $this->categoriesModel->findAll();
        $data = [
            'title' => 'Create article',
            'categories' => $dataCategories
        ];
        return view('articles/create', $data);
    }
    public function save()
    {

        $articleTitle = $this->request->getVar('title');
        $articleSlug = url_title($articleTitle, '-', true) . '-' . getRandomString(20);
        $articleContent = $this->request->getVar('content');
        $articleIntro = $this->request->getVar('preview');
        $articleCategory = $this->request->getVar('categories');

        $validationRules = [
            'title' => 'required',
            'preview' => 'required',
            'content' => 'required'
        ];
        $data = [
            'article_title' => $articleTitle,
            'article_slug' => $articleSlug,
            'article_content' => $articleContent,
            'article_intro' => $articleIntro,
            'article_author_id' => 1,
            'article_category_id' => $articleCategory,
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('article/create')->withInput()->with('validation', $this->validator);
        }
        $this->articleModel->save($data);
        session()->setFlashdata('success', 'New Article has been submited!');
        return redirect()->to('article/' . $articleSlug);
    }

    public function detail($articleSlug)
    {
        $articleData = $this->articleModel->join('users', 'users.user_id=articles.article_author_id', 'left')->join('categories', 'categories.category_id=articles.article_category_id', 'left')->where('article_slug', $articleSlug)->first();
        $data = [
            'title' => 'Detail article',
            'articleData' => $articleData
        ];
        return view('articles/detail', $data);
    }
    public function delete($articleId)
    {
        $this->articleModel->where('article_id', $articleId)->delete();
        $this->articleModel->delete($articleId);
        session()->setFlashdata('success', 'Article has been deleted!');
        return redirect()->to('article');
    }
    public function publish($articleId)
    {
        $articleSlug = $this->request->getVar('slug');
        $data = [
            'article_id' => $articleId,
            'article_status' => 'publish',
            'publish_at' => date('Y-m-d H:i:s')
        ];
        $this->articleModel->save($data);
        session()->setFlashdata('success', 'Article has been publish successfully!');
        return redirect()->to('article/' . $articleSlug);
    }
}
