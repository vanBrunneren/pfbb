<?php

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

Auth::routes();

Route::get('/', 'PublicController@home')->name('home');

Route::redirect('/band', '/band/geschichte', 301);
Route::get('/band/geschichte', 'PublicController@history')->name('history');
Route::get('/band/mitglieder', 'PublicController@members')->name('members');
Route::get('/band/repertoire', 'PublicController@repertoire')->name('repertoire');
Route::get('/band/kontakt', 'PublicController@contact')->name('contact');
Route::post('/band/kontakt', 'PublicController@contactSave');

Route::get('/events/{year?}', 'PublicController@events');

Route::redirect('/galerie', '/galerie/fotos', 301);
Route::get('/galerie/fotos', 'PublicController@pictures')->name('pictures');
Route::get('/galerie/fotos/{album}', 'PublicController@detailPicture');
Route::get('/galerie/videos', 'PublicController@videos')->name('videos');
Route::get('/galerie/presse', 'PublicController@press')->name('press');

//Route::get('/vorverkauf', 'PublicController@vorverkauf')->name('vorverkauf');
//Route::post('/vorverkauf', 'PublicController@vorverkaufSend')->name('vorverkauf_send');

Route::get('/links', 'PublicController@links')->name('links');
Route::redirect('/intern', '/login');

Route::get('/aktuelles', 'PublicController@news')->name('news');

Route::middleware('auth')->group(function () {

	Route::redirect('/admin', '/admin/index', 301);
	Route::get('/admin/index', 'Admin\IndexController@index');
	Route::get('/admin/logout', 'Admin\HomeController@logout')->name('admin_logout');

	Route::get('/admin/changepassword','Admin\UserController@showChangePasswordForm');
	Route::post('/admin/changepassword','Admin\UserController@changePassword')->name('changepassword');

	Route::group(['middleware' => 'roles', 'roles' => ['user', 'editor', 'root', 'calendar_admin']], function() {

		Route::redirect('/admin/absenzen', '/admin/absenzen/index', 301);
		Route::get('/admin/absenzen/index', 'Admin\AbsencesController@index')->name('admin_absences');
		Route::post('/admin/absenzen/index', 'Admin\AbsencesController@index');
		Route::get('/admin/absenzen/show', 'Admin\AbsencesController@show')->name('admin_absences_show');
		Route::redirect('/admin/user', '/admin/user/index', 301);
		Route::get('/admin/user/index', 'Admin\UserController@index')->name('admin_user');

	});

	Route::group(['middleware' => 'roles', 'roles' => ['root', 'calendar_admin', 'editor']], function() {
		Route::redirect('/admin/events', '/admin/events/index', 301);
		Route::get('/admin/events/index', 'Admin\EventsController@index')->name('admin_events');
		Route::get('/admin/events/edit/{id}', 'Admin\EventsController@edit')->name('admin_events_edit');
		Route::post('/admin/events/edit/{id}', 'Admin\EventsController@edit');
		Route::get('/admin/events/delete/{id}', 'Admin\EventsController@delete')->name('admin_events_delete');
		Route::get('/admin/events/create', 'Admin\EventsController@create')->name('admin_events_create');
		Route::post('/admin/events/create', 'Admin\EventsController@create');
		Route::post('/admin/events/multisave', 'Admin\EventsController@multisave')->name('admin_events_multisave');
	});

	Route::group(['middleware' => 'roles', 'roles' => ['editor', 'root']], function() {

		Route::get('/admin/home/index', 'Admin\HomeController@index')->name('admin_home');
		Route::post('/admin/home/index', 'Admin\HomeController@indexSave');

		Route::get('/admin/news/index', 'Admin\NewsController@index')->name('admin_news');
		Route::redirect('/admin/news', '/admin/news/index', 301);
		Route::get('/admin/news/create', 'Admin\NewsController@create')->name('admin_news_create');
		Route::post('/admin/news/create', 'Admin\NewsController@create')->name('admin_news_create_save');
		Route::get('/admin/news/edit/{id}', 'Admin\NewsController@edit')->name('admin_news_edit');
		Route::post('/admin/news/edit/{id}', 'Admin\NewsController@edit')->name('admin_news_edit_save');
		Route::get('/admin/news/delete/{id}', 'Admin\NewsController@delete')->name('admin_news_delete');


		Route::redirect('/admin/band/mitglieder', '/admin/band/mitglieder/index', 301);
		Route::redirect('/admin/band/repertoire', '/admin/band/repertoire/index', 301);
		Route::redirect('/admin/band/kontakt', '/admin/band/kontakt/index', 301);

		Route::get('/admin/band/mitglieder/index', 'Admin\BandController@members')->name('admin_members');
		Route::get('/admin/band/repertoire/index', 'Admin\BandController@repertoire')->name('admin_repertoire');
		Route::get('/admin/band/kontakt/index', 'Admin\BandController@contact')->name('admin_contact');

		Route::get('/admin/band', 'Admin\BandController@index')->name('admin_band');
		Route::redirect('/admin/band/geschichte', '/admin/band/geschichte/index', 301);
		Route::get('/admin/band/geschichte/index', 'Admin\BandController@history')->name('admin_history');
		Route::get('/admin/band/geschichte/create', 'Admin\BandController@historyCreate')->name('admin_history_create');
		Route::post('/admin/band/geschichte/create', 'Admin\BandController@historyCreateSave')->name('admin_history_create_save');
		Route::get('/admin/band/geschichte/edit/{id}', 'Admin\BandController@historyEdit')->name('admin_history_edit');
		Route::post('/admin/band/geschichte/edit/{id}', 'Admin\BandController@historyEditSave')->name('admin_history_edit_save');
		Route::get('/admin/band/geschichte/delete/{id}', 'Admin\BandController@historyDelete')->name('admin_history_delete');

		Route::redirect('/admin/band/mitglieder', '/admin/band/mitglieder/index', 301);
		Route::get('/admin/band/mitglieder/index', 'Admin\BandController@members')->name('admin_members');
		Route::get('/admin/band/mitglieder/create', 'Admin\BandController@membersCreate')->name('admin_member_create');
		Route::post('/admin/band/mitglieder/create', 'Admin\BandController@membersCreateSave')->name('admin_member_create_save');
		Route::get('/admin/band/mitglieder/edit/{id}', 'Admin\BandController@memberEdit')->name('admin_member_edit');
		Route::post('/admin/band/mitglieder/edit/{id}', 'Admin\BandController@memberEditSave')->name('admin_member_edit_save');
		Route::get('/admin/band/mitglieder/delete/{id}', 'Admin\BandController@memberDelete')->name('admin_member_delete');

		Route::get('/admin/user/edit/{id}', 'Admin\UserController@edit')->name('admin_user_edit');
		Route::Post('/admin/user/edit/{id}', 'Admin\UserController@edit')->name('admin_user_edit');
		Route::get('/admin/user/delete/{id}', 'Admin\UserController@delete')->name('admin_user_delete');
		Route::get('/admin/user/create', 'Admin\UserController@create')->name('admin_user_creaete');
		Route::post('/admin/user/create', 'Admin\UserController@create')->name('admin_user_create');

		Route::post('/admin/user/postAssignRoles', 'Admin\UserController@postAssignRoles');

		Route::get('/admin/gallery/images/albums', 'Admin\ImagesController@albums')->name('admin_gallery_images_albums');
		Route::get('/admin/gallery/images/albums/create', 'Admin\ImagesController@albumsCreate')->name('admin_gallery_images_albums_create');
		Route::post('/admin/gallery/images/albums/create', 'Admin\ImagesController@albumsCreate')->name('admin_gallery_images_albums_create');
		Route::get('/admin/gallery/images/albums/edit/{id}', 'Admin\ImagesController@albumsEdit')->name('admin_gallery_images_albums_edit');
		Route::post('/admin/gallery/images/albums/edit/{id}', 'Admin\ImagesController@albumsEdit')->name('admin_gallery_images_albums_edit');
		Route::get('/admin/gallery/images/albums/delete/{id}', 'Admin\ImagesController@albumsDelete')->name('admin_gallery_images_albums_delete');

		Route::get('/admin/gallery/images/albums/up/{id}', 'Admin\ImagesController@albumsUp')->name('admin_gallery_images_albums_up');
		Route::get('/admin/gallery/images/albums/down/{id}', 'Admin\ImagesController@albumsDown')->name('admin_gallery_images_albums_down');

		Route::get('/admin/gallery/images/albums/{id}', 'Admin\ImagesController@albumsImages')->name('admin_gallery_images_albums_images');
		Route::get('/admin/gallery/images/albums/delete/image/{id}', 'Admin\ImagesController@albumsImageDelete')->name('admin_gallery_images_albums_image_delete');

		Route::get('/admin/gallery/images/albums/{id}/upload', 'Admin\ImagesController@albumsImagesUpload')->name('admin_gallery_images_albums_images_upload');
		Route::post('/admin/gallery/images/albums/{id}/upload', 'Admin\ImagesController@albumsImagesUpload')->name('admin_gallery_images_albums_images_upload');

		Route::post('/admin/gallery/images/albums/{id}/setThumb', 'Admin\ImagesController@albusmImagesSetThumb')->name('admin_gallery_images_albums_images_setThumb');

		Route::redirect('/admin/links', '/admin/links/index', 301);
		Route::get('/admin/links/index', 'Admin\LinksController@links')->name('admin_links');
		Route::get('/admin/links/create', 'Admin\LinksController@create')->name('admin_links_create');
		Route::post('/admin/links/create', 'Admin\LinksController@create')->name('admin_links_create');
		Route::get('/admin/links/edit/{id}', 'Admin\LinksController@edit')->name('admin_links_edit');
		Route::post('/admin/links/edit/{id}', 'Admin\LinksController@edit')->name('admin_links_edit');
		Route::get('/admin/links/delete/{id}', 'Admin\LinksController@delete')->name('admin_links_delete');

		Route::redirect('/admin/repertoire', '/admin/repertoire/index', 301);
		Route::get('/admin/repertoire/index', 'Admin\RepertoireController@repertoire')->name('admin_repertoire');
		Route::get('/admin/repertoire/create', 'Admin\RepertoireController@create')->name('admin_repertoire_create');
		Route::post('/admin/repertoire/create', 'Admin\RepertoireController@create')->name('admin_repertoire_create');
		Route::get('/admin/repertoire/edit/{id}', 'Admin\RepertoireController@edit')->name('admin_repertoire_edit');
		Route::post('/admin/repertoire/edit/{id}', 'Admin\RepertoireController@edit')->name('admin_repertoire_edit');
		Route::get('/admin/repertoire/delete/{id}', 'Admin\RepertoireController@delete')->name('admin_repertoire_delete');

		Route::redirect('/admin/videos', '/admin/videos/index', 301);
		Route::get('/admin/videos/index', 'Admin\VideosController@videos')->name('admin_videos');
		Route::get('/admin/videos/create', 'Admin\VideosController@create')->name('admin_videos_create');
		Route::post('/admin/videos/create', 'Admin\VideosController@create')->name('admin_videos_create');
		Route::get('/admin/videos/edit/{id}', 'Admin\VideosController@edit')->name('admin_videos_edit');
		Route::post('/admin/videos/edit/{id}', 'Admin\VideosController@edit')->name('admin_videos_edit');
		Route::get('/admin/videos/delete/{id}', 'Admin\VideosController@delete')->name('admin_videos_delete');

		Route::redirect('/admin/presse', '/admin/presse/index', 301);
		Route::get('/admin/presse/index', 'Admin\PresseController@presse')->name('admin_presse');
		Route::get('/admin/presse/create', 'Admin\PresseController@create')->name('admin_presse_create');
		Route::post('/admin/presse/create', 'Admin\PresseController@create')->name('admin_presse_create');
		Route::get('/admin/presse/delete/{id}', 'Admin\PresseController@delete')->name('admin_presse_delete');

	});

});
