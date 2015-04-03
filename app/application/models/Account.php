<?php
// use Illuminate\Database\Capsule\Manager as Capsule;
class Account extends Illuminate\Database\Eloquent\Model {

    protected $table = 'f_account';
    protected $primaryKey = 'aid';

    protected $softDelete = false;


    public function test(){
        $users = DB::table('f_account')->where('aid', '=', 2)->get();
        return $users;
        // return 'aaab';
    }

}
