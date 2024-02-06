<?php

namespace App\DataTables;

use App\Models\RefInstansi;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RefInstansiDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', static fn (RefInstansi $refInstansi) => view('components.datatable-action', [
                'editLink' => route('admin.ref-instansi.edit', $refInstansi),
                'deleteLink' => route('admin.ref-instansi.destroy', $refInstansi),
            ]))
            ->addColumn('created_at', static fn (RefInstansi $refInstansi) => $refInstansi->created_at->format('d/m/Y H:i:s'))
            ->addColumn('updated_at', static fn (RefInstansi $refInstansi) => $refInstansi->updated_at->format('d/m/Y H:i:s'))
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(RefInstansi $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('refinstansi-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('nama_instansi'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'RefInstansi_' . date('YmdHis');
    }
}
