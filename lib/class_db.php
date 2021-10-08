<?php
	Class DB{
		var $db=null;
		//koneksi ke database
		public function __construct(){
			$host = "localhost";
			$db = "db_spp_melisa";
			$user = "root";
			$pass = "defrindr";
			try{
				$this->db = new PDO("mysql:host=$host;dbname=$db" , $user ,$pass
					);
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::
					ERRMODE_EXCEPTION);
			}catch(PDOExpection $e){
				die ("Connection Failed! :" . $e->getmessage());
			}
		} 
		//insert data ke tabel. parameternya $t=nama_tabel dan $val=value(isi)
		//contoh : $db->insert("kelas","null,'XII RPL 1','RPL'");
		function insert($t,$val){
			$result = $this->db->prepare("insert into $t values($val)");
			$result->execute();
			// dd($result->execute());
			return $result;
		}
		//menampilkan data dari tabel. parameternya $t = nama_tabel, $f = field
		//kolom(tidak wajib)
		//contoh $db->select("tb_kelas"), $db->select("tb_kelas a, tb_siswa b where a.id_kelas=b.id_kelas", "a.*, b.*")
		function select($t,$f="*"){
			$result = $this->db->prepare("select $f from $t");
			// dd($result);
			$result->execute();
			return $result;
		}

		//menghapus data dari tabel. parameternya $t = nama_tabel dan filter data yang akan dihapus
		//contoh : $db->delete("tb_kelas where id_kelas=1")
		function delete($t){
			$result = $this->db->prepare("delete from $t");
			$result->execute();
			return $result;
		}

		//mengubah data dalam tabel. parameternya $t = nama_tabel, $f = field yang akan diubah isinya dilanjutkan dengan key/kunci
		//contoh : $db->update("jenis", "kode_jenis=='monitor',nama_jenis='monitor komputer', keterangan='suport HDMI' where id_jenis= 1")
		function update($t,$f){
			$result = $this->db->prepare("update $t set $f");
			// dd($result);
			$result->execute();
			return $result;
		}

		function query($q){
			try{
				$result = $this->db->prepare($q);
				$ret =$result->execute();
			}catch(PDOException $e){
				$ret = $e->getMessage();
			}

			return $ret;
		}

		function sanitPost(){
			return filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
		}

	}

	$db = new DB();
	include "fungsi.php";

	//15 menit
?>