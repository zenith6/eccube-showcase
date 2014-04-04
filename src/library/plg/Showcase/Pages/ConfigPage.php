<?php
/*
 * ショーケースプラグイン
 * Copyright (C) 2014 Seiji Nitta All Rights Reserved.
 * http://zenith6.github.io/
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

require_once CLASS_EX_REALDIR . 'page_extends/admin/LC_Page_Admin_Ex.php';

/**
 * プラグインの設定画面
 *
 * @author Seiji Nitta
 */
class plg_Showcase_Pages_ConfigPage extends LC_Page_Admin_Ex
{
    /**
     * @var Zeclib_PageStorage
     */
    public $storage;

    /**
     * @var array
     */
    public $errors = array();

    public function init()
    {
        parent::init();

        $this->template = PLUGIN_UPLOAD_REALDIR . 'Showcase/templates/admin/ownersstore/plg_Showcase_config.tpl';
        $this->tpl_subtitle = 'プラグイン設定';
    }

    public function process()
    {
        parent::process();

        $this->storage = $this->restoreStorage();

        $mode = $this->getMode();
        switch ($mode) {
            case 'save':
                $this->doSave();
                break;

            case 'edit':
            default:
                $this->doEdit();
                break;
        }
    }

    /**
     * @return Zeclib_PageStorage
     */
    protected function restoreStorage()
    {
        $storage = $this->createDefaultStorage();

        if (isset($_REQUEST['storage']) && is_string($_REQUEST['storage'])) {
            $encoded = $_REQUEST['storage'];
            $storage->restore($encoded);
        }

        return $storage;
    }

    /**
     * @return Zeclib_PageStorage
     */
    protected function createDefaultStorage()
    {
        $storage = new Zeclib_PageStorage(array(), AUTH_MAGIC);

        return $storage;
    }

    /**
     * @param SC_FormParam_Ex $params
     */
    protected function doEdit(SC_FormParam_Ex $params = null)
    {
        if (!$params) {
            $params = $this->buildFormParam();
            $this->setDefaultFormValues($params);
        }

        $this->form = $this->buildForm($params, $this->errors);
        $this->sendResponse();
    }

    /**
     * @param SC_FormParam_Ex $params
     */
    protected function setDefaultFormValues(SC_FormParam_Ex $params)
    {
    }

    /**
     * @throws Exception
     */
    protected function doSave()
    {
        try {
            $query = SC_Query_Ex::getSingletonInstance();
            $query->begin();

            $params = $this->buildFormParam();
            $params->setParam($_POST);

            $this->errors = $this->validateFormParams($params);
            if ($this->errors) {
                $query->rollback();
                $this->doEdit($params);
                return;
            }

            $this->applyFormParams($params);

            $query->commit();

            $this->tpl_javascript = "$(window).load(function () { alert('登録しました。'); });";
            $this->doEdit($params);
        } catch (Exception $e) {
            $query->rollback();

            throw $e;
        }
    }

    /**
     * @param SC_FormParam_Ex $params
     * @param array $errors
     * @return array
     */
    protected function buildForm(SC_FormParam_Ex $params, array $errors = array())
    {
        $form = array();

        foreach ($params->keyname as $index => $key) {
            $form[$key] = array(
                'title'     => $params->disp_name[$index],
                'value'     => $params->getValue($key),
                'maxlength' => $params->length[$index],
                'error'     => null,
            );
        }

        foreach ($errors as $key => $error) {
            $form[$key]['error'] = $error;
        }

        return $form;
    }

    /**
     * @return SC_FormParam_Ex
     */
    protected function buildFormParam()
    {
        $params = new SC_FormParam_Ex();

        return $params;
    }

    /**
     * @param SC_FormParam_Ex $params
     * @return array
     */
    protected function validateFormParams(SC_FormParam_Ex $params)
    {
        $errors = $params->checkError();

        return $errors;
    }

    /**
     * @param SC_FormParam_Ex $params
     */
    protected function applyFormParams(SC_FormParam_Ex $params)
    {
    }
}
