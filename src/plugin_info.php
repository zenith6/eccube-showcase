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
 * プラグインの情報を表します。
 *
 * @author Seiji Nitta
 */
class plugin_info
{
    public static $PLUGIN_CODE = 'Showcase';
    public static $PLUGIN_NAME = 'ショーケースプラグイン';
    public static $PLUGIN_VERSION = '1.0.0';
    public static $PLUGIN_SITE_URL = 'http://zenith6.github.com/eccube-showcase/';
    public static $DESCRIPTION = '商品の陳列機能を追加します。';
    public static $AUTHOR = 'Seiji Nitta';
    public static $AUTHOR_SITE_URL = 'http://zenith6.github.com/';
    public static $LICENSE = 'LGPL';
    public static $CLASS_NAME = 'Showcase';
    public static $COMPLIANT_VERSION = '2.13.1';
    public static $HOOK_POINTS = array();
}
