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

require_once dirname(__FILE__) . '/plugin_bootstrap.php';

/**
 * プラグインのアップデートクラス
 *
 * @author Seiji Nitta
 */
class plugin_update
{
    /**
     * プラグインをアップデートします。
     *
     * @param array $pluginInfo プラグイン情報
     * @param SC_Plugin_Installer $installer プラグインインストーラー
     * @return void
     */
    public function update(array $pluginInfo, SC_Plugin_Installer $installer)
    {
        $query = SC_Query_Ex::getSingletonInstance();

        $storage = new Zeclib_DefaultMigrationStorage($query, 'Showcase');
        $storage->versionTable = 'plg_showcase_migration';
        $storage->containerDirectories[] = dirname(__FILE__) . '/migrations';

        $migrator = new Zeclib_Migrator($storage, $query);
        $migrator->logger = new Zeclib_EccubeMigrationLogger($this);

        $migrator->up();
    }
}
