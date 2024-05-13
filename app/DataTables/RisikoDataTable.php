<?php

namespace App\DataTables;

use App\Models\Risiko;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class RisikoDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', static fn (Risiko $risiko) => view('components.datatable-action', [
                'editLink' => route('risiko.edit', $risiko),
                'deleteLink' => route('risiko.destroy', $risiko),
            ]))
            ->addColumn('tujuan_id', static fn (Risiko $risiko) => $risiko->tujuan_id)
            ->addColumn('deskripsi_risiko', static fn (Risiko $risiko) => $risiko->deskripsi_tujuan)
            ->addColumn('deskripsi_dampak', static fn (Risiko $risiko) => $risiko->deskripsi_dampak)
            ->addColumn('deskripsi_kemungkinan', static fn (Risiko $risiko) => $risiko->deskripsi_kemungkinan)
            ->addColumn('nilai_dampak_regional', static fn (Risiko $risiko) => $risiko->nilai_dampak_regional)
            ->addColumn('nilai_dampak_nasional', static fn (Risiko $risiko) => $risiko->nilai_dampak_nasional)
            ->addColumn('nilai_kemungkinan', static fn (Risiko $risiko) => $risiko->nilai_kemungkinan)
            ->addColumn('ref_dampak_id', static fn (Risiko $risiko) => $risiko->ref_dampak_id)
            // ->addColumn('created_at', static fn (Kendali $kendali) => $kendali->created_at->format('d/m/Y H:i:s'))
            // ->addColumn('updated_at', static fn (Kendali $kendali) => $kendali->updated_at->format('d/m/Y H:i:s'))
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Risiko $model): QueryBuilder
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
            Column::make('tujuan_id'),
            Column::make('deskripsi_risiko'),
            Column::make('deskripsi_dampak'),
            Column::make('deskripsi_kemungkinan'),
            Column::make('nilai_dampak_regional'),
            Column::make('nilai_dampak_nasional'),
            Column::make('nilai_kemungkinan'),
            Column::make('ref_dampak_id'),
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
