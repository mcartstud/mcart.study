<?    
    AddEventHandler("main", "OnAfterUserRegister", Array("Auth", "SetUserType"));
    class Auth 
    {
        static function SetUserType(&$arFields) {
            if (Cmodule::IncludeModule('iblock')) {
                if($arFields["USER_ID"]>0) {
                    $rsEnum = CUserFieldEnum::GetList(array(), array("ID" => $arFields['UF_USERTYPE']));
                    $arEnum = $rsEnum->GetNext();
                    $arGroups = [2];
                    switch ($arEnum["XML_ID"]) {
                        case 'saler':
                            $arGroups = [7];
                            break;
                        case 'buyer':
                            $arGroups = [8];
                            break;
                    }
                    CUser::SetUserGroup($arFields["USER_ID"], $arGroups);
                }
            }
        }
    }
?>