<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;


/*
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
*/


class SearchController extends Controller
{
/*
  public function show()
  {    
//$json = json_decode(file_get_contents('https://world.openfoodfacts.org/cgi/search.pl?action=process&search_terms=coca%20cola&sort_by=unique_scans_n&page_size=20&json=1'), true);
	  //return view('product');
	  return view('product', ['product' => 'Victoria']); // работало!
  }
*/

  public function show(Request $request)
  {
      //$product = $request->input('product'); работало!
$run = $request->input('product');

//$json = file_get_contents('https://world.openfoodfacts.org/cgi/search.pl?action=process&search_terms=coca%20cola&sort_by=unique_scans_n&page_size=20&json=1');
$json = file_get_contents('https://world.openfoodfacts.org/cgi/search.pl?action=process&search_terms=.$run.&sort_by=unique_scans_n&page_size=20&json=1');


      //$product = 10;
	  //$city = $request->input('city');

      /* Do something with data */

      //return view(search.result, compact('service','city'));

$title = 'My Title Here';
View::share('title', $title);

/*
	  return view('product')
            //->with($data)
			//->with($product);
            //->with('variable', $product);
			->with('title');
			//->with('occupation', 'Astronaut');
*/

//return view('product', ['product' => $product]); // работало!
return view('product', ['product' => $json]);

  }




}