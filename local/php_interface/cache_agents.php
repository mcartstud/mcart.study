<?    
    $eventManager = \Bitrix\Main\EventManager::getInstance();
    $eventManager->addEventHandler('', 'AgentsOnAfterAdd', 'reset_cache');
    $eventManager->addEventHandler('', 'AgentsOnAfterUpdate', 'reset_cache');
    $eventManager->addEventHandler('', 'AgentsOnAfterDelete', 'reset_cache');
    function reset_cache(\Bitrix\Main\Entity\Event $event) {
        $taggedCache = \Bitrix\Main\Application::getInstance()->getTaggedCache();
        $taggedCache->clearByTag('hlblock_table_name_' . $event->GetEntity()->getName());
    }
?>