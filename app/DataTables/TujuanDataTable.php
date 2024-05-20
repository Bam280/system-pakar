<?php

namespace App\DataTables;

use App\Models\Tujuan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class TujuanDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', static fn (Tujuan $tujuan) => view('components.datatable-action', [
                'editLink' => route('tujuan.edit', $tujuan),
                'deleteLink' => route('tujuan.destroy', $tujuan),
            ]))
            ->addColumn('deskripsi_tujuan', static fn (Tujuan $tujuan) => $tujuan->deskripsi_tujuan)
            ->addColumn('iiv_id', static fn (Tujuan $tujuan) => $tujuan->iiv_id)
            ->addColumn('ref_tujuan_id', static fn (Tujuan $tujuan) => $tujuan->ref_tujuan_id)
            // ->addColumn('created_at', static fn (Kendali $kendali) => $kendali->created_at->format('d/m/Y H:i:s'))
            // ->addColumn('updated_at', static fn (Kendali $kendali) => $kendali->updated_at->format('d/m/Y H:i:s'))
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Tujuan $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('tujuan-table')
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
            Column::make('id')->hidden(),
            Column::make('deskripsi_tujuan'),
            Column::make('iiv_id'),
            Column::make('ref_tujuan_id'),
            // Column::make('created_at'),
            // Column::make('updated_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Tujuan_' . date('YmdHis');
    }
}