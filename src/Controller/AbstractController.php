<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\NoteModel;
use App\Request;
use App\View;
use App\Exception\ConfigurationException;

abstract class AbstractController
{
    protected const DEFAULT_ACTION = 'list';

    private static array $configuration = [];

    protected NoteModel $database;
    protected Request $request;
    protected View $view;

    public static function initConfiguration(array $configuration): void
    {
        self::$configuration = $configuration;
    }

    public function __construct(Request $request)
    {
        if(empty(self::$configuration['db'])) {
            throw new ConfigurationException('Configuration error');
        }
        $this->database = new NoteModel(self::$configuration['db']);

        $this->request = $request;
        $this->view = new View();
    }

    final public function run(): void
    {
        try {
            $action = $this->action() . 'Action';

            if(!method_exists($this,$action)) {
                $action = self::DEFAULT_ACTION . 'Action';
            }
            $this->$action();
        } catch (StorageException $exception) {
            $this->view->render('error',['message' => $exception->getMessage()]);
        } catch (NotFoundException $exception) {
            $this->redirect('/',['error' => 'NoteNotFound']);
        }
    }

    final protected function redirect(string $to, array $params): void
    {
        $location = $to;

        if(count($params)) {
            $queryParams = [];
            foreach ($params as $key => $val) {
                $queryParams[] = urlencode($key). '=' . urlencode($val);
            }

            $queryParams = implode('&',$queryParams);
            $location .= '?' . $queryParams;
        }
        header("Location: $location");
        exit;
    }

    final private function action(): string
    {
        return $this->request->getParam('action', self::DEFAULT_ACTION);
    }
}