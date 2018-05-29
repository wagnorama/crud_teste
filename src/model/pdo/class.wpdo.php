<?php
require_once "/../../config/config.php";
/**
 * classe PDO
 * 
 */

class wpdo extends PDO
{
    public $tail_ = '';
    public $sql_ = '';
    private $opt;
    private $charset = 'UTF8';



    
    public function __construct()
    {

        global $config;
        $this->opt = $config['Database'];
        $dsn = $this->conect($this->opt);
        $attr = empty($opt['charset']) ? array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . $this->charset) : array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . $this->opt['charset']);
        try {
            parent::__construct($dsn, $this->opt['username'], $this->opt['password'], $attr);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();

        }
    }


    private function conect($opt)
    {
        return $opt['dbtype'] . ':host=' . $opt['host'] . ';dbname=' . $opt['dbname'] . ';port=' . $opt['port'];
    }



    
    public function list_all($table, $getRes = false, $condition = array())
    {
        return $this->list_rows($table, $condition, $getRes);
    }


    
    public function list_rows($table, $condition, $getRes = false, $column = array())
    {
        $fields = $this->list_fields($column); 
        $cdts = $this->list_condition($condition);
        $where = empty($condition) ? '' : ' where ' . $cdts;
        $this->sql_ = 'select ' . $fields . ' from ' . $table . $where;
        try {
            $this->sql_ .= $this->tail_;
            $rs = parent::query($this->sql_);

        } catch (PDOException $e) {
            trigger_error("list_rows: ", E_USER_ERROR);
            //echo $e->getMessage() . "<br/>\n";

        }
        $rs = $getRes ? $rs : $rs->fetchAll(parent::FETCH_ASSOC);
        return $rs;
    }



    private function list_fields($data)
    {
        $fields = array();
        if (is_int(key($data))) {
            $fields = implode(',', $data);
        } else if (!empty($data)) {
            $fields = implode(',', array_keys($data));
        } else {
            $fields = '*';
        }
        return $fields;
    }


    private function list_condition($condition, $oper = '=', $logc = 'AND')
    {
        $cdts = '';
        if (empty($condition)) {
            return $cdts = '';
        } else if (is_array($condition)) {
            $_cdta = array();
            foreach ($condition as $k => $v) {
                if (!is_array($v)) {
                    if (strtolower($oper) == 'like') {
                        $v = '\'%' . $v . '%\'';
                    } else if (is_string($v)) {
                        $v = '\'' . $v . '\'';
                    }
                    $_cdta[] = ' ' . $k . ' ' . $oper . ' ' . $v . ' ';
                } else if (is_array($v)) {
                    $_cdta[] = $this->split_condition($k, $v);
                }
            }
            $cdts .= implode($logc, $_cdta);
        } else {
            $cdts = $condition;
        }
        return $cdts;
    }


    private function split_condition($field, $cdt)
    {
        $cdts = array();
        $oper = empty($cdt[1]) ? '=' : $cdt[1];
        $logc = empty($cdt[2]) ? 'AND' : $cdt[2];
        if (!is_array($cdt[0])) {
            $cdt[0] = is_string($cdt[0]) ? "'$cdt[0]'" : $cdt[0];
        } else if (is_array($cdt[0]) || strtoupper(trim($cdt[1])) == 'IN') {
            $cdt[0] = '(' . implode(',', $cdt[0]) . ')';
        }

        $cdta[] = " $field $oper {$cdt[0]} ";
        if (!empty($cdt[3])) {
            $cdta[] = $this->list_condition($cdt[3]);
        }
        $cdts = ' ( ' . implode($logc, $cdta) . ' ) ';
        return $cdts;
    }

    public function load($query)
    {
        try {

            $result = parent::prepare($query);

            $result->execute();

            if ($result != false) {
                return $result->fetch(PDO::FETCH_OBJ);
            } else {
                throw $e;
            }

        } catch (PDOException $e) {
            //Erro na conex?o do banco
            throw $e;
        }
    }

    public function load_all($query)
    {
        try {

            $result = parent::prepare($query);

            $result->execute();

            if ($result != false) {
                return $result->fetchAll(PDO::FETCH_ASSOC);
            } else {

                throw $e;
            }

        } catch (PDOException $e) {
            //Erro na conex?o do banco
            echo 'PDO  Error: ' . $e->getMessage();
            throw $e;
        }
    }



    public function delete($table, $condition)
    {
        $cdt = $this->list_condition($condition);
        $this->sql_ = 'delete from ' . $table . ' where ' . $cdt;
        return $this->run($this->sql_, __METHOD__);
    }



    public function run($sql_, $method = '')
    {
        try {
            $this->sql_ = $sql_ . $this->tail_;



            $efnum = parent::exec($this->sql_);

            $error = $this->errorInfo();

            if ($error[2] != NULL) {
                $json = json_encode(array('MSG' => $error[2]));

            }

        } catch (PDOException $e) {
            echo 'PDO ' . $method . ' Error: ' . $e->getMessage();

        }
        return intval($efnum);
    }


    
    public function _limit($start = 0, $length = 20)
    {
        $this->tail_ = ' limit ' . $start . ', ' . $length;
    }



    public function _save($table, $data, $condition)
    {
        $cdt = $this->list_condition($condition);
        list($strf, $strd) = $this->list_fields_datas($data);
        $has1 = $this->list_one($table, $condition);

        if (!$has1) {
            $enum = $this->insert($table, $data);
        } else {
            $enum = $this->update($table, $data, $condition);
        }
        return $enum;
    }



    private function list_fields_datas($data)
    {
        $arrf = $arrd = array();
        foreach ($data as $f => $d) {
            $arrf[] = '`' . $f . '`';
            $arrd[] = is_string($d) ? '\'' . $d . '\'' : $d;
        }
        $res = array(implode(',', $arrf), implode(',', $arrd));
        return $res;
    }


    public function list_one($table, $condition, $column = array())
    {
        $rs = $this->list_rows($table, $condition, true, $column);
        $rs = $rs ? $rs->fetch(parent::FETCH_ASSOC) : $rs;
        return $rs;
    }


    public function insert($table, $data)
    {
        list($strf, $strd) = $this->list_fields_datas($data);
        $this->sql_ = 'insert into `' . $table . '` (' . $strf . ') values (' . $strd . '); ';

        return $this->run($this->sql_, __METHOD__);
    }


    public function update($table, $data, $condition)
    {
        $cdt = $this->list_condition($condition);
        $arrd = array();
        foreach ($data as $f => $d) {
            $arrd[] = "`$f` = '$d'";
        }
        $strd = implode(',', $arrd);
        $this->sql_ = 'update ' . $table . ' set ' . $strd . ' where ' . $cdt;
        //$this->gravarLogPDO("$this->sql_ \n");
        return $this->run($this->sql_, __METHOD__);
    }

}

