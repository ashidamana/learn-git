<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Test
 *
 * @author Administrator
 */
class Index {
    //put your code here
    public function test(){
        echo 'This is a test'.date('Y-m-d H:i:s');
    }
}

$test=new Index();
$test->test();
