<?php

class tables_person {
    
    // only allow access to this table if logged in
    /* 
    function getPermissions(&$record){
        $auth =& Dataface_AuthenticationTool::getInstance();
        $user =& $auth->getLoggedInUser();
        if ( !isset($user) ) return Dataface_PermissionsTool::NO_ACCESS();
    }
    */

    // for browse
    function fb_name__htmlValue(&$record){
        return '<a href="https://www.facebook.com/' . $record->val('fb_name') .
                                                    '" target="_blank">'
                                                    . $record->val('fb_name').
                                                    '</a>';
    }
    
}
?>
