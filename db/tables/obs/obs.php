<?php

class tables_obs {

    // change Title for the record
    function getTitle(&$record){
        return $record->val('person').' '.$record->strval('post_date');
   }

    // date format
    function post_date__display(&$record) {
        return $record->strval('post_date');
    } 

    // Hiding uploader if user not logged in
    function uploader__permissions(&$record){
        $auth =& Dataface_AuthenticationTool::getInstance();
        $user =& $auth->getLoggedInUser();
        if ( !isset($user) ) return Dataface_PermissionsTool::NO_ACCESS();
    }

    
    // for list
    function pics__renderCell(&$record){
        if (!empty($record->val('photo1')))
            return '<img src="'.$record->display('photo1').
                               '" height="100"></img>';
        else return '';
    }

    // for browse
    function pics__htmlValue(&$record){
        if (!empty($record->val('photo1')))
            $pic1 = '<td><a href="'.$record->display('photo1') .
                  '" target="_blank"><img src="'
                  . $record->display('photo1').
                  '" height="100"></img></a></td>';
        if (!empty($record->val('photo2')))
            $pic2 = '<td><a href="'.$record->display('photo2') .
                  '" target="_blank"><img src="'
                  . $record->display('photo2').
                  '" height="100"></img></a></td>';
        if (!empty($record->val('photo3')))
            $pic3 = '<td><a href="'.$record->display('photo3') .
                  '" target="_blank"><img src="'
                  . $record->display('photo3').
                  '" height="100"></img></a></td>';
        if (!empty($record->val('photo4')))
            $pic4 = '<td><a href="'.$record->display('photo4') .
                  '" target="_blank"><img src="'
                  . $record->display('photo4').
                  '" height="100"></img></a></td>';
        if (!empty($record->val('photo5')))
            $pic5 = '<td><a href="'.$record->display('photo5') .
                  '" target="_blank"><img src="'
                  . $record->display('photo5').
                  '" height="100"></img></a></td>';
        return '<table><tr>'.$pic1.$pic2.$pic3.$pic4.$pic5.'</tr></table>';
    }

    function pics2__htmlValue(&$record){
        if (!empty($record->val('photo6')))
            $pic6 = '<td><a href="'.$record->display('photo6') .
                  '" target="_blank"><img src="'
                  . $record->display('photo6').
                  '" height="100"></img></a></td>';
        if (!empty($record->val('photo7')))
            $pic7 = '<td><a href="'.$record->display('photo7') .
                  '" target="_blank"><img src="'
                  . $record->display('photo7').
                  '" height="100"></img></a></td>';
        if (!empty($record->val('photo8')))
            $pic8 = '<td><a href="'.$record->display('photo8') .
                  '" target="_blank"><img src="'
                  . $record->display('photo8').
                  '" height="100"></img></a></td>';
        if (!empty($record->val('photo9')))
            $pic9 = '<td><a href="'.$record->display('photo9') .
                  '" target="_blank"><img src="'
                  . $record->display('photo9').
                  '" height="100"></img></a></td>';
        if (!empty($record->val('photo10')))
            $pic10 = '<td><a href="'.$record->display('photo10') .
                  '" target="_blank"><img src="'
                  . $record->display('photo10').
                  '" height="100"></img></a></td>';
        return '<table><tr>'.$pic6.$pic7.$pic8.$pic9.$pic10.'</tr></table>';
    }

    // for browse
    function fb_link__htmlValue(&$record){
        return '<a href="'.$record->val('fb_link') .
                  '" target="_blank">'
                  . $record->val('fb_link').
                  '</a>';
    }

}
?>
