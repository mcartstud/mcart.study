<?php

namespace Sprint\Migration;


class Agents120241202172849 extends Version
{
    protected $author = "admin";

    protected $description = "Агенты по недвижимости";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
    $hlblockId = $helper->Hlblock()->saveHlblock(array (
  'NAME' => 'Agents',
  'TABLE_NAME' => 'agents',
));
        $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_ACTIVITY',
  'USER_TYPE_ID' => 'boolean',
  'XML_ID' => 'UF_ACTIVITY',
  'SORT' => '90',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'DEFAULT_VALUE' => 1,
    'DISPLAY' => 'DROPDOWN',
    'LABEL' => 
    array (
      0 => 'Неактивен',
      1 => 'Активен',
    ),
    'LABEL_CHECKBOX' => 'Активность',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Activity',
    'ru' => 'Активность',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Activity',
    'ru' => 'Активность',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Activity',
    'ru' => 'Активность',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
));
            $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_NAME',
  'USER_TYPE_ID' => 'string',
  'XML_ID' => 'UF_NAME',
  'SORT' => '100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'Y',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'Y',
  'SETTINGS' => 
  array (
    'SIZE' => 20,
    'ROWS' => 1,
    'REGEXP' => '',
    'MIN_LENGTH' => 0,
    'MAX_LENGTH' => 0,
    'DEFAULT_VALUE' => '',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Name',
    'ru' => 'ФИО',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Name',
    'ru' => 'ФИО',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Name',
    'ru' => 'ФИО',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
));
            $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_EMAIL',
  'USER_TYPE_ID' => 'string',
  'XML_ID' => 'UF_EMAIL',
  'SORT' => '200',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'Y',
  'SETTINGS' => 
  array (
    'SIZE' => 20,
    'ROWS' => 1,
    'REGEXP' => '',
    'MIN_LENGTH' => 0,
    'MAX_LENGTH' => 0,
    'DEFAULT_VALUE' => '',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Email',
    'ru' => 'Эл. почта',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Email',
    'ru' => 'Эл. почта',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Email',
    'ru' => 'Эл. почта',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
));
            $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_PHONE',
  'USER_TYPE_ID' => 'string',
  'XML_ID' => 'UF_PHONE',
  'SORT' => '300',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'Y',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'SIZE' => 20,
    'ROWS' => 1,
    'REGEXP' => '',
    'MIN_LENGTH' => 0,
    'MAX_LENGTH' => 12,
    'DEFAULT_VALUE' => '',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Phone number',
    'ru' => 'Номер телефона',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Phone number',
    'ru' => 'Номер телефона',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Phone number',
    'ru' => 'Номер телефона',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
));
            $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_TYPE',
  'USER_TYPE_ID' => 'enumeration',
  'XML_ID' => 'UF_TYPE',
  'SORT' => '400',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'Y',
  'SHOW_FILTER' => 'I',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'DISPLAY' => 'LIST',
    'LIST_HEIGHT' => 4,
    'CAPTION_NO_VALUE' => '(не выбрано)',
    'SHOW_NO_VALUE' => 'N',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Type of activity',
    'ru' => 'Вид деятельности',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Type of activity',
    'ru' => 'Вид деятельности',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Type of activity',
    'ru' => 'Вид деятельности',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'ENUM_VALUES' => 
  array (
    0 => 
    array (
      'VALUE' => 'Брокер',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'Broker',
    ),
    1 => 
    array (
      'VALUE' => 'Агент по продаже',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'Selling Agent',
    ),
    2 => 
    array (
      'VALUE' => 'Агент по покупке',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'Buying Agent',
    ),
    3 => 
    array (
      'VALUE' => 'Риэлтор',
      'DEF' => 'Y',
      'SORT' => '500',
      'XML_ID' => 'Realtor',
    ),
  ),
));
            $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_PHOTO',
  'USER_TYPE_ID' => 'file',
  'XML_ID' => 'UF_PHOTO',
  'SORT' => '500',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'SIZE' => 20,
    'LIST_WIDTH' => 0,
    'LIST_HEIGHT' => 0,
    'MAX_SHOW_SIZE' => 0,
    'MAX_ALLOWED_SIZE' => 0,
    'EXTENSIONS' => 
    array (
      'jpg' => true,
      'png' => true,
      'gif' => true,
      'webp' => true,
    ),
    'TARGET_BLANK' => 'Y',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Photo',
    'ru' => 'Фото',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Photo',
    'ru' => 'Фото',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Photo',
    'ru' => 'Фото',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
));
        }
        public function down(){
          $helper = $this->getHelperManager();
          $ok = $helper->Hlblock()->deleteHlblockIfExists('Agents');

          if ($ok) {
              $this->outSuccess('Highload-блок удален');
          } else {
              $this->outError('Ошибка удаления Highload-блока');
          }
        }
}
