<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;
use MongoDB\Client as MongoDB;

class TestController extends Controller
{
    //REDIS
    public function redis1(){
        $key = 'aaa';
        $val = 'hello';
        Redis::set($key,$val);
        echo "set 成功";
    }
    //
    public function redis2(){
        $key = 'aaa';
        $val = Redis::get($key);
        echo "val:" . $val;
    }
    //MYSQL
    public function mysql1(){
        $list = DB::table('register')->first();
        var_dump($list);
    }
    //
    public function mysql2(){
        $data =[
            'tel'=> '11111111111',
            'email'=>'2280191635@qq.com',
        ];
        $list = DB::table('register')->insert($data);
        var_dump($list);
    }

    //
    public function mongo1(){
        $host = "192.168.62.190";
        $db = "ln1906";
        $tab = "users";
        echo __METHOD__;echo"<br>";
        $client = new Client("mongodb://{$host}:27017");

        $collection = $client->$db->$tab;
        $result = $collection->find()->toArray();
        echo "<pre>";print_r($result);echo "</pre>";
        var_dump($result);
    }
}
