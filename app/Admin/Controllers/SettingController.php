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
        $grid->actions(function ($actions) {
            $id = $actions->getKey();
            $actions->append("<a class='btn btn-sm btn-info' href='setting/{$id}' style='margin-right: 5px;'><i class='fa fa-eye'> Details</i></a>");
            $actions->append("<a class='btn btn-sm btn-success' href='setting/{$id}/edit' style='margin-right: 5px;'><i class='fa fa-edit'> Edit</i></a>");
            $actions->append(new DeleteSetting($id));

            $actions->disableEdit();
            $actions->disableView();
            $actions->disableDelete();
        });
        $grid->favicon('Favicon Image')->image(asset('storage')."/",50,50);;
        $grid->background('Background Image')->image(asset('storage'),50,50);;
        $grid->heading('Home Page Text')->limit(20);
        $grid->logo('Logo')->image(asset('storage'),50,50);;
        $grid->copyright('Copyright')->limit(20);
        $grid->thank_you_message()->limit(20);
        $grid->button_text()->limit(20);

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
        $show->thank_you_message()->unescape();
        $show->button_text();
       

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
        $form->tab('Main Setting',function($form){
            $form->image('favicon', 'Favicon Image')->uniqueName();
            $form->image('background', 'Background Image')->uniqueName();
            $form->editor('heading', 'Home Page Text')->rules('max:500');
            $form->image('logo', 'Logo')->uniqueName();
            $form->text('copyright', 'Copyright')->rules('max:150');
        })->tab('Thank You Message',function($form){
            $form->editor('thank_you_message', 'Thank You Message')->rules('max:2000');    
            $form->text('button_text', 'Button Text')->rules('max:150');    
        });
      

        return $form;
    }
}
