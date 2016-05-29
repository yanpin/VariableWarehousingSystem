<?php
	//	作者:Yan Pin 	
	//	歸屬:資料模組 
	// 	功能敘述:新增 修改 刪除查詢
	// 
	session_start();
	class InventorySystem{

		protected $PDO;
		public $dsn 	= 'mysql:host=localhost;dbname=instock_db'; 
		public $user 	= 'admin'; 
		public $pass 	= '1234';  			
        
		public $UserTableArray = Array(
			"id",
			"username",
			"userpassword",
			
			"type",
			"name",
			"email",
			
			"phone",
			"nfctoken"
		);

		public $InstockTableArray = Array(
			"id",
			"name",
			"uid",

			"onlyid",
			"property",
			"status",

			"type",
			"total",
			"position",
			
			"qrcode",
			"rfidcode",
			"remark"	
		);

		public $StockinfoTableArray = Array(
			"id",
			"user_nfctoken",
			"instock_onlyid",

			"input_date",
			"output_date",
			"total",

			"remark"
		);

		public function __construct() {

			$this -> PDO = new PDO($this->dsn, $this->user, $this->pass);
			$this -> PDO ->exec('SET CHARACTER SET utf8');
        }

		//判斷狀態的函數
    	public function StateJudgment(Array $ArrayGetPathData ,Array $ArrayTableData){
    		if($ArrayGetPathData['FunctionName'] != "Login"){
	        	if($ArrayGetPathData['TableName'] != NULL){
		        	$TableArray = array();
		        	$SQLFieldData = "";

		        	if($ArrayGetPathData['TableName'] == 'user'){
		        		$TableArray = $this-> UserTableArray;
		        	}elseif ($ArrayGetPathData['TableName'] == 'instock') {

		        		$TableArray = $this-> InstockTableArray;
		        		
		        	}elseif ($ArrayGetPathData['TableName'] == 'stockinfo_table') {
		        		$TableArray = $this-> StockinfoTableArray;
		        	}
		        	
					for($i=0; $i<=(count($TableArray)-1); $i++){
		        		if($i==0){
		        			$SQLFieldData = "`".$TableArray[$i]."`";
		        		}elseif ($i!=0) {
		        			$SQLFieldData = $SQLFieldData . ", `" . $TableArray[$i]."`";
		        		}
		        		
		        	}
		        	$SQLFieldData;
	        	}
        	}
	        
    		if($ArrayGetPathData['FunctionName'] == "Login"){		
    			$this -> Login($ArrayTableData);
    		}elseif ($ArrayGetPathData['FunctionName'] == "AddedData") {
    			$this -> AddedData($ArrayGetPathData, $ArrayTableData, $SQLFieldData);
    		}elseif ($ArrayGetPathData['FunctionName'] == "ModifyData") {
    			$this -> ModifyData($ArrayGetPathData, $ArrayTableData);
    		}elseif ($ArrayGetPathData['FunctionName'] == "DeleteData") {
    			$this -> DeleteData($ArrayGetPathData, $ArrayTableData);
    		}elseif ($ArrayGetPathData['FunctionName'] == "ShowData") {
    			$this -> ShowData($ArrayGetPathData, $ArrayTableData, $SQLFieldData);
    		}elseif ($ArrayGetPathData['FunctionName'] == "RentalLend") {
    			$this -> RentalLend($ArrayGetPathData, $ArrayTableData, $SQLFieldData);
    		}
    	}
    	//注意目前登入SQL語法是寫死的狀況
    	function Login(Array $ArrayTableData){  
    		$ArrayOutput = Array();
  
   			$sql= "SELECT * FROM `user_table` WHERE 
   				`username` = '$ArrayTableData[username]' and 
   				`userpassword` = '$ArrayTableData[userpassword]'";

		    $result = $this->PDO->query($sql); 
		    $row=$result->fetch(PDO::FETCH_OBJ);     
		   	
		    if(@$row->id != NULL){	
		   		$ArrayOutput['status'] = 'OK';
		 		$ArrayOutput['Key'] = crc32($row->username);

		   		$ArrayOutput['id'] = $_SESSION["ID"] = $row->id;
		   		$ArrayOutput['username'] = $_SESSION["Name"] = $row->username;
		   		$ArrayOutput['userpassword'] = $_SESSION["Password"] = $row->userpassword;

		   		$ArrayOutput['type'] = $row->type;
		   		$ArrayOutput['name'] = $row->name;
		   		$ArrayOutput['email'] = $row->email;

		   		$ArrayOutput['phone'] = $row->phone;
		   		$ArrayOutput['nfctoken'] = $row->nfctoken;
		   		
		    }else{
		    	$ArrayOutput['status'] = 'ERROR';
		   	}

		    $this->JsonPackage($ArrayOutput);
    	}
    	//新增函數
    	function AddedData(Array $ArrayGetPathData, Array $ArrayTableData, $SQLFieldData){	
    		$ArrayOutput = Array();
		    $TableName = $ArrayGetPathData['TableName'];
		    
		    if($ArrayGetPathData['TableName'] == 'stockinfo_table'){
			    if($ArrayTableData['input_date'] == NULL){
			    	$ArrayTableData['input_date'] = Date("Y/m/d");
			    }
			}
		    

  			$ArrayKey = array_keys($ArrayTableData);
		    for($i=0; $i<=(count($ArrayTableData)-1); $i++){
	    		if($i==0){
	    			if($ArrayTableData[$ArrayKey[$i]] != NULL){
	    				$TableData = "'".$ArrayTableData[$ArrayKey[$i]]."'";
	    			}else{
	    				$TableData = "'NULL'";
	    			}	
	    		}elseif ($i!=0) {
	    			$TableData = $TableData . ",'" . $ArrayTableData[$ArrayKey[$i]]."'";
	    		}
	    	}
		   	
		   	$sql = 
   			"INSERT INTO `$TableName` 
			($SQLFieldData) 
			VALUES 
			($TableData)";	
			
			if($result=$this->PDO->exec($sql)){
				$ArrayOutput = Array("status" => 'OK');
			}else{
				$ArrayOutput = Array("status" => 'ERROR');
			}
			$this->JsonPackage($ArrayOutput);
    	}
    	//修改函數
    	function ModifyData(Array $ArrayGetPathData, Array $ArrayTableData){
    		$ArrayOutput = Array();
    	
    		$TableData = "";
  			$DataId="";
  			$ArrayKey = array_keys($ArrayTableData);
		    for($i=0; $i<=(count($ArrayTableData)-1); $i++){
	    		if($i==0){

	    			if($ArrayTableData[$ArrayKey[$i]] != NULL){
	    				$DataId = "`". $ArrayKey[$i] . "`". " = '".$ArrayTableData[$ArrayKey[$i]]."'";
	    			}else{
	    				$DataId = "'NULL'";
	    			}	
	    		}elseif ($i!=0) {
	    			if($i==1){
	 				$TableData = $TableData .   "`". $ArrayKey[$i] . "`". " = "  . "'" . $ArrayTableData[$ArrayKey[$i]]."'";
	    			}else{
	    				$TableData = $TableData .   ",`". $ArrayKey[$i] . "`". " = "  . "'" . $ArrayTableData[$ArrayKey[$i]]."'";
	    			}
	    		}
	    	}
	    	
		   	$sql = 
   			"UPDATE `$ArrayGetPathData[TableName]` SET 
				$TableData
			WHERE `$ArrayGetPathData[TableName]`.$DataId";
			
			if($result=$this->PDO->exec($sql)){
				$ArrayOutput = Array("status" => 'OK');
				
			}else{
				$ArrayOutput = Array("status" => 'ERROR');
			}
			$this->JsonPackage($ArrayOutput);
    	}
    	//刪除函數
    	function DeleteData(Array $ArrayGetPathData, Array $ArrayTableData){
    		$ArrayOutput = Array();
    	
    		$sql = 
   			"DELETE FROM `$ArrayGetPathData[TableName]` WHERE `$ArrayGetPathData[TableName]`.`id` = '$ArrayTableData[id]'";
			
			if($result=$this->PDO->exec($sql)){
				$ArrayOutput = Array("status" => 'OK');
				
			}else{
				$ArrayOutput = Array("status" => 'ERROR');
			}
			$this->JsonPackage($ArrayOutput);
    	}
    	//刪除函數
    	function ShowData(Array $ArrayGetPathData, Array $ArrayTableData, $SQLFieldData){
    		$ArrayOutput = Array();

		    $ArrayTableData = array_filter($ArrayTableData);
		    $TableData = "";

		    $ArrayKey = array_keys($ArrayTableData);
		    for($i=0; $i<=(count($ArrayTableData)-1); $i++){
	    		if($i==0){
	    			$TableData = "`". $ArrayKey[$i] . "`". " = '".$ArrayTableData[$ArrayKey[$i]]."'";			
	    		}elseif ($i!=0) {
	    			
	 				$TableData = $TableData .   " and `". $ArrayKey[$i] . "`". " = "  . "'" . $ArrayTableData[$ArrayKey[$i]]."'";
	    			
	    		}
	    	}
	    	if($ArrayTableData != NULL){
		    	$sql = "SELECT * FROM `$ArrayGetPathData[TableName]` WHERE $TableData";
	    	}else{
	    		$sql = "SELECT * FROM `$ArrayGetPathData[TableName]`";
	    	}
		   	$sql=$this->PDO->query($sql);  
		    $i=0;
		    while($result = $sql->fetch(PDO::FETCH_ASSOC)){    
		        //PDO::FETCH_OBJ 指定取出資料的型態
					$ArrayOutput[$i] = $result;
				$i++;		        
		    }
			
			$this->JsonPackage($ArrayOutput);
    	}
    	function RentalLend(Array $ArrayGetPathData, Array $ArrayTableData, $SQLFieldData){
    		$ArrayOutput = Array();
    	
		    $user_nfctoken = $ArrayTableData['user_nfctoken'];
		    $instock_onlyid = $ArrayTableData['instock_onlyid'];		    

		    $output_date = date("Y/m/d");
		   	$sql = "
		    UPDATE `stockinfo_table` SET 
		    	`output_date` = '$output_date'
		    WHERE 	
		    		`user_nfctoken` 	= '$user_nfctoken'  And
		    		`instock_onlyid` 	= '$instock_onlyid' And
		    		`output_date` = '';
		    ";	
		    $sql;
			if($result=$this->PDO->exec($sql)){
				$ArrayOutput = Array("status" => 'OK');
				
			}else{
				$ArrayOutput = Array("status" => 'ERROR');
			}
			$this->JsonPackage($ArrayOutput); 		
    	}
    	function SearchData(){


    	}
    	function JsonPackage(Array $ArrayInput){
    		echo json_encode($ArrayInput);
    	}
	}
	
	if(@$_GET['FunctionName'] != NULL and @$_GET['TableName'] != NULL){
		$ArrayGetPathData = array(
			'FunctionName' 		=> @$_GET['FunctionName'], 
			'TableName' 		=> @$_GET['TableName']
		); 

		if($ArrayGetPathData['TableName'] == "Login"){
			$ArrayTableData = Array(
				"username" 		=> 	@$_GET["username"],
				"userpassword" 	=> 	@$_GET["userpassword"]
			);
		}elseif ($ArrayGetPathData['TableName'] == "user_table") {
			$ArrayTableData = Array(
				"id" 			=> 	@$_GET["id"],
				"username" 		=> 	@$_GET["username"],
				"userpassword" 	=> 	@$_GET["userpassword"],
				
				"type" 			=> 	@$_GET["type"],
				"name" 			=> 	@$_GET["name"],
				"email" 		=> 	@$_GET["email"],
				
				"phone" 		=> 	@$_GET["phone"],
				"nfctoken" 		=> 	@$_GET["nfctoken"]	
			);
		}elseif ($ArrayGetPathData['TableName'] == "instock_table") {
			$ArrayTableData = Array(
				"id" 			=> 	@$_GET["id"],
				"name" 			=> 	@$_GET["name"],
				"uid" 			=> 	@$_GET["uid"],

				"onlyid" 		=> 	@$_GET["onlyid"],
				"property" 		=> 	@$_GET["property"],
				"status" 		=> 	@$_GET["status"],
				
				"type" 			=> 	@$_GET["type"],
				"total" 		=> 	@$_GET["total"],
				"position" 		=> 	@$_GET["position"],

				"qrcode" 		=> 	@$_GET["qrcode"],
				"rfidcode" 		=> 	@$_GET["rfidcode"],
				"remark" 		=> 	@$_GET["remark"]
			);
		}elseif ($ArrayGetPathData['TableName'] == "stockinfo_table") {
			$ArrayTableData = Array(
				"id" => 			@$_GET["id"],

				"user_nfctoken" => 	@$_GET["user_nfctoken"],
				"instock_onlyid"=>	@$_GET["instock_onlyid"],
				"input_date" 	=> 	@$_GET["input_date"],
				
				"output_date" 	=> 	@$_GET["output_date"],
				"total" 		=>	@$_GET["total"],
				"remark" 		=> 	@$_GET["remark"]
			);
		}

		// if(@$_GET["SearchType"]!=NULL){
		// 	$ArraySearch = Array(
		// 		'SearchType'		=>	@$_GET["SearchType"],
		// 		'' 					=>	@$_GET[""],
		// 		'' 					=>	@$_GET[""],
		// 		'' 					=>	@$_GET[""],
		// 		'' 					=>	@$_GET[""]
		// 	);
		// }

		$InventorySystem = new InventorySystem;
		$InventorySystem -> StateJudgment($ArrayGetPathData, $ArrayTableData);
	}else{
		echo "API is NULL.";
	}
?>
