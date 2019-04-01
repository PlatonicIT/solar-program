<?php

namespace App\Admin\Controllers;

use App\Models\Ebook;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class EbookController extends Controller
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
         $row_count = Ebook::all()->count();
         return $row_count;
     }
 
    protected function grid()
    {
        $grid = new Grid(new Ebook);
        if ($this->custom_disable_create() > 0) {
            $grid->disableCreateButton();
        }
        $grid->disableFilter();
        $grid->disableExport();
        $grid->disableRowSelector();
        $grid->disablePagination();
        $grid->actions(function ($actions) {
            $id = $actions->getKey();
            $actions->append("<a class='btn btn-sm btn-info' href='ebook/{$id}' style='margin-right: 5px;'><i class='fa fa-eye'> Details</i></a>");
            $actions->append("<a class='btn btn-sm btn-success' href='ebook/{$id}/edit' style='margin-right: 5px;'><i class='fa fa-edit'> Edit</i></a>");
            $actions->append(new DeleteEbook($id));

            $actions->disableEdit();
            $actions->disableView();
            $actions->disableDelete();
        });
        $grid->ebook_page_text()->limit(50);
        $grid->ebook_button_text();
        $grid->ebook_image()->image(asset('storage'),100,100); 

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
        $show = new Show(Ebook::findOrFail($id));

       
        $show->ebook_url('Ebbok File')->file(asset('storage')."/",100,100);
        $show->ebook_page_text()->unescape();
        $show->ebook_button_text();
        $show->ebook_image()->image(asset('storage')."/",100,100); 
       

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Ebook);
        $form->editor('ebook_page_text', 'Ebook Page Text')->rules('max:5000');    
        $form->text('ebook_button_text', 'Button Text')->rules('max:150');
        $form->image('ebook_image', 'Ebook Image')->uniqueName();
        $form->file('ebook_url', 'Upload A File')->uniqueName()->rules('required');
        return $form;
    }
}
