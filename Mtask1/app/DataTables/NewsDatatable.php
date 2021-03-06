<?php

namespace App\DataTables;

use App\Model\News;
use Yajra\DataTables\Services\DataTable;

class NewsDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('checkbox', 'admin.categories.btn.checkbox')
            ->addColumn('edit', 'admin.categories.btn.edit')
            ->addColumn('delete', 'admin.categories.btn.delete')
            ->rawColumns(['edit',
            'delete','checkbox',] );
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
       
        return News::query()->with('cat_id')->select('news.*');;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                   // ->addAction(['width' => '80px'])
                  //  ->parameters($this->getBuilderParameters());
                  ->parameters([
                      'dom'=>'Blfrtip',
                      
                      'buttons'=>[
                          ['text'=>'<i class="fa fa-plus "></i>'.trans('admin.create_admin'),
                          "action"=>"function(){
                               window.location.href='".\URL::current()."/create';}",
                          'className'=>'btn btn-info'],
                        
                        ['extend'=>'reload', 'className'=>'btn btn-warnning ','text'=>'<i class="fa fa-refresh"></i> Refresh'],
                        ['text'=>'<i class="fa fa-trash "></i>'.trans('admin.delete_all'),'className'=>'btn btn-danger delbtn'], 
                    ],
                      'leangthMenu'=>[10,25,50,100],[10,25,50,trans('admin.all_record')],
                      "initComplete"=> "function () {
                        this.api().columns([2]).every(function () {
                            var column = this;
                            var input = document.createElement(\"input\");
                            $(input).appendTo($(column.footer()).empty())
                            .on('keyup', function () {
                                column.search($(this).val()).draw();
                            });
                        });
                    }",
                    'language' => [
                        'sProcessing' => trans('admin.sProcessing'),
                             'sLengthMenu'        => trans('admin.sLengthMenu'),
                             'sZeroRecords'       => trans('admin.sZeroRecords'),
                             'sEmptyTable'        => trans('admin.sEmptyTable'),
                             'sInfo'              => trans('admin.sInfo'),
                             'sInfoEmpty'         => trans('admin.sInfoEmpty'),
                             'sInfoFiltered'      => trans('admin.sInfoFiltered'),
                             'sInfoPostFix'       => trans('admin.sInfoPostFix'),
                             'sSearch'            => trans('admin.sSearch'),
                             'sUrl'               => trans('admin.sUrl'),
                             'sInfoThousands'     => trans('admin.sInfoThousands'),
                             'sLoadingRecords'    => trans('admin.sLoadingRecords'),
                             'oPaginate'          => [
                                 'sFirst'            => trans('admin.sFirst'),
                                 'sLast'             => trans('admin.sLast'),
                                 'sNext'             => trans('admin.sNext'),
                                 'sPrevious'         => trans('admin.sPrevious'),
                             ],
                             'oAria'            => [
                                 'sSortAscending'  => trans('admin.sSortAscending'),
                                 'sSortDescending' => trans('admin.sSortDescending'),
                             ],
                     ]
                  ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            
            [
                'name'=>'checkbox',
                'data'=>'checkbox',
                'title'=>'<input type="checkbox" class="check_all" onClick="check_all();">',
                'exportable'=>false,
                'searchable'=>false,
                'printable'=>false,
                'orderable'=>false,

            ],
            [
                'name'=>'id',
                'data'=>'id',
                'title'=>'ID',
            ],
            [
                'name'=>'title',
                'data'=>'title',
                'title'=>'Title',
            ],
            [
                'name'=>'cat_id.nane',
                'data'=>'cat_id.name',
                'title'=>'Category',
            ],
            
          
            [
                'name'=>'edit',
                'data'=>'edit',
                'title'=>'Edit',
                'exportable'=>false,
                'searchable'=>false,
                'printable'=>false,
                'orderable'=>false

            ],
            [
                'name'=>'delete',
                'data'=>'delete',
                'title'=>'Delete',
                'exportable'=>false,
                'searchable'=>false,
                'printable'=>false,
                'orderable'=>false

            ],
           
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'News_' . date('YmdHis');
    }
}
