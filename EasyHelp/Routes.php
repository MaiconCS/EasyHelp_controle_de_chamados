<?php
Route::set('login', function(){//evita msg Notice
   Login::createView('Login');
   //Login::CheckLogin($_POST['login'], $_POST['senha'])

});
Route::set('logout', function(){
   Logout::checkLogout($_SESSION);

});

Route::set('home', function(){
   Home::createView('Home');

});


//-----------------CHAMADOS-------------------------------------------------

Route::set('call-create', function(){
    CallCreate::createView('CallCreate');
});
Route::set('call-delete', function(){
    //SEM TELA PARA MOSTRAR
    CallDelete::checkCallDelete();
});
Route::set('call-management', function(){

    CallManagement::createView('CallManagement');
});
Route::set('call-update', function(){

    CallUpdate::createView('CallUpdate');
});

//-----------------SECTOR--------------------------------------------------
Route::set('sector-create', function(){

    SectorCreate::createView('SectorCreate');
});
Route::set('sector-delete', function(){
    //SEM TELA PARA MOSTRAR
    SectorDelete::checkSectorDelete();
});
Route::set('sector-management', function(){

    SectorManagement::createView('SectorManagement');
});
Route::set('sector-update', function(){

    SectorUpdate::createView('SectorUpdate');
});
//-----------------EQUIPMENT--------------------------------------------------
Route::set('equipment-create', function(){

    EquipmentCreate::createView('EquipmentCreate');
});

Route::set('equipment-delete', function(){
    //SEM TELA PARA MOSTRAR
    EquipmentDelete::checkEquipmentDelete();
});

Route::set('equipment-management', function(){

    EquipmentManagement::createView('EquipmentManagement');
});

Route::set('equipment-update', function(){

    EquipmentUpdate::createView('EquipmentUpdate');
});
//--------------USER-----------------------------------------------
Route::set('user-create', function(){

    UserCreate::createView('UserCreate');
});

Route::set('user-delete', function(){
    //SEM TELA PARA MOSTRAR
    UserDelete::checkUserDelete();
});

Route::set('user-management', function(){

    UserManagement::createView('UserManagement');
});

Route::set('user-update', function(){

    UserUpdate::createView('UserUpdate');
});

?>
