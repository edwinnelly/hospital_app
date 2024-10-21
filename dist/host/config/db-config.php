<?php 
	include_once 'cores.php';

	class dbc
	{
		
		private $host = host;
        private $user = user;
        private $password = password;
        private $database = database;

        /**   function to open database connection  **/
	    protected function open()
		{
			//$con = mysqli_connect($this->host, $this->user, $this->password, $this->database,$this->port);
			$con = mysqli_connect($this->host, $this->user, $this->password, $this->database);
			if (mysqli_connect_errno())
			{
			    return "System failed to connect to server";
			}else{
				return $con;
			}
		}

		/**   function to close database connection  **/
		public function close($con)
		{
			mysqli_close($con);
		}

		/**   function to query database  **/
		public function run_query($query)
		{
			$con = $this->open();
			$q = mysqli_query($con,$query);
			if ($q == true) {
				$res = $q;
			}else{
				$res = mysqli_error($con);
			}
			$this->close($con);
			return $res;
		}

		/**   function to get query result array  **/
		public function get_result($query)
		{
				$q = mysqli_fetch_array($query);
				return $q;
		}


		/**   function to get num_rows  **/
		public function get_number_of_row($query)
		{
				$q = mysqli_num_rows($query);
				return $q;
		}


		/**   function to treat GET values  **/
		public function get_request($txt)
		{
			$con = $this->open();
			$txt=mysqli_real_escape_string($con,htmlentities(trim($_GET[$txt])));
			$this->close($con);
			return $txt;
		}

		/**   function to treat POST values  **/
		public function post_request($txt)
		{
			$con = $this->open();
			$txt=mysqli_real_escape_string($con,htmlspecialchars(trim($_POST[$txt])));
			$this->close($con);
			return $txt;
		}

		public function clean_input($txt){
			$txt = htmlentities(htmlspecialchars($txt));
			return $txt;
		}
	}
 ?>