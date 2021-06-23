<?php

namespace App\DataTables;

use App\BookingRegistraion;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Carbon\Carbon;

class BookingRegistraionDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'bookingregistraion.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\BookingRegistraion $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BookingRegistraion $model)
    {
      $from_date = $this->request()->get('from_date');
      $to_date =  $this->request()->get('to_date');


      if(!empty($from_date) && !empty($to_date))
      {
          $from_date = Carbon::parse($from_date);
          $to_date = Carbon::parse($to_date);

          $query = $model->whereBetween('created_at',[$from_date,$to_date])->latest();
      }

      else{
        $query = $model->newQuery();
      }

      return $query;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('bookingregistraion-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(

                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
          Column::make('id'),
          Column::make('user_id'),
          Column::make('user_name'),
          Column::make('event_title'),
          Column::make('event_category'),
          Column::make('published_at'),
          Column::make('event_location'),
          Column::make('event_time'),
          Column::make('event_cost'),
          Column::make('per_person_cost'),
          Column::make('total_cost'),
          Column::make('people'),
          Column::make('payment_method'),
          Column::make('payment_status'),
          Column::make('user_number'),
          Column::make('created_at'),

          Column::computed('action')
          ->exportable(true)
          ->printable(false)
          ->width(40)
          ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'BookingRegistraion_' . date('YmdHis');
    }
}
