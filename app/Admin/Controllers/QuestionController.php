<?php

namespace App\Admin\Controllers;

use App\Models\Question;
use App\Http\Controllers\Controller;
use App\Admin\Controllers\DeleteQuestion;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class QuestionController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Question);
        $grid->model()->orderBy('id','asc');
        $grid->actions(function ($actions) {
            $id = $actions->getKey();
            $actions->append("<a class='btn btn-sm btn-info' href='question/{$id}/edit' style='margin-right: 5px;'><i class='fa fa-eye'> Details</i></a>");
            $actions->append("<a class='btn btn-sm btn-success' href='question/{$id}/edit' style='margin-right: 5px;'><i class='fa fa-edit'> Edit</i></a>");
            $actions->append(new DeleteQuestion($id));

            $actions->disableEdit();
            $actions->disableView();
            $actions->disableDelete();
        });
        $grid->question('Question')->sortable();
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Question::findOrFail($id));
        $show->question('Question');
        $show->question_options('Question Options', function ($option) {
            $option->question_option();
            $option->option_type()->display(function ($data){
                if ($data=='1'){
                    return 'Radio';
                }elseif ($data=='2'){
                    return 'Text';
                }
            });


            // Disbale action
            $option->disableCreateButton();
            $option->disablePagination();
            $option->disableFilter();
            $option->disableRowSelector();
            $option->disableActions();
            $option->disableExport();

        });

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Question);

        $form->text('question', 'Question')->rules('required|min:5|max:191')->required();
        $form->hasMany('question_options', function (Form\NestedForm $form) {
            $form->text('question_option')->rules('required|min:2|max:100');
            $form->select('option_type','Option Type')->options(['1'=>'Radio','2'=>'Text','4'=>'Paragraph'])->default(1);
        });

        return $form;
    }
}
