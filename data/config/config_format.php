<?php
##############################################
#                                            #
#  ████   ████  █   ██ ██████  ████   ████   #
# ██  ██ ██  ██ ██  ██ ██       ██   ██  ██  #
# ██     ██  ██ ███ ██ ██       ██   ██      #
# ██     ██  ██ ██████ █████    ██   ██ ███  #
# ██     ██  ██ ██ ███ ██       ██   ██  ██  #
# ██  ██ ██  ██ ██  ██ ██       ██   ██  ██  #
#  ████   ████  ██   █ ██      ████   ████   #
#                                            #
# ██████  ████  █████  █     █  ████  ██████ #
# ██     ██  ██ ██  ██ ██   ██ ██  ██ █ ██ █ #
# ██     ██  ██ ██  ██ ███ ███ ██  ██   ██   #
# █████  ██  ██ █████  ███████ ██████   ██   #
# ██     ██  ██ ██  ██ ██ █ ██ ██  ██   ██   #
# ██     ██  ██ ██  ██ ██   ██ ██  ██   ██   #
# ██      ████  ██  ██ ██   ██ ██  ██  ████  #
#                                            #
##############################################

$config_format=[
	# 'var' => ['default_value'=>'xxx','type'=>'select','description'=>'text that appears in the config form','other_values'=>[1,2,3,4,5]],
	'color' => ['default_value'=>'white','type'=>'select','description'=>'background app colour','other_values'=>['blue','green','yellow','orange','pink','red','violet']],
	'name' => ['default_value'=>'Nobody','type'=>'text','required'=>true,'description'=>'Choose a nice name'],
	'email' => ['default_value'=>'','type'=>'email','description'=>'Give me your email!','class'=>'email'],
	'date' => ['default_value'=>'','type'=>'date','description'=>'Give me your birthdate!'],
	'nb' => ['default_value'=>'10','type'=>'number','description'=>'How many fucks do you give about Helium ?!','min'=>0,'max'=>10],
	'use_avatars' => ['default_value'=>true,'type'=>'checkbox','description'=>'Check if you want to use auto generated avatars'],
	
];

