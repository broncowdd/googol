<?php

#############################################
#                                           #
# ▒▒▒▒▒  ▒▒  ▒▒ ▒▒▒▒▒  ▒▒▒▒    ▒▒▒▒   ▒▒▒▒  #
# ▒▒  ▒▒ ▒▒  ▒▒ ▒▒  ▒▒  ▒▒      ▒▒   ▒▒  ▒▒ #
# ▒▒  ▒▒ ▒▒  ▒▒ ▒▒  ▒▒  ▒▒      ▒▒   ▒▒     #
# ▒▒▒▒▒  ▒▒  ▒▒ ▒▒▒▒▒   ▒▒      ▒▒   ▒▒     #
# ▒▒     ▒▒  ▒▒ ▒▒  ▒▒  ▒▒      ▒▒   ▒▒     #
# ▒▒     ▒▒  ▒▒ ▒▒  ▒▒  ▒▒ ▒▒   ▒▒   ▒▒  ▒▒ #
# ▒▒      ▒▒▒▒  ▒▒▒▒▒  ▒▒▒▒▒▒  ▒▒▒▒   ▒▒▒▒  #
#                                           #
#############################################
if (
	!empty($_POST['token'])	
	&&!empty($_POST['sid'])
	&&$_POST['sid']==myUrlHash()
){
	$secure->needToken();
	# Create/edit a collablog
	if (!empty($_POST['p'])){
		$path=DATA.$_POST['p'].'/';
		$cfg['background']=$cfg['header']=$cfg['title']='';

		if (is_dir($path)&&empty($_POST['edit'])){
			$_POST['p'].=uniqid(true);
			$path=DATA.$_POST['p'].'/';
		}
		if (!is_dir($path)){mkdir($path,0755);}
		if (!is_dir($path.'img')){mkdir($path.'img',0755);}
		if (!is_file($path.'index.html')){
			file_put_contents($path.'index.html', '');
		}
		

		if (!empty($_FILES['header']['name'])){
			$local_filename=renameForPath($_FILES['header']['name']);
			$header=$path.'img/'.$local_filename;			
			$cfg['header']=$local_filename;
			upload($_FILES['header']['tmp_name'],$header);
		}elseif(!empty($_POST['oldheader'])){
			$cfg['header']=$_POST['oldheader'];
		}

		if (!empty($_POST['background'])){
			$cfg['background']=$_POST['background'];
		}
		if (!empty($_POST['title'])){
			$cfg['title']=$_POST['title'];
		}		
		if (!empty($_POST['text'])){
			$cfg['text']=$_POST['text'];
		}
		store($path.'config.php',$cfg);
		header('Location: index.php?p='.$_POST['p']);
		exit;
	}elseif (isset($_POST['button'])){
		# Create a post in a collablog
		unset($_POST['token']);
		unset($_POST['button']);
		unset($_POST['sid']);
		$img='';
		if (!empty($_POST['pad'])){
			$pad=$_POST['pad'];
			unset($_POST['pad']);
			$path=DATA.$pad.'/';
		}

		if (empty($_POST['itemssalé'])){
			$_POST['itemssalé']=[];
		}
		if (empty($_POST['itemssucré'])){
			$_POST['itemssucré']=[];
		}
		if (empty($_POST['itemsboisson'])){
			$_POST['itemsboisson']=[];
		}
		if (!empty($_FILES['documents'])){
			foreach ($_FILES['documents']['name'] as $key => $name) {
				$docs[$key]=$path.'img/'.$name;
				upload($_FILES['documents']['tmp_name'][$key],$docs[$key]);
			}
			$_POST['docs']=$docs;
		}else{
			$_POST['docs']=$data['docs'];
		}

		if ($pad&&$_POST['name']){
			$filename=date('Ymd').'_'.date('U').'_'.renameForPath($_POST['name']).'_'.renameForPath($_POST['title']).'.md';
			$_POST['date']=date('d/m/Y h:i:s');
			
			store($path.$filename,$_POST);
			header('Location: index.php?p='.$pad);
			exit;
		}
	}
}

#######################################
#                                     #
#  ▒▒▒▒  ▒▒▒▒▒  ▒     ▒  ▒▒▒▒  ▒   ▒▒ #
# ▒▒  ▒▒ ▒▒  ▒▒ ▒▒   ▒▒   ▒▒   ▒▒  ▒▒ #
# ▒▒  ▒▒ ▒▒  ▒▒ ▒▒▒ ▒▒▒   ▒▒   ▒▒▒ ▒▒ #
# ▒▒▒▒▒▒ ▒▒  ▒▒ ▒▒▒▒▒▒▒   ▒▒   ▒▒▒▒▒▒ #
# ▒▒  ▒▒ ▒▒  ▒▒ ▒▒ ▒ ▒▒   ▒▒   ▒▒ ▒▒▒ #
# ▒▒  ▒▒ ▒▒  ▒▒ ▒▒   ▒▒   ▒▒   ▒▒  ▒▒ #
# ▒▒  ▒▒ ▒▒▒▒▒  ▒▒   ▒▒  ▒▒▒▒  ▒▒   ▒ #
#                                     #
#######################################
	if($_POST){
		$secure->lock();
	}
	# Delete a collablog
	if (!empty($_POST['delete'])){
		deleteDir(DATA.$_POST['delete']);
		header('location: index.php?admin');
		exit;
	}

	# Delete a post in a collablog
	if (!empty($_POST['deletepost'])){
		unlink(DATA.$_POST['pad'].'/'.$_POST['deletepost']);
		header('location: index.php?p='.$_POST['pad']);
		exit;
	}

	# Edit a post in a collablog
	if (!empty($_POST['editpost'])){
			# Create a post in a collablog
		unset($_POST['token']);
		unset($_POST['editpost']);
		unset($_POST['sid']);
		$img='';
		
		if (!empty($_POST['pad'])){
			$pad=$_POST['pad'];
			unset($_POST['pad']);
			$path=DATA.$pad.'/';
		}
		$data=unstore($path.$_POST['file']);
		$name=$_POST['name'];

		if (!empty($_FILES['image']['name'])){
			$img=$path.'img/'.renameForPath($_FILES['image']['name']);
			upload($_FILES['image']['tmp_name'],$img);	
			$_POST['image']=$img;	
		}else{
			$_POST['image']=$data['image'];
		}

		if (!empty($_FILES['documents'])){
			foreach ($_FILES['documents']['name'] as $key => $name) {
				$docs[$key]=$path.'img/'.renameForPath($name);
				upload($_FILES['documents']['tmp_name'][$key],$docs[$key]);
			}
			$_POST['docs']=$docs;
		}else{
			$_POST['docs']=$data['docs'];
		}
		$_POST['date']=trad('Edité le').' '.date('d/m/Y h:i:s');
		if ($pad&&$_POST['text']&&$_POST['title']&&$_POST['name']){
			$filename=$_POST['file'];			
			store($path.$filename,$_POST);
			header('Location: index.php?p='.$pad);
			exit;
		}
	}

	# Change config
	if (!empty($_POST['config_form'])){
		unset($_POST['config_form']);
		unset($_POST['token']);
		if (empty($_POST['display_menu'])){
			$_POST['display_menu']='';
		}
		store(DATA.'config.php',$_POST);
		header('location: index.php?admin');
		exit;
	}
