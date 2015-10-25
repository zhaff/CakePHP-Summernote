CakePHP-Summernote
====================

Summernote plugin for CakePHP 2.x

Installation
============

Your need HTML5 doctype and jQuery enabled in the page. Plugin works fine with jQuery 1.9.1.

You can install the plugin in your app folder using the following command:

`git clone git://github.com/zhaff/CakePHP-Summernote.git Plugin/Summernote`

Usage
=====

Bootstrap
---------
`<?php
//...some code
CakePlugin::load('Summernote');`


Controller
----------
`<?php
class MyController extends AppController
{
    public $helpers = array(
		'Editor' => array(
			'className' => 'Summernote.Summernote'
		),
	);
}
?>
`

View
----
`<?php
    echo $this->Form->input('fieldName'),
         $this->Editor->render('fieldName');
`

Known bugs
==========

...

TODO
====

1. ....


