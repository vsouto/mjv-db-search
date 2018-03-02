<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

class ProfileController extends Controller
{
    function index()
    {
        $provider = new EloquentDataProvider(User::class);
        $input = new InputSource($_GET);

        // create grid
        $grid = new Grid(
            $provider,
            // all components are optional, you can specify only columns
            [
                new TableCaption('Users'),
                new Column('id'),
                new Column('name'),
                new Column('email'),
                (new Column('role'))
                    ->setValueFormatter(function($val) {
                        return $val =='1' ? 'User' : 'Admin';
                    }),
                (new Column('actions'))
                    ->setValueCalculator(function($row){
                        return $row->id;
                    })
                    ->setValueCalculator(function($row) {
                        if (Auth::user()->role == '2')
                            return "<button data-token=". csrf_token() ." data-id=". $row->id
                            ." class=\"btn btn-danger btn-xs btn-delete\"><i class=\"fa fa-trash\"></i> Remover</button>";
                }),
                new PaginationControl($input->option('page', 1), 5), // 1 - default page, 5 -- page size
                $this->getPaginationSize($input),
                new ColumnSortingControl('id', $input->option('sort')),
                //new ColumnSortingControl('title', $input->option('title')),
                //new ColumnSortingControl('firstname', $input->option('firstname')),
                //new ColumnSortingControl('lastname', $input->option('lastname')),
                //new ColumnSortingControl('job_title', $input->option('job_title')),
                new Part(new Tag('tr'), 'control_row2', 'table_heading'),
                new Part(new Tag('td'), 'id-c-row', 'control_row2'),
                new Part(new Tag('td'), 'name-c-row', 'control_row2'),
                new Part(new Tag('td'), 'email-c-row', 'control_row2'),
                (new FilterControl('id', FilterOperation::OPERATOR_EQ, $input->option('id')))
                    ->setDestinationParentId('id-c-row'),
                (new FilterControl('name', FilterOperation::OPERATOR_STR_CONTAINS, $input->option('name')))
                    ->setDestinationParentId('name-c-row'),
                (new FilterControl('email', FilterOperation::OPERATOR_STR_CONTAINS, $input->option('email')))
                    ->setDestinationParentId('email-c-row'),
                new CsvExport($input->option('csv')), // yep, that's so simple, you have CSV export now
                new PageTotalsRow([
                    'id' => PageTotalsRow::OPERATION_IGNORE,
                ])
            ]
        );

        //  but also you can add some styling:
        $customization = new BootstrapStyling();
        $customization->apply($grid);

        return view('users', compact('grid'));
        //return "index";
    }

    function create()
    {
        return view('auth.register');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $user = User::find($id);
        if(!$user)
        {
            abort('404');
        }

        if($user->delete())
        {
            \Session::flash('flash_message', "Dados excluídos com sucesso!");
        }

        return redirect('users');
    }

    public function getPaginationSize($input)
    {
        // Admin?
        if (Auth::user()->role == '1')
            return new PageSizeSelectControl($input->option('page_size', 10), [10]); // allows to select page size
        else
            return new PageSizeSelectControl($input->option('page_size', 10), [10, 50, 100, 500, 1000]); // allows to select page size
    }
}
