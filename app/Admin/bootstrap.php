<?php
/**
 * 引入css或js插件资源
 *
 * Admin::css('/packages/css/styles.css');
 * Admin::js('/packages/js/main.js');
 */
app('view')->prependNamespace('admin', admin_path('admin-views'));
