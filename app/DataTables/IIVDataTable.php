<?php

namespace App\DataTables;

use App\Enums\UserRole;
use App\Models\IIV;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class IIVDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', static fn (IIV $iiv) => view('components.datatable-action', [
                'editLink' => route('iiv.edit', $iiv),
                'deleteLink' => Auth::user()->role === UserRole::ADMIN ? route('interdepen.destroy', $interdepen) : null,
            ]))
            ->addColumn('deskripsi_sistem', static fn (IIV $iiv) => $iiv->deskripsi_sistem)
            ->addColumn('nama_instansi', static fn (IIV $iiv) => $iiv->refInstansi->nama_instansi)
            ->addColumn('created_at', static fn (IIV $iiv) => $iiv->created_at->format('d/m/Y H:i:s'))
            ->addColumn('updated_at', static fn (IIV $iiv) => $iiv->updated_at->format('d/m/Y H:i:s'))
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(IIV $model): QueryBuilder
    {
        return $model
        ->when(Auth::user()->role !== UserRole::ADMIN, static fn ($query) => $query->where('user_id', Auth::user()->id))
        ->with('refInstansi')
        ->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('iiv-table')
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
            Column::make('nama'),
            Column::make('deskripsi_sistem'),
            Column::make('nama_instansi'),
            Column::make('nilai_risiko'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'IIV_' . date('YmdHis');
    }
}
