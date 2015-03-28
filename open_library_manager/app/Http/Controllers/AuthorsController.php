<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Author;

use Zofe\Rapyd\DataGrid\DataGrid;
use Zofe\Rapyd\DataFilter\DataFilter;
use Zofe\Rapyd\DataForm\DataForm;
use Zofe\Rapyd\DataEdit\DataEdit;

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

            // this creates link to the object, if copy&paste to another controller change AuthorsController@show (target of the link), $name (text to be displayed), 'Jméno' (title of the column) and 'name' (sort by)
            //$grid->add('name','Jméno')->style("color:#FFFFFF");  //field name, label, sortable
            
            $grid->add('{!! link_to_action(\'AuthorsController@show\', $name, $parameters = array("id" => $id), $attributes = array()) !!}','Jméno', 'name');  //field name, label, sortable
            
            $grid->add('birth_year', 'Narozen', false);
            $grid->edit('/authors', 'Edit','show|modify|delete');
            $grid->orderBy('id','desc'); //default orderby
            $grid->paginate(10); //pagination


            /**
            *modification
            *
            */
            /*
            $grid->row(function ($row) {

                $row->cell('name')->style("color:#FFFFFF");
                $row->style("background-color:#0091FF");
            
            });
*/




            return view('authors.index', compact('grid', 'filter'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
            $form = $this->form();
            return view('authors.form', compact('form'));
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
                if ($input["birth_year"] == "") $input["birth_year"] = null;
	        Author::create( $input );
 
         	return Redirect::route('authors.index')->with('message', 'Author created');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	    $form = $this->form(Author::find($id), "show");
            return view('authors.form', compact('form'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
            $form = $this->form(Author::find($id), "modify", "authors/".$id);
            return view('authors.form', compact('form'));
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
            if ($input["birth_year"] == "") $input["birth_year"] = null;
	    Author::find($id)->update($input);
 
            return Redirect::route('authors.index')->with('message', 'Author updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	    Author::find($id)->delete();
            return Redirect::route('authors.index')->with('message', 'Author deleted.');
	}

        private function form($model = null, $status = "", $process_url = "authors")
        {
            //start with empty form to create new Article
            $form = DataEdit::source(new Author);
            $form->process_url = $process_url;
            $form->back_url = "authors";
            $form->model = $model;
            if ($status != "") $form->status = $status;
            //add fields to the form
            $form->text('name','Jméno')->rule('required'); //field name, label, type
            $form->text('birth_year','Rok narození');
            $form->textarea('note', 'Poznámka');
 

            return $form;
        }

}
