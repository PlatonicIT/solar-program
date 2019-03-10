<?php
namespace App\Admin\Controllers;
use App\Models\Survey;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
class AnswerController extends Controller
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
    public function answer_by_zipcode($id=null, Content $content){
        $survey = Survey::findOrFail($id);
        return $content
            ->header('View Survey')
            ->body(view('admin/answer', compact('survey')));
    }
        protected function grid()
    {
        $grid = new Grid(new Survey);
        $grid->model()->orderBy('id','desc');
        $grid->actions(function ($actions) {
            $id = $actions->getKey();
            $actions->append("<a href='survey-answer/{$id}'><i class='fa fa-eye'></i></a>");
            $actions->disableEdit();
            $actions->disableView();
        });
        $grid->id('Id');
        $grid->zipcode('Zipcode');
//        $grid->survey('Survey');
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
        $show = new Show(Survey::findOrFail($id));
        $show->zipcode('Zipcode');
        $show->survey('Survey')->as(function($data){
            dd($data);
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
        $form = new Form(new Survey);
        $form->text('zipcode', 'Zipcode');
        $form->textarea('survey', 'Survey');
        return $form;
    }
}