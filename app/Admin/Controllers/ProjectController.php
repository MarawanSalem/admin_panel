<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Projects;

class ProjectController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Projects';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Projects());

        $grid->column('id', __('Id'));
        $grid->column('project_title', __('Project title'));
        $grid->column('project_description', __('Project description'));
        $grid->column('project_deadline', __('Project deadline'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Projects::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('project_title', __('Project title'));
        $show->field('project_description', __('Project description'));
        $show->field('project_deadline', __('Project deadline'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Projects());

        $form->text('project_title', __('Project title'));
        $form->text('project_description', __('Project description'));
        $form->datetime('project_deadline', __('Project deadline'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
