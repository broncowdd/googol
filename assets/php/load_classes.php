<?php
####################################################
#                                                  #
#        ████    ████   ████  █████                #
#         ██    ██  ██ ██  ██ ██  ██               #
#         ██    ██  ██ ██  ██ ██  ██               #
#         ██    ██  ██ ██████ ██  ██               #
#         ██    ██  ██ ██  ██ ██  ██               #
#         ██ ██ ██  ██ ██  ██ ██  ██               #
#        ██████  ████  ██  ██ █████                #
#                                                  #
#                                                  #
#  ████  ████    ████   ████   ████  ██████  ████  #
# ██  ██  ██    ██  ██ ██  ██ ██  ██ ██     ██  ██ #
# ██      ██    ██  ██  ██     ██    ██      ██    #
# ██      ██    ██████   ██     ██   █████    ██   #
# ██      ██    ██  ██    ██     ██  ██        ██  #
# ██  ██  ██ ██ ██  ██ ██  ██ ██  ██ ██     ██  ██ #
#  ████  ██████ ██  ██  ████   ████  ██████  ████  #
#                                                  #
####################################################
spl_autoload_register(function ($class_name) {
    if (is_file(PHP.'class/Helium_'.$class_name . '_class.php')){
    	include PHP.'class/Helium_'.$class_name . '_class.php';
    }
});