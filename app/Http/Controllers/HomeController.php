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
use ViewComponents\ViewComponents\Component\Html\Tag;
use ViewComponents\ViewComponents\Component\Part;
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
                new Column('city'),
                new Column('industry'),
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
                //new DetailsRow(new SymfonyVarDump()), // when clicking on data rows, details will be shown
                new PaginationControl($input->option('page', 1), 5), // 1 - default page, 5 -- page size
                new PageSizeSelectControl($input->option('page_size', 5), [2, 5, 10]), // allows to select page size
                new ColumnSortingControl('id', $input->option('sort')),
                //new ColumnSortingControl('title', $input->option('title')),
                //new ColumnSortingControl('firstname', $input->option('firstname')),
                //new ColumnSortingControl('lastname', $input->option('lastname')),
                //new ColumnSortingControl('job_title', $input->option('job_title')),
                new Part(new Tag('tr'), 'control_row2', 'table_heading'),
                new Part(new Tag('td'), 'id-c-row', 'control_row2'),
                new Part(new Tag('td'), 'title-c-row', 'control_row2'),
                new Part(new Tag('td'), 'firstname-c-row', 'control_row2'),
                new Part(new Tag('td'), 'lastname-c-row', 'control_row2'),
                new Part(new Tag('td'), 'job_title-c-row', 'control_row2'),
                new Part(new Tag('td'), 'city-c-row', 'control_row2'),
                new Part(new Tag('td'), 'industry-c-row', 'control_row2'),
                new Part(new Tag('td'), 'email-c-row', 'control_row2'),
                new Part(new Tag('td'), 'linkedin-c-row', 'control_row2'),
                new Part(new Tag('td'), 'nome_planilha-c-row', 'control_row2'),
                new Part(new Tag('td'), 'hardbounce-c-row', 'control_row2'),
                (new FilterControl('id', FilterOperation::OPERATOR_EQ, $input->option('id')))
                    ->setDestinationParentId('id-c-row'),
                (new FilterControl('title', FilterOperation::OPERATOR_STR_CONTAINS, $input->option('title')))
                    ->setDestinationParentId('title-c-row'),
                (new FilterControl('firstname', FilterOperation::OPERATOR_STR_CONTAINS, $input->option('firstname')))
                    ->setDestinationParentId('firstname-c-row'),
                (new FilterControl('lastname', FilterOperation::OPERATOR_STR_CONTAINS, $input->option('lastname')))
                    ->setDestinationParentId('lastname-c-row'),
                (new FilterControl('email', FilterOperation::OPERATOR_STR_CONTAINS, $input->option('email')))
                    ->setDestinationParentId('email-c-row'),
                (new FilterControl('job_title', FilterOperation::OPERATOR_STR_CONTAINS, $input->option('job_title')))
                    ->setDestinationParentId('job_title-c-row'),
                (new FilterControl('city', FilterOperation::OPERATOR_STR_CONTAINS, $input->option('city')))
                    ->setDestinationParentId('city-c-row'),
                (new FilterControl('industry', FilterOperation::OPERATOR_STR_CONTAINS, $input->option('industry')))
                    ->setDestinationParentId('industry-c-row'),
                (new FilterControl('nome_planilha', FilterOperation::OPERATOR_STR_CONTAINS, $input->option('nome_planilha')))
                    ->setDestinationParentId('nome_planilha-c-row'),
                new CsvExport($input->option('csv')), // yep, that's so simple, you have CSV export now
                new PageTotalsRow([
                    'id' => PageTotalsRow::OPERATION_IGNORE,
                ])
            ]
        );

        //  but also you can add some styling:
        $customization = new BootstrapStyling();
        $customization->apply($grid);

        return view('home', compact('grid'));
    }
}
