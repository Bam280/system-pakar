<?php

namespace App\DataTables;

use App\Enums\UserRole;
use App\Models\Interdepen;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class InterdepenDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', static fn (Interdepen $interdepen) => view('components.datatable-action', [
                'editLink' => route('interdepen.edit', $interdepen),
                'deleteLink' => route('interdepen.destroy', $interdepen),
            ]))
            ->addColumn('ref_interdepen_id', static fn (Interdepen $interdepen) => $interdepen->refInterdepen->indikator_interdepen)
            ->addColumn('sistem_elektronik_id', static fn (Interdepen $interdepen) => $interdepen->sistemElektronik->nama)
            ->addColumn('sistem_iiv_id', static fn (Interdepen $interdepen) => $interdepen->sistemIIV->nama)
            ->addColumn('deskripsi_interdepen', static fn (Interdepen $interdepen) => $interdepen->deskripsi_interdepen)
            ->addColumn('created_at', static fn (Interdepen $interdepen) => $interdepen->created_at->format('d/m/Y H:i:s'))
            ->addColumn('updated_at', static fn (Interdepen $interdepen) => $interdepen->updated_at->format('d/m/Y H:i:s'))
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Interdepen $model): QueryBuilder
    {
        return $model
        ->when(Auth::user()->role !== UserRole::ADMIN, static fn ($query) => $query->where('user_id', Auth::user()->id))
        ->with('refInterdepen', 'sistemElektronik', 'sistemIIV')
        ->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('interdepen-table')
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
            Column::make('ref_interdepen_id'),
            Column::make('sistem_elektronik_id'),
            Column::make('sistem_iiv_id'),
            Column::make('deskripsi_interdepen'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Interdepen_' . date('YmdHis');
    }
}
