<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcometiku extends CI_Controller {

	public function index()
	{
		//ambil data
		$data = $this->moviemodel->Get('movie');
		$data = array('data' => $data);

		//menampilkan ke view home
		$this->load->view('home',$data);
	}

	public function about_us()
	{
		$this->load->view('about_us');
	}

	public function booking()
	{
		//terima data id movie dari home
		$id_movie = $_POST['id_movie'];

		//ambil data film berdasarkan id yang dikirim dari home
		$data['movie'] = $this->moviemodel->GetWhere('movie', array('id_movie' => $id_movie));

		//ambil judul film
		$title = $data['movie'][0]['title'];

		//set session dengan data id dan title
		$this->session->set_userdata('id_movie',$id_movie); 
		$this->session->set_userdata('title',$title); 

		//ambil data sesuai schedule
		$data['schedule'] = $this->moviemodel->Get('schedule');

		//menyimpan semua data ke dalam variabel bertipe array lalu mengirimnya ke booking page
		$data = array('data' => $data);
		$this->load->view('booking', $data);
	}

	public function booking_seat(){
		//terima tanggal nama nik dan usia yang dikirim dari booking page
		$watch_date = $_POST['watch_date'];
		$name = $_POST['name'];
		$nik = $_POST['nik'];
		$age = $_POST['age'];

		//terima schedule dari booking page
		$id_schedule = $_POST['schedule'];

		//set session date dan schedule
		$this->session->set_userdata('watch_date', $watch_date);
		$this->session->set_userdata('name', $name);
		$this->session->set_userdata('nik', $nik);
		$this->session->set_userdata('age', $age);
		$this->session->set_userdata('id_schedule', $id_schedule);

		//ambil data jadwal berdasarkan id nya dari booking page
		$data['schedule'] = $this->moviemodel->GetWhere('schedule', array('id_schedule' => $id_schedule));

		//set sessione dengan data schedule
		$schedule = $data['schedule'][0]['schedule'];
		$this->session->set_userdata('schedule', $schedule);

		//ambil semua data seat
		$data['seat'] = $this->moviemodel->Get('seat');

		//masukkan ke var id movie dengan session data id movie
		$this->session->set_userdata('id_movie');

		$query_seat_booked = $this->db->query('SELECT numb_seat FROM transaction WHERE id_schedule = "'.$id_schedule.'" AND watch_date = "'.$watch_date.'"');

		$data['seat_booked'] = $query_seat_booked->result_array();

		$data = array('data' => $data);
		$this->load->view('booking_seat', $data);
	}


	public function transaction()
	{
		if (!empty($_POST['choose_seat'])) {
			$seat = $_POST['choose_seat'];
			$this->session->set_userdata('seat', $seat);
			$data['seat'] = $seat;
		}
		else{
			$data['seat'] = [];
		}

		$data = array('data' => $data);
		$this->load->view('transaction', $data);
	}

	public function delete_seat($no){
		//memasukkan data session seat ke var seatlist
		$seatlist = $this->session->userdata('seat');

		//hapus salah satu index dari array dengan spesifik menggunakan variabel pendannda no
		unset($seatlist[$no]);

		//masukkan data kursi ke array
		$data['seat'] = array_values($seatlist);

		//mengurutkan index
		$seat = $data['seat'];

		//set session dengan data seat
		$this->session->set_userdata('seat', $seat);

		//nyimpen semua data ke array lalu menampilkan ke halaman yang sama
		$data = array('data' => $data);
		$this->load->view('transaction', $data);
	}

	public function edit()
	{
		//masukan session seat ke var seatlist, lalu data seatlist ditampung ke array kemudian dimasukkan ke var seat
		$seatlist = $this->session->userdata('seat');
		$seat = array_values($seatlist);

		//masukkan tiap session ke var nya
		$id_movie = $this->session->userdata('id_movie');
		$id_schedule = $this->session->userdata('id_schedule');
		$watch_date = $this->session->userdata('watch_date');
		$name = $this->session->userdata('name');
		$nik = $this->session->userdata('nik');
		$age = $this->session->userdata('age');



		//ambil semua data movie berdasarkan id movie yg ada di sesion
		$data['movie'] = $this->moviemodel->GetWhere('movie', array('id_movie' => $id_movie));

		//ambil semua data seat
		$data['seat'] = $this->moviemodel->Get('seat');

		//ambil data seat yang telah dibooking sebelumnya
		$data['seat_checked'] = $seat;

		//ambil data seat yang telah diboking dan memasukkan ke array
		$query_seat_booked = $this->db->query('SELECT numb_seat FROM transaction WHERE id_movie = "'.$id_movie.'" AND id_schedule = "'.$id_schedule.'" AND watch_date = "'.$watch_date.'"');
		$data['seat_booked'] = $query_seat_booked->result_array();

		//simpan semua data ke array lalu menampilkannya ke edit page
		$data = array('data' => $data);
		$this->load->view('edit_seat', $data);

	}

	public function edit_identity()
	{
		$name = $this->session->userdata('name');
		$nik = $this->session->userdata('nik');
		$age = $this->session->userdata('age');
		
		$name = $_POST['name'];
		$nik = $_POST['nik'];
		$age = $_POST['age'];

		$this->session->set_userdata('name', $name);
		$this->session->set_userdata('nik', $nik);
		$this->session->set_userdata('age', $age);

		$data = array('data' => $data);
		$this->load->view('transaction', $data);
	}

	public function pay()
	{
		//memasukkan data session seat ke var seatlist
		$seatlist = $this->session->userdata('seat');
		$data['seat'] = array_values($seatlist);

		//hitung isi data kursi
		$count_seat = count($data['seat']);
		$j = 0;

		//insert data seat ke database berdasar jumlahnya
		foreach ($data['seat'] as $s) {
			$insert_data = array(
				'id_movie' => $this->session->userdata('id_movie'),
				'id_schedule' => $this->session->userdata('id_schedule'),
				'numb_seat' => $s,
				'watch_date' => $this->session->userdata('watch_date')
			);
			$this->moviemodel->Insert('transaction', $insert_data);

			$identities = array(
				'name' => $this->session->userdata('name'),
				'nik' => $this->session->userdata('nik'),
				'age' => $this->session->userdata('age')
			);
			$this->moviemodel->Insert('identity', $identities);

		}
		//simpan semua data ke array lalu menampilkannya ke ticket page
		$data = array('data' => $data);
		$this->load->view('ticket', $data);
	}

}
?>
