<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\GuestModel;
use App\Models\KeluhanModel;
use App\Models\SaranModel;

class Saran extends BaseController
{

    public function __construct()
    {
        $this->guestModel = new GuestModel();
        $this->userModel = new AuthModel();
        $this->saranModel = new SaranModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        // get data keluhan
        $data_saran = $this->saranModel->findAll();
        $data = [
            'tittle' => 'Data Saran',
            'data_keluhan' => $data_saran
        ];
        return view('Saran/index', $data);
    }

    public function index_karyawan($kode_karyawan)
    {
        // get data keluhan
        $data_keluhan = $this->saranModel->where('created', $kode_karyawan)->findAll();
        $data = [
            'tittle' => 'Data Keluhan',
            'data_keluhan' => $data_keluhan
        ];

        return view('Saran/index', $data);
    }

    public function create()
    {
        //generet kode keluhan random 3 digit pertama
        $angka_kode1 = range(0, 9);
        shuffle($angka_kode1);
        $ambilKode1 = array_rand($angka_kode1, 3);
        $generetKode1 = implode('', $ambilKode1);
        // generate users dept random 3 digit kedua
        $angka_kode2 = range(0, 9);
        shuffle($angka_kode2);
        $ambilKode2 = array_rand($angka_kode2, 3);
        $generetKode2 = implode('', $ambilKode2);
        // generate users dept random 3 digit ketiga
        $angka_kode3 = range(0, 9);
        shuffle($angka_kode3);
        $ambilKode3 = array_rand($angka_kode3, 3);
        $generetKode3 = implode('', $ambilKode3);
        // kode users yang sudah di random
        $id_keluhan = 'ID-' . $generetKode1 . $generetKode2 . "-" . $generetKode3;



        $data = [
            'tittle' => 'Buat Saran',
            'id_keluhan' => $id_keluhan,
            'validation' => \Config\Services::validation(),
        ];
        return view('Saran/create', $data);
    }

    public function approve($id_keluhan)
    {
        // get ID database data keluhan
        $id = $data_saran = $this->saranModel->where('kode_saran', $id_keluhan)->first();

        // get tanggal 
        $tanggal = date('d-m-Y');

        // update status keluhan pada table keluhan
        $this->saranModel->save([
            'id' => $id['id'],
            'status' => 'Approved',
            'tanggal_update' => $tanggal
        ]);

        return redirect()->to(base_url('/admin/data-saran'));
    }

    public function delete_saran($id_keluhan)
    {
        // get id keluhan
        $id = $this->saranModel->where('kode_saran', $id_keluhan)->first();
        // get data foto
        $foto = $id['foto'];
        // unlink foto
        unlink('data/foto saran/' . $foto);

        // hapus keluhan
        $this->saranModel->delete($id['id']);
        session()->setFlashdata('pesan', 'Data Saran Berhasil di Hapus!');
        return redirect()->to(base_url('/admin/data-saran'))->withInput();
    }

    public function proses_input()
    {
        // validasi form input users
        if (!$this->validate([
            'id_keluhan' => [
                'rules' => 'required|is_unique[keluhan.kode_keluhan]',
                'errors' => [
                    'is-unique' => 'ID Keluhan sudah terdaftar!'
                ]
            ],
            'subject_keluhan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Subject Keluhan tidak boleh kosong!'
                ]
            ],
            'detail_keluhan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Detail Keluhan tidak boleh kosong!'
                ]
            ]

        ])) {
            return redirect()->to(base_url('/admin/buat-saran'))->withInput();
        } else {
            // ambil files
            $files = $this->request->getFiles();

            // create name foto
            $name_foto = '';
            // cek apakah ada foto yang diupload
            if ($files) {
                foreach ($files['foto_keluhan'] as $data) {
                    $name_foto = $data->getRandomName();

                    // move file foto yang sudah di upload
                    $data->move('data/foto saran/', $name_foto);
                }
            }

            // get tanggal 
            $tanggal = date('d-m-Y');
            // insert data keluhan kedalam table keluhan
            $this->saranModel->save([
                'kode_saran' => $this->request->getVar('id_keluhan'),
                'tanggal_create' => $tanggal,
                'tanggal_update' => 'Not Updated!',
                'subject' => $this->request->getVar('subject_keluhan'),
                'detail_saran' => $this->request->getVar('detail_keluhan'),
                'created' => session('kode_guest'),
                'progres' => '0',
                'status' => 'Pengajuan',
                'foto' => $name_foto
            ]);


            session()->setFlashdata('pesan', 'Input Saran Berhasil!');
            return redirect()->to(base_url('/admin/buat-saran'));
        }
    }


    public function proses_input2()
    {
        // validasi form input users
        if (!$this->validate([
            'id_keluhan' => [
                'rules' => 'required|is_unique[keluhan.kode_keluhan]',
                'errors' => [
                    'is-unique' => 'ID Keluhan sudah terdaftar!'
                ]
            ],
            'subject_keluhan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Subject Keluhan tidak boleh kosong!'
                ]
            ],
            'detail_keluhan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Detail Keluhan tidak boleh kosong!'
                ]
            ]

        ])) {
            return redirect()->to(base_url('/admin/buat-saran'))->withInput();
        } else {
            // ambil files
            $files = $this->request->getFiles();

            // create name foto
            $name_foto = '';
            // cek apakah ada foto yang diupload
            if ($files) {
                foreach ($files['foto_keluhan'] as $data) {
                    $name_foto = $data->getRandomName();

                    // move file foto yang sudah di upload
                    $data->move('data/foto saran/', $name_foto);
                }
            }

            // get tanggal 
            $tanggal = date('d-m-Y');
            // insert data keluhan kedalam table keluhan
            $this->saranModel->save([
                'kode_saran' => $this->request->getVar('id_keluhan'),
                'tanggal_create' => $tanggal,
                'tanggal_update' => 'Not Updated!',
                'subject' => $this->request->getVar('subject_keluhan'),
                'detail_saran' => $this->request->getVar('detail_keluhan'),
                'created' => session('kode_guest'),
                'progres' => '0',
                'status' => 'Pengajuan',
                'foto' => $name_foto
            ]);


            session()->setFlashdata('pesan', 'Input Saran Berhasil!');
            return redirect()->to(base_url('/views/buat-saran'));
        }
    }


    public function detail_saran($id_keluhan)
    {
        // get data keluhan
        $data_keluhan = $this->saranModel->where('kode_saran', $id_keluhan)->first();
        // get kode user
        $kode_user = $data_keluhan['created'];

        // get nama pembuat keluhan
        $nama = $this->guestModel->where('kode_guest', $kode_user)->first();
        $data = [
            'tittle' => 'Detail Saran',
            'data_keluhan' => $data_keluhan,
            'nama' => $nama
        ];
        return view('Saran/detail', $data);
    }


    public function update_progres($id_keluhan)
    {
        // ambil ID keluhan
        $id = $this->saranModel->where('kode_saran', $id_keluhan)->first();

        // set variable status
        $status = 'Sedang Proses';
        // cek jika progers sama dengan 100
        if ($this->request->getVar('progres') == '100') {
            // set status selesai
            $status = 'Selesai';
        }

        // update progres dan setatus keluhan
        $this->saranModel->save([
            'id' => $id['id'],
            'tanggal_update' => date('d-m-Y'),
            'progres' => $this->request->getVar('progres'),
            'status' => $status
        ]);

        session()->setFlashdata('pesan', 'Progres Berhasil di Update!');
        return redirect()->to(base_url('/admin/detail-saran/' . $id_keluhan))->withInput();
    }

    public function update_foto($id_keluhan)
    {
        // ambil ID keluhan
        $id = $this->keluhanModel->where('kode_keluhan', $id_keluhan)->first();

        // ambil files
        $files = $this->request->getFiles();

        // create name foto
        $name_foto = '';
        // cek apakah ada foto yang diupload
        if ($files) {
            foreach ($files['foto_keluhan'] as $data) {
                $name_foto = $data->getRandomName();

                // move file foto yang sudah di upload
                $data->move('data/foto keluhan/', $name_foto);
            }
        }

        // update progres dan setatus keluhan
        $this->keluhanModel->save([
            'id' => $id['id'],
            'foto' => $name_foto
        ]);

        session()->setFlashdata('pesan', 'Foto Berhasil di Update!');
        return redirect()->to(base_url('/admin/detail-keluhan/' . $id_keluhan))->withInput();
    }


    public function proses_update($kode_user)
    {
        // decript kode user
        $kodeUser = base64_decode($kode_user);

        // validasi form update
        if (!$this->validate([
            'kode_user' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode User Harus Di Lengkapi!',
                    'is_unique' => 'Kode User Sudah Terdaftar!'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama User Harus Di Lengkapi!'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Nama User Harus Di Lengkapi!',
                    'valid_email' => 'Email yang anda masukan tidak valid!'
                ]
            ],
            'phone' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Phone User Harus Di Lengkapi!'
                ]
            ],
            'departemen' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan Pilih Departemen!'
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level User Harus Di Lengkapi!'
                ]
            ],
        ])) {
            return redirect()->to(base_url('/admin/update-user/' . $kode_user))->withInput();
        } else {
            // get id guest
            $id = $this->guestModel->where('kode_guest', $kodeUser)->first();
            // get id user
            $id_user = $this->userModel->where('id_users', $kodeUser)->first();

            // update table guest
            $this->guestModel->save([
                'id' => $id['id'],
                'kode_guest' => $this->request->getVar('kode_user'),
                'nama_lengkap' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'phone' => $this->request->getVar('phone'),
                'departemen' => $this->request->getVar('departemen')
            ]);

            // get level
            $level = $this->request->getVar('level');


            // update table user
            $this->userModel->save([
                'id' => $id_user['id'],
                'username' => $this->request->getVar('email'),
                'level' => $level
            ]);

            session()->setFlashdata('pesan', 'Data User Berhasil di Update!');
            return redirect()->to(base_url('/admin/users'))->withInput();
        }
    }

    public function hapus($kode_user)
    {
        // decript kode user
        $kodeUser = base64_decode($kode_user);

        // get data guest by kode user
        $data_guest = $this->guestModel->where('kode_guest', $kodeUser)->first();
        // get data user auth by kode user
        $data_user = $this->userModel->where('id_users', $kodeUser)->first();

        // get id guest
        $id_guest = $data_guest['id'];
        // delete data guest
        $this->guestModel->delete($id_guest);

        // get id user
        $id_user = $data_user['id'];
        // delete data user
        $this->userModel->delete($id_user);

        // session flash data
        session()->setFlashdata('pesan', 'Data User Berhasil di Hapus!');
        return redirect()->to(base_url('/admin/users'))->withInput();
    }
}
