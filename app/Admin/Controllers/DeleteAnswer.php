<?php

namespace App\Admin\Controllers;

use Encore\Admin\Admin;

class DeleteAnswer
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    protected function script()
    {
        return <<<SCRIPT

        $('.grid-row-delete').unbind('click').click(function() {

            var id = $(this).data('id');

            swal({
                title: "Are you sure to delete this item ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Confirm",
                showLoaderOnConfirm: true,
                cancelButtonText: "Cancel",
                preConfirm: function() {
                    return new Promise(function(resolve) {
                        $.ajax({
                            method: 'post',
                            url: '/admin/answer/' + id,
                            data: {
                                _method:'delete',
                                _token:LA.token,
                            },
                            success: function (data) {
                                $.pjax.reload('#pjax-container');

                                resolve(data);
                            }
                        });
                    });
                }
            }).then(function(result) {
                var data = result.value;
                if (typeof data === 'object') {
                    if (data.status) {
                        swal(data.message, '', 'success');
                    } else {
                        swal(data.message, '', 'error');
                    }
                }
            });
        });

SCRIPT;
    }

    protected function render()
    {
        Admin::script($this->script());

        return "<a class='btn btn-sm btn-danger grid-row-delete' data-id='{$this->id}'><i class='fa fa-trash'> Delete</i></a>";
    }

    public function __toString()
    {
        return $this->render();
    }
}