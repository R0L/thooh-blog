<?php
/**
 * @desc   PhpStorm.
 * @author thooh
 * @date   2018/7/28
 */

namespace App\Http\Controllers;


use App\Events\ClickViewEvent;
use App\Models\Article;
use App\Repositorys\Interfaces\ArticleInterface;
use App\Repositorys\Interfaces\CommentInterface;
use App\Repositorys\Interfaces\LabelInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class BlogController extends Controller
{

    private $articleService = null;

    private $labelService = null;

    private $commentService = null;

    public function __construct(ArticleInterface $articleService, LabelInterface $labelService, CommentInterface $commentService)
    {
        $this->articleService = $articleService;
        $this->labelService = $labelService;
        $this->commentService = $commentService;
    }

    public function index(Request $request)
    {
        $page = $request->input('page', 0);
        $articles = $this->articleService->getList(null, null, null, null, $page);

        $cArticles = $this->articleService->getList(null, null, null, 3, 0, 3, false);


        $rArticles = $this->articleService->getList(null, null, null, 2, 0, 1, false);
        return view('blog/index', compact('articles', 'cArticles', 'rArticles'));
    }


    public function getList(Request $request)
    {
        $page = $request->input('page', 0);
        $labelId = $request->input('label_id', null);
        $articles = $this->articleService->getList(null, null, $labelId, null, $page);

        $request->session()->put('articleTotal', $articles['total']);

        $labelName = $request->input('name', null);
        $labels = $this->labelService->getList($labelName);

        $cArticles = $this->articleService->getList(null, null, null, 3, 0, 3, false);

        return view('blog/list', compact( 'page', 'articles', 'labels', 'cArticles'));
    }


    public function source(Request $request)
    {
        $page = $request->input('page', 0);
        $sourceId = $request->input('id', null);
        $articles = $this->articleService->getList(null, $sourceId, null, null, $page);

        $request->session()->put('articleTotal', $articles['total']);

        $labelName = $request->input('name', null);
        $labels = $this->labelService->getList($labelName);

        $cArticles = $this->articleService->getList(null, null, null, 3, 0, 3, false);

        return view('blog/list', compact( 'page', 'articles', 'labels', 'cArticles'));
    }


    public function show(Request $request)
    {

        $id = $request->input('id', 0);

        $article = $this->articleService->details($id);

        $articleTotal = $request->session()->get('articleTotal', 0);


        $rArticles = $this->articleService->getList($article->title, null, null, null, 0, 5, false, $id);

        $cArticles = $this->articleService->getList(null, null, null, 3, 0, 3, false);

        event(new ClickViewEvent($id));

        return view('blog/show', compact('article', 'rArticles', 'cArticles', 'articleTotal'));
    }


    public function comment(Request $request)
    {
        $articleId = $request->input('aId');
        $userName = $request->input('name');
        $userEmails = $request->input('email');
        $commentContent = $request->input('comment');
        $result = $this->commentService->add($articleId, $userName, $userEmails, 0, $commentContent);

        return redirect()->route('blog.show', ['id'=>$articleId]);
    }

}