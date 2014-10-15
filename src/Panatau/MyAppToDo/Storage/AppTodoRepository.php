<?php namespace Panatau\MyAppToDo\Storage;
/**
 * AppTodoRepository
 * User: toni
 * Date: 10/10/14
 * Time: 13:27
 */
use Panatau\MyAppToDo\Storage\AppTodoInterface;
use Panatau\MyAppToDo\Storage\AppTodoModel as AppTodo;
use DB;
use Validator;

class AppTodoRepository implements AppTodoInterface {

    /**
     * Get Rules
     * @return array
     */
    protected function getRules()
    {
        return [
            'title' => ['required', 'min: 10'],
            'description' => ['required'],
            // the value of type must be in the array keys of enum_type
            'type' => ['required', 'in:'. implode(',', array_keys(AppTodo::$enum_type))],
        ];
    }

    protected function getResetStatusRules()
    {
        return [
            'status' => ['required', 'in:'. implode(',', array_keys(AppTodo::$enum_status))],
        ];
    }

    public function getStatistic() {

        $todoStat = DB::table(AppTodo::getTableName())
            ->select(DB::raw('COUNT(*) AS cnt_type, status'))
            ->groupBy('status')
            ->get();

        return $todoStat;
    }

    public function index()
    {
        return AppTodo::orderBy('status', 'desc')->orderBy('created_at', 'desc')->get();
    }

    /**
     * Set $input with User Input and if it's failed with Validator then array of MessageBag will return
     * @param array $input
     * @return array|bool
     */
    public function store(Array $input)
    {
        $todo = new AppTodo;
        $validator = Validator::make($input, $this->getRules());
        if($validator->fails())
        {
            return ['errors'=>$validator->errors()];
        }
        $todo->fill($input);
        return $todo->save();
    }

    public function resetStatus($id, $input)
    {
        $todo = AppTodo::findOrFail($id);
        $validator = Validator::make($input, $this->getResetStatusRules());
        if($validator->fails())
        {
            return ['errors'=>$validator->errors()];
        }
        $todo->fill($input);
        return $todo->save();
    }
}