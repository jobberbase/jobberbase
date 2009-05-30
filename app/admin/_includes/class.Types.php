<?php
	class Types{
		private $id;
		private $varName;
		private $cost;
		private $name;
		private $typeArray = array();
		
		public function __construct()
		{
			
		}
		
		public function getId()
		{
			return $this->id;
		}
		public function getName()
		{
			return $this->name;
		}
		public function getVarName()
		{
			return $this->varName;
		}
		
		
		public function setId($id)
		{
			$this->id = $id;
		}
		public function setVarName($varName)
		{
			$this->varName = $varName;
		}
		
		public function setName($name)
		{
			$this->name = $name;
		}
		
		public function getAllTypes()
		{
			global $db;
			$sql = "select * from types";
			$result = $db->query($sql);
			$i=0;
			while($row = $result->fetch_assoc())
			{
				$this->typeArray[$i] = new Types();
				$this->typeArray[$i]->id = $row['id'];
				$this->typeArray[$i]->varName = $row['var_name'];
				$this->typeArray[$i]->name = $row['name'];
				$i++;
			}
		}
		
		public function getTypesArray()
		{
			return $this->typeArray;
		}
		public function insertType()
		{
			global $db;
			$sql = "insert into types values(null, '".$this->name."', '".$this->varName."')";
			$db->query($sql);
			$this->id = $db->insert_id;
		}
		
		public function updateType()
		{
			global $db;
			$sql = "update types set var_name =  '".$this->varName."',
				name = '".$this->name."'
				where id=$this->id";
			$db->query($sql);
		}
		
		public function deleteType()
		{
			global $db;
			$sql = "delete from types
				where id=$this->id";
			$db->query($sql);
		}
		
		public function verifyAreJobs($typeId)
		{
			global $db;
			$sql = "select count(id) as nr from jobs 
				where type_id = $typeId group by 
				type_id";
			$result = $db->query($sql);
			
			if($row = $result->fetch_assoc())
			{
				return $row['nr'];
			}
			return false;
		}
	}
?>