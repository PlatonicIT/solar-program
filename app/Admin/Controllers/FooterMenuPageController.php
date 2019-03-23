<?php

namespace App\Admin\Controllers;

use App\Models\FooterMenuPage;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class FooterMenuPageController extends Controller
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
        $grid = new Grid(new FooterMenuPage);
        $grid->actions(function ($actions) {
            $id = $actions->getKey();
            $actions->append("<a class='btn btn-sm btn-info' href='footer-menu/{$id}/' style='margin-right: 5px;'><i class='fa fa-eye'> Details</i></a>");
            $actions->append("<a class='btn btn-sm btn-success' href='footer-menu/{$id}/edit' style='margin-right: 5px;'><i class='fa fa-edit'> Edit</i></a>");
            $actions->append(new DeleteMenu($id));

            $actions->disableEdit();
            $actions->disableView();
            $actions->disableDelete();
        });
    
        $grid->menu_name('Menu name');
        $grid->menu_title('Menu title');
        $grid->menu_body('Menu Body')->limit(50);
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
        $show = new Show(FooterMenuPage::findOrFail($id));

    
        $show->menu_name('Menu name');
        $show->menu_title('Menu title');
        $show->menu_body('Menu Body')->unescape();
      

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new FooterMenuPage);

        $form->text('menu_name', 'Menu name')->required()->rules('required|min:2|max:100');
        $form->text('menu_title', 'Menu title')->required()->rules('required|min:2|max:100');
        $form->editor('menu_body', 'Menu body')->required()->rules('min:100');

        return $form;
    }
}
