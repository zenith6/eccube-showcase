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

/**
 * ショーケースプラグイン
 *
 * @author Seiji Nitta
 */
class Showcase extends SC_Plugin_Base
{
    /**
     * コンストラクタ
     * @param array $plugin_info プラグイン情報
     */
    public function __construct(array $plugin_info)
    {
        parent::__construct($plugin_info);
    }

    /**
     * プラグインをインストールします。
     *
     * @param array $plugin_info プラグイン情報
     * @param SC_Plugin_Installer $installer プラグインインストーラー
     * @return void
     */
    public function install(array $plugin_info, SC_Plugin_Installer $installer = null)
    {
        parent::install($plugin_info, $installer);

        $installer->copyFile('logo.png', 'logo.png');
    }

    /**
     * プラグインをアンインストールします。
     *
     * @param array $plugin_info プラグイン情報
     * @param SC_Plugin_Installer $installer プラグインインストーラー
     * @return void
     */
    public function uninstall(array $plugin_info, SC_Plugin_Installer $installer = null)
    {
        parent::uninstall($plugin_info, $installer);
    }

    /**
     * プラグインを有効化します。
     *
     * @param array $plugin_info プラグイン情報
     * @param SC_Plugin_Installer $installer プラグインインストーラー
     * @return void
     */
    public function enable(array $plugin_info, SC_Plugin_Installer $installer = null)
    {
        parent::enable($plugin_info, $installer);
    }

    /**
     * プラグインを無効化します。
     *
     * @param array $plugin_info プラグイン情報
     * @param SC_Plugin_Installer $installer プラグインインストーラー
     * @return void
     */
    public function disable(array $plugin_info, SC_Plugin_Installer $installer = null)
    {
        parent::disable($plugin_info, $installer);
    }

    /**
     * フックを登録します。
     *
     * @param SC_Helper_Plugin $pluginHelper プラグインヘルパー
     * @param int $priority
     */
    public function register(SC_Helper_Plugin $plugin_helper, $priority)
    {
        parent::register($plugin_helper, $priority);
    }
}
