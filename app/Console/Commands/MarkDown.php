<?php

namespace App\Console\Commands;

use App\Repositorys\Interfaces\ArticleInterface;
use App\Repositorys\Interfaces\MarkDownInterface;
use Illuminate\Console\Command;
use Illuminate\Routing\Route;
use Spatie\Browsershot\Browsershot;

class MarkDown extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:markdown';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public $markDown = null;
    public $article = null;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(MarkDownInterface $markDown, ArticleInterface $article)
    {
        parent::__construct();
        $this->markDown = $markDown;
        $this->article = $article;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $paths = traverse(storage_path('app/public/data'));
        $sourceName = "make in ROL";
        $sourceInfo = "make in ROL";
        foreach($paths as $path=>$files)
        {
            $insertData = [];
            $labelName = pathinfo($path, PATHINFO_FILENAME);
            foreach($files as $file)
            {
                $fileTile = pathinfo($file, PATHINFO_FILENAME);
                $content = $this->markDown->parse(file_get_contents($file));

                $imageUrl = public_path('images/')  . $fileTile . '.jpg';
                createImage($fileTile, $imageUrl);

                $insertData[] = ['title' => $fileTile, 'userId' => 1, 'content' => $content, 'sourceName'=>$sourceName, 'imageUrl'=>'http://192.168.56.101/images/' . $fileTile . '.jpg', 'labelName'=>$labelName, 'sourceName'=>$sourceName, 'sourceInfo'=>$sourceInfo];
            }
            $this->article->add($insertData);
        }
    }
}
