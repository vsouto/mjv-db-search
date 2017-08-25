<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use ViewComponents\Eloquent\EloquentDataProvider;
use ViewComponents\Grids\Component\Column;
use ViewComponents\Grids\Component\ColumnSortingControl;
use ViewComponents\Grids\Component\CsvExport;
use ViewComponents\Grids\Component\DetailsRow;
use ViewComponents\Grids\Component\PageTotalsRow;
use ViewComponents\Grids\Component\TableCaption;
use ViewComponents\Grids\Grid;
use ViewComponents\ViewComponents\Component\Control\FilterControl;
use ViewComponents\ViewComponents\Component\Control\PageSizeSelectControl;
use ViewComponents\ViewComponents\Component\Control\PaginationControl;
use ViewComponents\ViewComponents\Component\Debug\SymfonyVarDump;
use ViewComponents\ViewComponents\Customization\CssFrameworks\BootstrapStyling;
use ViewComponents\ViewComponents\Data\Operation\FilterOperation;
use ViewComponents\ViewComponents\Input\InputSource;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $provider = new EloquentDataProvider(Company::class);
        $input = new InputSource($_GET);

        // create grid
        $grid = new Grid(
            $provider,
            // all components are optional, you can specify only columns
            [
                new TableCaption('Companies'),
                new Column('id'),
                new Column('title'),
                new Column('firstname'),
                new Column('lastname'),
                new Column('job_title'),
                new Column('city_id'),
                new Column('industry_id'),
                new Column('email'),
                new Column('linkedin'),
                new Column('nome_planilha'),
                new Column('hardbounce'),
                /*(new Column('age'))
                    ->setValueCalculator(function ($row) {
                        return DateTime
                            ::createFromFormat('Y-m-d', $row->birthday)
                            ->diff(new DateTime('now'))
                            ->y;
                    })
                    ->setValueFormatter(function ($val) {
                        return "$val years";
                    })
                ,*/
                new DetailsRow(new SymfonyVarDump()), // when clicking on data rows, details will be shown
                new PaginationControl($input->option('page', 1), 5), // 1 - default page, 5 -- page size
                new PageSizeSelectControl($input->option('page_size', 5), [2, 5, 10]), // allows to select page size
                new ColumnSortingControl('id', $input->option('sort')),
                new ColumnSortingControl('title', $input->option('title')),
                new FilterControl('title', FilterOperation::OPERATOR_LIKE, $input->option('title')),
                new CsvExport($input->option('csv')), // yep, that's so simple, you have CSV export now
                new PageTotalsRow([
                    'id' => PageTotalsRow::OPERATION_IGNORE,
                    'age' => PageTotalsRow::OPERATION_AVG
                ])
            ]
        );

        //  but also you can add some styling:
        $customization = new BootstrapStyling();
        $customization->apply($grid);


        return view('home', compact('grid'));
    }
}
