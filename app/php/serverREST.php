<?php
if (!class_exists('REST')){
	require_once PHP.'class/Helium_REST_class.php';
	$rest 	=new REST();   
}

$request=$rest->get_request();


if (!empty($request['data'])){


	########################
	#                      #
	#  ░░░░  ░░░░░░ ░░░░░░ #
	# ░░  ░░ ░░     ░ ░░ ░ #
	# ░░     ░░       ░░   #
	# ░░ ░░░ ░░░░░    ░░   #
	# ░░  ░░ ░░       ░░   #
	# ░░  ░░ ░░       ░░   #
	#  ░░░░  ░░░░░░  ░░░░  #
	#                      #
	########################		
	if ($request['method']=='GET'){
		# code here
	}

	###############################
	#                             #
	# ░░░░░   ░░░░   ░░░░  ░░░░░░ #
	# ░░  ░░ ░░  ░░ ░░  ░░ ░ ░░ ░ #
	# ░░  ░░ ░░  ░░  ░░      ░░   #
	# ░░░░░  ░░  ░░   ░░     ░░   #
	# ░░     ░░  ░░    ░░    ░░   #
	# ░░     ░░  ░░ ░░  ░░   ░░   #
	# ░░      ░░░░   ░░░░   ░░░░  #
	#                             #
	###############################
	if ($request['method']=='POST'){
		# code here
	}

	########################
	#                      #
	# ░░░░░  ░░  ░░ ░░░░░░ #
	# ░░  ░░ ░░  ░░ ░ ░░ ░ #
	# ░░  ░░ ░░  ░░   ░░   #
	# ░░░░░  ░░  ░░   ░░   #
	# ░░     ░░  ░░   ░░   #
	# ░░     ░░  ░░   ░░   #
	# ░░      ░░░░   ░░░░  #
	#                      #
	########################
	if ($request['method']=='PUT'){
		# code here
	}

	#############################################
	#                                           #
	# ░░░░░  ░░░░░░ ░░░░   ░░░░░░ ░░░░░░ ░░░░░░ #
	# ░░  ░░ ░░      ░░    ░░     ░ ░░ ░ ░░     #
	# ░░  ░░ ░░      ░░    ░░       ░░   ░░     #
	# ░░  ░░ ░░░░░   ░░    ░░░░░    ░░   ░░░░░  #
	# ░░  ░░ ░░      ░░    ░░       ░░   ░░     #
	# ░░  ░░ ░░      ░░ ░░ ░░       ░░   ░░     #
	# ░░░░░  ░░░░░░ ░░░░░░ ░░░░░░  ░░░░  ░░░░░░ #
	#                                           #
	#############################################
	if ($request['method']=='DELETE'){
		# code here
	}

	$rest->response('your data here','the status here: 404, 200 etc');
}


