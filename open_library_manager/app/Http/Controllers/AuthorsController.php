<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Author;
use Nayjest\Grids\Grid;
use Nayjest\Grids\GridConfig;
use Nayjest\Grids\EloquentDataProvider;
use Nayjest\Grids\IdFieldConfig;
use Nayjest\Grids\FieldConfig;
use Nayjest\Grids\FilterConfig;
use Nayjest\Grids\SelectFilterConfig;
use Nayjest\Grids\Components\THead;
use Nayjest\Grids\Components\FiltersRow;
use Nayjest\Grids\Components\OneCellRow;
use Nayjest\Grids\Components\RecordsPerPage;
use Nayjest\Grids\Components\ColumnsHider;
use Nayjest\Grids\Components\HtmlTag;
use Nayjest\Grids\Components\TFoot;
use Nayjest\Grids\Components\TotalsRow;
use Nayjest\Grids\Components\Pager;

use Zofe\Rapyd\DataGrid\DataGrid;
use Zofe\Rapyd\DataFilter\DataFilter;
use Illuminate\View\View;

class AuthorsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

            $filter = DataFilter::source(new Author);
            $filter->attributes(array('class'=>'form-inline'));
            $filter->add('name','Jméno', 'text');
            $filter->submit('Hledat');
            $filter->reset('reset');

            $grid = DataGrid::source($filter);  //same source types of DataSet

            $grid->add('name','Jméno', true); //field name, label, sortable
            $grid->add('birth_year', 'Narozen', false);
            $grid->orderBy('id','desc'); //default orderby
            $grid->paginate(10); //pagination

            //View::make('authors.index', compact('grid'));

            return view('authors.index', compact('grid', 'filter'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
