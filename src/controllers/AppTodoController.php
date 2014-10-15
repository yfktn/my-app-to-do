<?php namespace Panatau\MyAppToDo\Controllers;
/**
 * Main Controller for MyAppTodo package.
 * User: toni
 * Date: 10/10/14
 * Time: 21:37
 */
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Panatau\MyAppToDo\Storage\AppTodoInterface;
use Panatau\MyAppToDo\BaseController as MyAppToDoBaseController;

class AppTodoController extends MyAppToDoBaseController {
    /**
     * @var AppTodoInterface reference for repository
     */
    protected $todo;

    protected $layout = 'my-app-to-do::main';

    public function __construct(AppTodoInterface $todo)
    {
        $this->todo = $todo;
    }

    public function index()
    {
        $data = $this->todo->index();
        $this->layout->content = \View::make('my-app-to-do::appTodo.index')->with('todo', $data);
    }

    public function create()
    {
        $this->layout->content = \View::make('my-app-to-do::appTodo.create');
    }

    protected function handleResult($ret, $urlGood, $urlError)
    {
        if(is_array($ret))
        {
            return \Redirect::to($urlError)
                ->with('errors', $ret['errors'])
                ->withInput();
        }
        elseif($ret)
        {
            return \Redirect::to($urlGood)
                ->with('message', 'Berhasil ...');
        }
        else
        {
            return \Redirect::to($urlError)
                ->withErrors(['message'=>'UPS something wrong ...'])
                ->withInput();
        }
    }

    public function store()
    {
        $ret = $this->todo->store(\Input::all());
        return $this->handleResult($ret, route('todo/index'), route('todo/store'));
    }

    public function resetStatus($id)
    {
        if(\Request::isMethod("post"))
        {
            $ret = $this->todo->resetStatus($id, \Input::all());
            return $this->handleResult($ret, route('todo/index'), route('todo/reset-status', ['id'=>$id]));
        }
        $this->layout->content = \View::make('my-app-to-do::appTodo.resetStatus')
            ->with('todo', \Panatau\MyAppToDo\Storage\AppTodoModel::findOrFail($id));
    }


} 