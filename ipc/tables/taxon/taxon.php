<?php

class tables_taxon {
    
    // only allow access to this table if logged in
    function getPermissions(&$record){
        $auth =& Dataface_AuthenticationTool::getInstance();
        $user =& $auth->getLoggedInUser();
        if ( !isset($user) ) return Dataface_PermissionsTool::NO_ACCESS();
    }
}
?>
