<?php


namespace App\services\renders;


use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;
use Twig\TemplateWrapper;

class TwigRender implements IRender
{
    protected $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader([
            dirname(dirname(__DIR__)) . '/views/layouts',
            dirname(dirname(__DIR__)) . '/views/',
        ]);

        $this->twig = new Environment($loader);
    }

    public function render($template, $params = [])
    {
//        $content = $this->renderTmpl($template, $params);
//        return $this->renderTmpl(
//            'layouts/main',
//            ['content' => $content]
//        );
        $template .= '.twig';
        return $this->twig->render($template, $params);
    }

    /**
     * @param $template
     * @param array $params
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function renderTmpl($template, $params = [])
    {
//        $template .= '.twig';
//        return $this->twig->render($template, $params);




//        ob_start();
//        extract($params);
//        include dirname(dirname(__DIR__)) . '/views/' . $template . '.php';
//        return ob_get_clean();
    }

}