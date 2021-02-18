<?php
/*
    Copyright (C) 2008-2012 Sergey Tsalkov (stsalkov@gmail.com)

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Lesser General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Lesser General Public License for more details.

    You should have received a copy of the GNU Lesser General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/


class DB {
  // initial connection
  public static $dbName = 'INBANG_ADSENSE';
  public static $user = 'phpmyadmin';
  public static $password = 'ehsqjfwk1!';
  public static $host = '49.247.205.10';
  public static $port = null;
  public static $encoding = 'utf8mb4';

  // configure workings
  public static $param_char = '%';
  public static $named_param_seperator = '_';
  public static $success_handler = false;
  public static $error_handler = true;
  public static $throw_exception_on_error = false;
  public static $nonsql_error_handler = null;
  public static $throw_exception_on_nonsql_error = false;
  public static $nested_transactions = false;
  public static $usenull = true;
  public static $ssl = array('key' => '', 'cert' => '', 'ca_cert' => '', 'ca_path' => '', 'cipher' => '');
  public static $connect_options = array(MYSQLI_OPT_CONNECT_TIMEOUT => 30);

  // internal
  protected static $mdb = null;

  public static function getMDB() {
    $mdb = DB::$mdb;

    if ($mdb === null) {
      $mdb = DB::$mdb = new MeekroDB();
    }

    static $variables_to_sync = array('param_char', 'named_param_seperator', 'success_handler', 'error_handler', 'throw_exception_on_error',
      'nonsql_error_handler', 'throw_exception_on_nonsql_error', 'nested_transactions', 'usenull', 'ssl', 'connect_options');

    $db_class_vars = get_class_vars('DB'); // the DB::$$var syntax only works in 5.3+

    foreach ($variables_to_sync as $variable) {
      if ($mdb->$variable !== $db_class_vars[$variable]) {
        $mdb->$variable = $db_class_vars[$variable];
      }
    }

    return $mdb;
  }

  // yes, this is ugly. __callStatic() only works in 5.3+
  public static function get() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'get'), $args); }
  public static function disconnect() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'disconnect'), $args); }
  public static function query() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'query'), $args); }
  public static function queryFirstRow() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'queryFirstRow'), $args); }
  public static function queryOneRow() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'queryOneRow'), $args); }
  public static function queryAllLists() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'queryAllLists'), $args); }
  public static function queryFullColumns() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'queryFullColumns'), $args); }
  public static function queryFirstList() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'queryFirstList'), $args); }
  public static function queryOneList() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'queryOneList'), $args); }
  public static function queryFirstColumn() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'queryFirstColumn'), $args); }
  public static function queryOneColumn() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'queryOneColumn'), $args); }
  public static function queryFirstField() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'queryFirstField'), $args); }
  public static function queryOneField() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'queryOneField'), $args); }
  public static function queryRaw() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'queryRaw'), $args); }
  public static function queryRawUnbuf() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'queryRawUnbuf'), $args); }

  public static function insert() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'insert'), $args); }
  public static function insertIgnore() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'insertIgnore'), $args); }
  public static function insertUpdate() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'insertUpdate'), $args); }
  public static function replace() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'replace'), $args); }
  public static function update() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'update'), $args); }
  public static function delete() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'delete'), $args); }

  public static function insertId() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'insertId'), $args); }
  public static function count() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'count'), $args); }
  public static function affectedRows() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'affectedRows'), $args); }

  public static function useDB() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'useDB'), $args); }
  public static function startTransaction() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'startTransaction'), $args); }
  public static function commit() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'commit'), $args); }
  public static function rollback() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'rollback'), $args); }
  public static function tableList() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'tableList'), $args); }
  public static function columnList() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'columnList'), $args); }

  public static function sqlEval() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'sqlEval'), $args); }
  public static function nonSQLError() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'nonSQLError'), $args); }

  public static function serverVersion() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'serverVersion'), $args); }
  public static function transactionDepth() { $args = func_get_args(); return call_user_func_array(array(DB::getMDB(), 'transactionDepth'), $args); }


  public static function debugMode($handler = true) {
    DB::$success_handler = $handler;
  }

}



?>
