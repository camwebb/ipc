<?php

class conf_ApplicationDelegate {

    // change the logo, see https://xataface-tips.blogspot.com/2013/05/ \
    //   how-to-use-chrome-and-css-to-customize.html
    public function beforeHandleRequest(){
        Dataface_Application::getInstance()->addHeadContent(
            sprintf('<link rel="stylesheet" type="text/css" href="%s"/>',
                    htmlspecialchars(DATAFACE_SITE_URL.'/css/style.css')));
        Dataface_Application::getInstance()->addHeadContent(
            sprintf('<link rel="icon" type="image/jpeg" href="../img/icon.jpg"/>'));
    }
    
    function getPermissions(&$record){
        $auth =& Dataface_AuthenticationTool::getInstance();
        $user =& $auth->getLoggedInUser();
        if ( !isset($user) ) return Dataface_PermissionsTool::READ_ONLY();
        $role = $user->val('Role');
        return Dataface_PermissionsTool::getRolePermissions($role);
    }

    // add a HOME link
    function block__after_xf_logo()
    {
        echo "<a href=\"../index.html\">HOME</a> - <a href=\"../families.html\">Families</a> - <a href=\"../genera.html\">Genera</a>";
    }
    
}
?>
