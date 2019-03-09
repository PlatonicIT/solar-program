<?php

namespace App\Admin\Controllers;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class SettingController extends Controller
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
     public function custom_disable_create()
     {
         $row_count = Setting::all()->count();
         return $row_count;
     }
 
    protected function grid()
    {
        $grid = new Grid(new Setting);
        if ($this->custom_disable_create() > 0) {
            $grid->disableCreateButton();
        }
        $grid->disableFilter();
        $grid->disableExport();
        $grid->disableRowSelector();
        $grid->disablePagination();

        $grid->favicon('Favicon Image')->image(asset('storage')."/",100,100);;
        $grid->background('Background Image')->image(asset('storage'),100,100);;
        $grid->heading('Home Page Text')->display(function($content){
            return $content;
        });
        $grid->logo('Logo')->image(asset('storage'),100,100);;
        $grid->copyright('Copyright');
        

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
        $show = new Show(Setting::findOrFail($id));

       
        $show->favicon('Favicon Image')->image(asset('storage')."/",100,100);
        $show->background('Background')->image(asset('storage')."/",100,100);;
        $show->heading('Home Page Text')->unescape();
        $show->logo('Logo')->image(asset('storage')."/",100,100);;
        $show->copyright('Copyright');
       

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Setting);

        $form->image('favicon', 'Favicon Image')->uniqueName();
        $form->image('background', 'Background Image')->uniqueName();
        $form->editor('heading', 'Home Page Text')->rules('max:500');
        $form->image('logo', 'Logo')->uniqueName();
        $form->text('copyright', 'Copyright')->rules('max:150');

        return $form;
    }
}
