<?php

/**
*操作mysql的类
*@author zhouhonghui
*@email  623097864@qq.com
*@time   2014-3-21 15:00:00
**/
class MySql{
	
	public $link;
	public $isConnect;
	
	public $curSql;
	public $curErrMsg;
	
	public function MySql()
	{
		
	}
	public function connect_db($host,$userName,$passWord,$dbName,$port=3306)
	{
		$this->link=mysqli_connect($host,$userName,$passWord,$dbName,$port)or die("mysqli_connect was death,please check your config or your mysql server!");		
		$this->curErrMsg=mysqli_error($this->link);		
	}
	public function setCharet($char='utf8')
	{
		mysqli_query($this->link,"set names $char");
	}
	
	public function close_db()
	{
		mysqli_close($this->link);
	}
	//增
	/**
	* 插入一条或多条数据
	* @params $table
	* @params $field  字段
	* @params $values 要插入的对应值(插入多个值可以传入二维数组)
	**/
	public function insert($table,$field,$values)
	{
		$vals=$this->analysisValues($values);
		$sql="insert into $table ($field) values $vals";

		return $this->query($sql);
		
	}
	//删
	public function delete($table,$condition)
	{
		$cdt=$this->analysisCondition($condition);
		$sql="delete from $table where $cdt";
		return $this->query($sql);
	}
	
	//查
	/**
	* 返回第一条符合条件的查询结果集
	**/
	public function select_one($table,$field,$condition)
	{
		$ret=$this->select($table,$field,$condition);
		//解析结果集
		$ret=mysqli_fetch_array($ret,MYSQLI_ASSOC);
		return $ret;
	}
	/**
	* 返回所有符合条件的查询结果集
	**/
	public function select_all($table,$field,$condition)
	{
		$ret=$this->select($table,$field,$condition);
		//解析结果集
		$retArr=array();
		while($row=mysqli_fetch_array($ret,MYSQLI_ASSOC))
		{
			array_push($retArr,$row);
		}
		
		return $retArr;
	}
	//改	
	/**
	* 修改数据库
	* @params $table
	* @$fieldVo 字段名和值对应的数组
	* @$condition	
	**/
	public function update($table,$fieldVo,$condition)
	{
		$setStr='';
		if(is_string($fieldVo))
		{
			$setStr=$fieldVo;
		}else if(is_array($fieldVo))
		{
			$len=count($fieldVo);
			foreach($fieldVo as $k=>$v)
			{
				$len--;
				$setStr.="$k='$v'";
				$len>0?$setStr.=',':'';
			}
		}
		
		$cdt=$this->analysisCondition($condition);
		$sql="update $table set $setStr where $cdt";
		return $this->query($sql);
	}
	
	/**
	* 执行一条sql语句
	**/
	public function query($sql)
	{
		$this->curSql=$sql;		
		$ret=mysqli_query($this->link,$sql);
		$this->curErrMsg=mysqli_error($this->link);
		// printf("Errormessage: %s\n",mysqli_error($this->link));
		return $ret;
	}	
	private function select($table,$field,$condition)
	{		
		$sql="select $field from $table where ".$this->analysisCondition($condition);		
		$ret=$this->query($sql);
		
		return $ret;
	}
	
	private function analysisCondition($condition)
	{
		$rangeKey01="rangeCdt_01"; //array('field'=>'age','val'=>'100','mark'=>'>');
		$rangeKey02="rangeCdt_02"; //array('field'=>'age','from'=>'10','to'=>'100','markF'=>'>','markT'=>'<');
		
		$ret="";		
		if(is_string($condition))
		{
			$ret=$condition;
		}else if(is_array($condition))
		{
			$len=count($condition);
			$index=0;
			$tempArr=array();
			foreach($condition as $key=>$val)
			{
				$index++;
				if($key!=$rangeKey01 && $key!=$rangeKey02)
				{
					$ret.=' '.$key.'='."'$val'";					
				}else 
				{
					if($key==$rangeKey01)
					{
						$mark=isset($val['mark'])?$val['mark']:'>';
						$ret.=' '.$val['field']."$mark"."'{$val['val']}'";
					}else if($key==$rangeKey01)
					{
						$ret.=' '.$val['field'].(isset($val['markF'])?$val['markF']:'>')."'{$val['from']}' and ".$val['field'].(isset($val['markT'])?$val['markF']:'<')."'{$val['to']}'";
					}
				}
				$index<$len?$ret.=' and ':'';
				
			}
		}else
		{
			$ret='1';
		}
		$ret=='' || $ret==null?$ret='1':'';
		return $ret;
	}
	/**
	* 解析要插入的数据
	**/
	private function analysisValues($values)
	{
		$ret='';
		if(is_string($values))
		{
			$ret=$values;
		}else if(is_array($values))		
		{
			$isTwoArr=false;
			$rowNum=count($values);
			foreach($values as $key=>$rows)
			{
				if(!$isTwoArr && is_array($rows)) //判断是否是二维数组
				{
					$isTwoArr=true;
				}
				if(($isTwoArr && !is_array($rows)) || (!$isTwoArr && is_array($rows)))
				{
					throw new Exception('insert values pass error!');
					break;
				}else
				{
					if($isTwoArr)
					{
						$len=count($rows);
						$ret.="(";
						$rowNum--;
						foreach($rows as $k=>$v)
						{
							$len--;
							$ret.="'$v'";
							$len==0?$ret.=')':$ret.=',';
						}
						$rowNum>0?$ret.=',':'';
						
					}else
					{
						$ret==''?$ret="(":'';
						$rowNum--;
						$ret.="'$rows'";
						$rowNum==0?$ret.=')':$ret.=',';
					}
				}
			}
			
		}
		
		return $ret;
	}
	

}

?>
