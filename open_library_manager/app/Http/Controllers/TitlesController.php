<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Title;

use Zofe\Rapyd\DataGrid\DataGrid;
use Zofe\Rapyd\DataFilter\DataFilter;
use Zofe\Rapyd\DataForm\DataForm;
use Zofe\Rapyd\DataEdit\DataEdit;


class TitlesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$filter = DataFilter::source(new Title);
        $filter->attributes(array('class'=>'form-inline'));
        $filter->add('name','Název', 'text');
        $filter->submit('Hledat');
        $filter->reset('reset');

        $grid = DataGrid::source($filter);  //same source types of DataSet

        // this creates link to the object, if copy&paste to another controller change AuthorsController@show (target of the link), $name (text to be displayed), 'Jméno' (title of the column) and 'name' (sort by)
        $grid->add('{!! link_to_action(\'TitlesController@show\', $name, $parameters = array("id" => $id), $attributes = array()) !!}','Název', 'name'); //field name, label, sortable
        $grid->add('year', 'Vydáno', false);
        $grid->edit('/titles', 'Edit','show|modify|delete');
        $grid->orderBy('id','desc'); //default orderby
        $grid->paginate(10); //pagination

        return view('titles.index', compact('grid', 'filter'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$form = $this->form();
        return view('titles.form', compact('form'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
                //if "" is stored as number it becomes 0, solution is to replace "" by null
                if ($input["year"] == "") $input["year"] = null;
	        Title::create( $input );
 
         	return Redirect::route('titles.index')->with('message', 'Title created');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$form = $this->form(Title::find($id), "show");
            return view('titles.form', compact('form'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$form = $this->form(Title::find($id), "modify", "titles/".$id);
            return view('titles.form', compact('form'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
            if ($input["year"] == "") $input["year"] = null;
	    Author::find($id)->update($input);
 
            return Redirect::route('titles.index')->with('message', 'Title updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Title::find($id)->delete();
            return Redirect::route('titles.index')->with('message', 'Title deleted.');
	}

	private function form($model = null, $status = "", $process_url = "titles")
        {
            //start with empty form to create new Article
            $form = DataEdit::source(new Title);
            $form->process_url = $process_url;
            $form->back_url = "titles";
            $form->model = $model;
            if ($status != "") $form->status = $status;
            //add fields to the form
            $form->text('name','Název')->rule('required'); //field name, label, type
            $form->text('year','Vydáno');
            $form->textarea('note', 'Poznámka');
 

            return $form;
        }

}
