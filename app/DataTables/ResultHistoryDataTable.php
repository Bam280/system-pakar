<?php

namespace App\DataTables;

use App\Enums\UserRole;
use App\Models\Kendali;
use App\Models\ResultHistory;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ResultHistoryDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', static fn (ResultHistory $resultHistory) => view('components.datatable-action', [
                'showLink' =>  route('result-history.rerun', $resultHistory),
            ]))
            ->addColumn('nama_sistem', static fn (ResultHistory $resultHistory) => @$resultHistory->attributes['form1']['nama_sistem'])
            ->addColumn('sistem_terpilih', static fn (ResultHistory $resultHistory) => join(', ', @$resultHistory->attributes['sistem_terpilih'] ?? []))

            ->addColumn('created_at', static fn (ResultHistory $resultHistory) => $resultHistory->created_at->format('d/m/Y H:i:s'))
            // ->addColumn('updated_at', static fn (resultHistory $resultHistory) => $resultHistory->updated_at->format('d/m/Y H:i:s'))
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ResultHistory $model): QueryBuilder
    {
        return $model->when(Auth::user()->role !== UserRole::ADMIN, function ($query) {
            // Dapatkan id instansi dari pengguna yang terotentikasi
            $currentUserInstansiId = Auth::user()->ref_instansi_id;
            
            // Query yang mencakup record milik pengguna terotentikasi atau milik pengguna lain dengan instansi yang sama
            $query->where(function($subQuery) use ($currentUserInstansiId) {
                $subQuery->where('user_id', Auth::user()->id)
                         ->orWhere('ref_instansi_id', $currentUserInstansiId);
            });
        })
        ->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('history-table')
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
            Column::make('nama_sistem'),
            Column::make('sistem_terpilih'),
            Column::make('created_at')->title('Tanggal'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Kendali_' . date('YmdHis');
    }
}
