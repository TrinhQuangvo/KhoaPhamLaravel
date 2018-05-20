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



    Route::get('index',[
        'as' => 'trang-chu',
        'uses' => 'PageController@getIndex'
    ]);
    Route::get('loai-san-pham/{type}',[
        'as'=>'loaisanpham',
        'uses'=>'PageController@getLoaiSp'
    ]);
    Route::get('chitiet/{id}',[
        'as'=>'chitiet',
        'uses'=>'PageController@getChiTiet'
    ]);
    Route::get('lienhe',[
        'as'=>'lienhe',
        'uses'=>'PageController@getLienHe'
    ]);
    Route::get('gioithieu',[
        'as'=>'gioithieu',
        'uese'=>'PageController@getGioiThieu'
    ]);
    Route::get('add-to-cart/{id}',[
        'as'=>'themgiohang',
        'uses'=>'PageController@getAddToCart'
    ]);

    Route::get('del-cart/{id}',[
        'as'=>'xoagiohang',
        'uses'=>'PageController@getDelItemCart'
    ]);

    Route::get('dat-hang',[
        'as'=>'dathang',
        'uses'=>'PageController@getCheckOut'
    ]);
    Route::post('dat-hang',[
        'as'=>'dathang',
        'uses'=>'PageController@postCheckOut'
    ]);
    Route::get('dang-nhap',[
        'as'=>'login',
        'uses'=>'PageController@getLogin'
    ]);
    Route::post('dang-nhap',[
        'as'=>'login',
        'uses'=>'PageController@postLogin'
    ]);
    Route::get('dang-ky',[
        'as'=>'signup',
        'uses'=>'PageController@getSignUp'
    ]);

    Route::post('dang-ky',[
        'as'=>'signup',
        'uses'=>'PageController@postSignUp'
    ]);
    Route::get('dang-xuat',[
        'as'=>'logout',
        'uses'=>'PageController@gettLogout'
    ]);
    Route::get('search',[
        'as'=>'search',
        'uses'=>'PageController@getSearch'
    ]);