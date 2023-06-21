<?php
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use App\Productdetails;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('expired/', function () {
    return view('auth.link_expired');
});
// Route::get('/sendmail', function () {
//     return view('sendmail');
// });

// Route::get('/dashboard', 'DashboardController@index');

Auth::routes();

Route::get('/reg', 'Auth\RegisterController@showRegistrationForm')->name('showRegistrationForm');
Route::get('/dashboard', 'HomeController@index')->name('index');
Route::get('get-product', 'HomeController@get_product')->name('get_product');
Route::get('/category', 'CategoryController@index')->name('index');
Route::get('/category/create', 'CategoryController@create')->name('create');
Route::post('/category/add', 'CategoryController@add')->name('add');
Route::get('/category/{category}/edit', 'CategoryController@edit')->name('edit');
Route::put('/category/edit/{category}', 'CategoryController@update')->name('update');
Route::get('/read-csv', 'CategoryController@readCSV')->name('readCSV');
Route::get('/read-xml', 'CategoryController@readXML')->name('readXML');
Route::get('/read-xls', 'CategoryController@readXLS')->name('readXLS');
Route::get('/read-json', 'CategoryController@readJson')->name('readJson');
Route::get('/datasource', 'DatasourceController@index')->name('index');
Route::post('/datasource/upload', 'DatasourceController@upload')->name('upload');
Route::get('/get-table', 'NoticeController@getAllTable')->name('getAllTable');
Route::get('/send', 'MailController@index')->name('MailController');
// Route::get('/verify/{user_id}', 'Auth\RegisterController@verify')->name('verify');
Route::put('/verify', 'Auth\RegisterController@verify')->name('verify');
Route::put('/user-reject', 'Auth\RegisterController@userreject')->name('userreject');
Route::get('/users', 'UserController@index')->name('index');
Route::get('/mysql-config', 'MysqlconfigdataController@index')->name('index');
/** Dynamic Register */
Route::get('/{token}/reg', 'DynamicRegisterController@index')->name('index');
Route::post('/adduser', 'DynamicRegisterController@adduser')->name('adduser');
Route::post('/submituser', 'DynamicRegisterController@submituser')->name('submituser');
Route::get('/success/{token}', 'DynamicRegisterController@regsuccess')->name('regsuccess');
Route::post('/sendmail', 'DynamicRegisterController@sendmail')->name('sendmail');
Route::post('/delete-temp-user', 'DynamicRegisterController@deleteuser')->name('deleteuser');
Route::post('/user-edit', 'DynamicRegisterController@user_update')->name('user_update');
/** Update Password Start */
Route::get('/reset-password/{email}', 'UpdatePasswordController@index')->name('reset-password');
Route::post('/updatepassword', 'UpdatePasswordController@updatepassword')->name('updatepassword');
// Route::get('reset-password/', function () {
//     return view('auth.passwords.updatepassword');
// });
// Route::get('/update-password', 'DynamicRegisterController@resetpassword')->name('resetpassword');
/** Update Password End */
Route::get('/import', 'ProductdetailsController@index')->name('index');
Route::post('/upload', 'ProductdetailsController@import')->name('import');
// Route::get('/import', 'TesttableController@index')->name('index');
// Route::post('/upload', 'TesttableController@import')->name('import');

/** Self Analyze Start */
Route::get('/self-analyze', 'SelfanalyzeController@index')->name('index');
Route::get('/self-analyze-details', 'SelfanalyzeController@self_analyze')->name('self_analyze');
Route::get('/self-analyze-details/{session}', 'SelfanalyzeController@self_analyze_by_session')->name('self_analyze_by_session');
Route::post('/user-session-comment', 'SelfanalyzeController@user_session_comment_save')->name('user_session_comment_save');
Route::post('/save-user-session', 'SelfanalyzeController@save_user_session')->name('save_user_session');
Route::put('/save-user-session-update/{session}', 'SelfanalyzeController@save_user_session_update')->name('save_user_session_update');
/** Self Analyze End */

/** My Session Start */
Route::get('/my-sessions', 'MysessionController@index')->name('index');
/** My Session End */

/**HTML to Image */
// Route::get('/html-to-image', function () {
//     // Load the view with the HTML content you want to convert to an image
//     $sidebar = "default-sidebar";
//     $productdetails = Productdetails::orderBy('proprietary_name', 'ASC')->paginate(10);
//     // $view = View::make('admin.selfanalyze.selfanalyzedetails', compact('sidebar'));
//     $view = View::make('htmlimage');

//     // Create an instance of Dompdf
//     $dompdf = new Dompdf();

//     // Set the HTML content for rendering
//     $dompdf->loadHtml($view->render());

//     // Render the HTML to PDF
//     $dompdf->render();

//     // Generate the image data from the PDF
//     $imageData = $dompdf->output();

//     // Save the image file
//     $imageName = 'html_image.png';
//     file_put_contents($imageName, $imageData);

//     return 'Image created successfully!';
// });

