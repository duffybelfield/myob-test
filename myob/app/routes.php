<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('upload');
});

Route::post('upload/data', function()
{
	$csv_data = Input::get('csv_data');
	$csv_data = trim(strip_tags($csv_data));
	$csv_data = explode("\n", $csv_data);
	$_csv = array(); 
	foreach($csv_data as $k => $c){
		$staff = explode(",", $c);
		$_csv[$k]['first_name'] = $staff[0];
		$_csv[$k]['last_name'] = $staff[1];

		$_gross_income = (int)$staff[2];
		$_super_rate = (int)str_replace("%","",$staff[3]);

		$_super = $staff[3];

		if($_gross_income < 18200){
			$_income_tax = 0;
		}
		elseif($_gross_income > 18200 && $_gross_income < 37000){
			$_count = $_gross_income - 18200;
			$_income_tax = round(0.19 * ($_gross_income - 18200));
		}
		elseif($_gross_income > 37001 && $_gross_income < 80000){
			$_bracket_a = 3572;
			$_income_tax = round(($_bracket_a + ($_gross_income - 37001) * 0.325 )/12);
		}
		elseif($_gross_income > 80000 && $_gross_income < 180000){
			$_bracket_b = 17547;
			$_income_tax = round((0.37 * ($_gross_income - 80000) + $_bracket_b)/12);
		}
		else{
			$_bracket_c = 54547;
			$_income_tax = round((0.45 * ($_gross_income - 180000) + $_bracket_c)/12);
		}

		$_csv[$k]['gross_income'] = round($_gross_income / 12);

		$_csv[$k]['income_tax'] = $_income_tax;

		$_csv[$k]['period'] = $staff[4];

		$_csv[$k]['net_income'] = $_csv[$k]['gross_income'] - $_income_tax;

		$_csv[$k]['super'] = round(($_csv[$k]['gross_income'] / 100) * $_super_rate);

	}
	return View::make('data', array('data' => $_csv));
});
