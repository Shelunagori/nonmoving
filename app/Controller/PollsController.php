<?php
class PollsController extends AppController {
var $helpers = array('Html', 'Form');
public $components = array(
'Paginator',
'Session','Cookie','RequestHandler'
);


var $name = 'Polls';




function index()
{

}

}
?>