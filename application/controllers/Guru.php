<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != "guru") {
            redirect('auth', 'refresh');
        }
        $this->load->model('Course_model');
        $this->load->model('M_Quiz');
    }

    public function index()
    {
        $data = array(
            'title'         => "Dashboard",
            'menu'          => "Dashboard",
            'courseList'    => $this->Course_model->getCourseGuru_limit(),
            'countCourse'   => $this->Course_model->countCourseGuru(),
            'countSiswa'    => $this->Course_model->countSiswa(),
            'countTeacherLesson'=>$this->Course_model->countTeacherLesson(),
            'countTeacherQuiz'=>$this->Course_model->countTeacherQuiz()
        );
        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/dashboard');
        $this->load->view('guru/template/footer');
    }
    public function kelas()
    {
        $data = array(
            'title'         => "Kelas",
            'menu'          => "Kelas",
            'courseList'    => $this->Course_model->getCourseGuru()
        );
        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/course/kelas');
        $this->load->view('guru/template/footer');
    }
    public function buatkelas()
    {
        $data = array(
            'title'         => "Buat Kelas",
            'menu'          => "Kelas",
        );
        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/course/buat_kelas');
        $this->load->view('guru/template/footer');
    }
    public function addkelas()
    {
        $config['upload_path']          = './media/logo';
        $config['allowed_types']        = 'jpg|png|jpeg';
        ;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('CourseLogo')) {
            echo $this->upload->display_errors();
            redirect('guru/buatkelas', 'refresh');
        } else {
            $data = array(
                'CourseName'    => $this->input->post('CourseName'),
                'ClassName'     => $this->input->post('ClassName'),
                'SchoolName'    => $this->input->post('SchoolName'),
                'TeacherID'    => $this->session->userdata('id_user'),
                'CourseLogo' => $this->upload->data('file_name'),
            );
            $this->db->insert('course', $data);
            $courseID = $this->db->insert_id();

            $log = [
                'CourseID' => $courseID,
                'UserID' => $this->session->userdata('id_user'),
                'Log' =>'membuat Kelas ' . $this->input->post('ClassName') . ' - ' . $this->input->post('CourseName'),
            ];
            $this->db->insert('log', $log);
        }
        redirect('guru', 'refresh');
    }

    public function editkelas($CourseID)
    {
        $config['upload_path']          = './media/logo';
        $config['allowed_types']        = 'jpg|png|jpeg';
        ;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('CourseLogo')) {
            $data = array(
                'CourseName'    => $this->input->post('CourseName'),
                'ClassName'     => $this->input->post('ClassName'),
                'SchoolName'    => $this->input->post('SchoolName'),
                'TeacherID'    => $this->session->userdata('id_user'),
            );
            $this->Course_model->updateKelas($CourseID, $data);
        } else {
            $data = array(
                'CourseName'    => $this->input->post('CourseName'),
                'ClassName'     => $this->input->post('ClassName'),
                'SchoolName'    => $this->input->post('SchoolName'),
                'TeacherID'    => $this->session->userdata('id_user'),
                'CourseLogo' => $this->upload->data('file_name'),
            );
            $old_logo = $this->Course_model->getOldLogo($CourseID);
            $this->Course_model->updateKelas($CourseID, $data);
            unlink('./media/logo/' . $old_logo); // This is an absolute path to the file
        }
        redirect('guru/pengaturan/' . $CourseID, 'refresh');
    }
    public function hapuskelas($CourseID)
    {
        $old_logo = $this->Course_model->getOldLogo($CourseID);
        unlink('./media/logo/' . $old_logo); // This is an absolute path to the file
        $this->Course_model->deleteCourse($CourseID);

        redirect('guru/kelas', 'refresh');
    }
    public function kick($CourseID, $UserID)
    {
        $this->Course_model->kick($CourseID, $UserID);

        redirect('guru/siswa/' . $CourseID, 'refresh');
    }
    public function course($CourseID)
    {
        $data = array(
            'title'     => $this->Course_model->courseByGuru($CourseID)->CourseName . " - " . $this->Course_model->courseByGuru($CourseID)->ClassName,
            'menu'      => 'Kelas',
            'course_menu' => "Kelas",
            // 'competencies' => $this->Course_model->getCompetenciesByID($CourseID),
            'course'    => $this->Course_model->courseByGuru($CourseID),
            'countKD' => $this->Course_model->countCompetencies($CourseID),
            'CourseID'=>$CourseID,
            // 'lesson' => $this->Course_model->getAllCourse()
        );

        $data['competencies'] =  $this->Course_model->getCompetenciesByIDwithArray($CourseID);
        foreach ($data['competencies'] as $row) {
            $lesson_result = $this->Course_model->getLessonByCompetenciesID($row['CompetenciesID']);
            if ($lesson_result) {
                $data['lesson'][$row['CompetenciesID']] = $lesson_result;
            }
        }
        foreach ($data['competencies'] as $row) {
            $quiz_result = $this->Course_model->getQuizByCompetenciesID($row['CompetenciesID']);
            if ($quiz_result) {
                $data['quiz'][$row['CompetenciesID']] = $quiz_result;
            }
        }


        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/template/course_menu');
        $this->load->view('guru/course/course');
        $this->load->view('guru/template/footer');
    }

    public function addKD($CourseID)
    {
        $insert_data = [
            'CourseID' => $CourseID,
            'CompetenciesName' => $this->input->post('nama-kd'),

        ];
        $this->Course_model->addCompetencies($insert_data);
        redirect('guru/course/' . $CourseID);
    }

    public function editKD($CourseID, $CompetenciesID)
    {
        $update_data = [
            // 'CourseID' => $CourseID,
            'CompetenciesName' => $this->input->post('nama-kd'),
            // 'CourseID' => $CourseID,
        ];
        $this->db->where('CompetenciesID', $CompetenciesID);
        $this->db->update('competencies', $update_data);
        redirect('guru/course/' . $CourseID);
    }

    public function deleteKD($CourseID, $CompetenciesID)
    {
        $this->db->where('CompetenciesID', $CompetenciesID);
        $this->db->delete('competencies');
        redirect('guru/course/' . $CourseID);
    }

    public function Lesson($CourseID, $CompetenciesID)
    {
        $data = array(
            'title'     => 'Tambah Materi',
            'menu'      => 'Kelas',
            'course_menu'      => 'Kelas',
            'CompetenciesID' => $CompetenciesID,
            'id' => $CourseID,
            'course'    => $this->Course_model->courseByGuru($CourseID),
            'CourseName'=> $this->Course_model->courseByGuru($CourseID)->CourseName . " - " . $this->Course_model->courseByGuru($CourseID)->ClassName
        );

        $this->load->view('guru/template/header', $data);
        // $this->load->view('guru/template/course_menu');
        $this->load->view('guru/course/add_materi');
        $this->load->view('guru/template/footer');
    }

    public function detail_lesson($LessonID, $CourseID)
    {
        $data = array(
            'title'     => 'Lihat Materi',
            'menu'      => 'Kelas',
            'course_menu'      => 'Kelas',
            'course'    => $this->Course_model->courseByGuru($CourseID),
            'CourseID'=>$CourseID,
            'countUserLesson'=>$this->Course_model->countUserLesson($LessonID),
            'CourseName'=> $this->Course_model->courseByGuru($CourseID)->CourseName . " - " . $this->Course_model->courseByGuru($CourseID)->ClassName,
            'lesson'=>$this->Course_model->getLessonContentByID($LessonID)
        );
        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/course/lihat_materi');
        $this->load->view('guru/template/footer');
    }

    public function editLesson($CourseID, $LessonID)
    {
        $data = array(
            'title'     => 'Edit Materi',
            'menu'      => 'Kelas',
            'id' => $CourseID,
            'course_menu'      => 'Kelas',
            'course'    => $this->Course_model->courseByGuru($CourseID),
            'CourseName'=> $this->Course_model->courseByGuru($CourseID)->CourseName . " - " . $this->Course_model->courseByGuru($CourseID)->ClassName

        );
        $content['lesson'] = $this->Course_model->getLessonContentByID($LessonID);
        $this->load->view('guru/template/header', $data);
        // $this->load->view('guru/template/course_menu');
        $this->load->view('guru/course/edit_materi', $content);
        $this->load->view('guru/template/footer');
    }

    public function editLessonCourse($CourseID, $LessonID)
    {
        $data['courseID'] = $CourseID;
        if (!empty($_FILES['file']['name'])) {
            $temp = explode(".", $_FILES["file"]["name"]);
            $newfilename = $this->session->userdata('id_user') . '_' . round(microtime(true)) . '.' . $temp[1];
            $config['file_name']            = $newfilename;
        }
        $config['upload_path']          = './assets/lesson/';
        $config['allowed_types']        = '*';


        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file')) {
            //jika user tidak upload file
            $insert_data = array(

                'LessonContent' => $this->input->post('content'),
                'LessonTitle' => $this->input->post('judul'),
                // 'File' => $newfilename,
                'LessonTitle' => $this->input->post('title')
            );
            $this->Course_model->editLesson($insert_data, $LessonID);
            redirect('guru/detail_lesson/' .$LessonID.'/'. $CourseID);
        } else {
            $insert_data = array(

                'LessonContent' => $this->input->post('content'),
                'LessonTitle' => $this->input->post('judul'),
                'File' => $newfilename,
                'LessonTitle' => $this->input->post('title')
            );
            $this->Course_model->editLesson($insert_data, $LessonID);
            redirect('guru/course/' . $CourseID);
        }
    }

    public function deleteLesson($CourseID, $LessonID)
    {
        $this->db->where('LessonID', $LessonID);
        $this->db->delete('course_lesson');
        redirect('guru/course/' . $CourseID);
    }



    public function addLessonCourse($CourseID, $CompetenciesID)
    {
        $data['courseID'] = $CourseID;
        $config['upload_path']          = './assets/lesson/';
        $config['allowed_types']        = '*';

        $temp = explode(".", $_FILES["file"]["name"]);
        $newfilename = $this->session->userdata('id_user') . '_' . round(microtime(true)) . '.' . $temp[1];
        $config['file_name']            = $newfilename;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file')) {
            //jika user tidak upload file
            $insert_data = array(
                'CompetenciesID' => $CompetenciesID,
                'LessonContent' => $this->input->post('content'),
                // 'LessonTitle' => $this->input->post('judul'),
                // 'File' => $newfilename,
                'LessonTitle' => $this->input->post('title')
            );
            $this->Course_model->addLesson($insert_data);

            $log = [
                'CourseID' => $CourseID,
                'UserID' => $this->session->userdata('id_user'),
                'Log' => 'membuat materi baru: ' . $this->input->post('title'),
            ];
            $this->db->insert('log', $log);

            redirect('guru/course/' . $CourseID);
        } else {
            $insert_data = array(
                'CompetenciesID' => $CompetenciesID,
                'LessonContent' => $this->input->post('content'),
                // 'LessonTitle' => $this->input->post('judul'),
                'File' => $newfilename,
                'LessonTitle' => $this->input->post('title')
            );
            $this->Course_model->addLesson($insert_data);

            $log = [
                'CourseID' => $CourseID,
                'UserID' => $this->session->userdata('id_user'),
                'Log' => 'membuat materi baru: ' . $this->input->post('title'),
            ];

            $this->db->insert('log', $log);
            redirect('guru/course/' . $CourseID);
        }
    }

    public function aktivitas($CourseID)
    {
        $data = array(
            'title'     => $this->Course_model->courseByGuru($CourseID)->CourseName . " - " . $this->Course_model->courseByGuru($CourseID)->ClassName,
            'menu'      => 'Kelas',
            'course_menu' => "Aktivitas",
            'course'    => $this->Course_model->courseByGuru($CourseID),
            'log' => $this->Course_model->getLogByCourseID($CourseID)
        );

        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/template/course_menu');
        $this->load->view('guru/course/aktivitas');
        $this->load->view('guru/template/footer');
    }

    public function addSertifikat($CourseID){
        $config['upload_path']          = './assets/sertifikat';
        $config['allowed_types']        = 'jpg|png|jpeg';
        ;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('Sertifikat')) {
            $data = array(
                'TeacherID'  => $this->session->userdata('id_user'),
            );
            $this->Course_model->updateKelas($CourseID, $data);
        } else {
            $data = array(
                'TeacherID'  => $this->session->userdata('id_user'),
                'Sertifikat' => $this->upload->data('file_name'),
            );
            $old_sertif = $this->Course_model->getOldSertif($CourseID);
            $this->Course_model->updateKelas($CourseID, $data);
            unlink('./assets/sertifikat/' . $old_sertif); // This is an absolute path to the file
        }
        redirect('guru/sertifikat/' . $CourseID, 'refresh');
    }

    public function sertifikat($CourseID){
        $data = array(
            'title'     => $this->Course_model->courseByGuru($CourseID)->CourseName . " - " . $this->Course_model->courseByGuru($CourseID)->ClassName,
            'menu'      => 'Kelas',
            'course_menu' => "Sertifikat",
            'course'    => $this->Course_model->courseByGuru($CourseID),
        );
        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/template/course_menu');
        $this->load->view('guru/course/sertifikat');
        $this->load->view('guru/template/footer');
    }
    public function rekap($CourseID)
    {
        $data = array(
            'title'     => $this->Course_model->courseByGuru($CourseID)->CourseName . " - " . $this->Course_model->courseByGuru($CourseID)->ClassName,
            'menu'      => 'Kelas',
            'course_menu' => "Rekap Nilai",
            'CourseID'=>$CourseID,
            'course'    => $this->Course_model->courseByGuru($CourseID),
        );
        $data['competencies'] =  $this->Course_model->getCompetenciesByIDwithArray($CourseID);
        foreach ($data['competencies'] as $row) {
            $lesson_result = $this->Course_model->getLessonByCompetenciesID($row['CompetenciesID']);
            if ($lesson_result) {
                $data['lesson'][$row['CompetenciesID']] = $lesson_result;
            }
        }
        foreach ($data['competencies'] as $row) {
            $quiz_result = $this->Course_model->getQuizByCompetenciesID($row['CompetenciesID']);
            if ($quiz_result) {
                $data['quiz'][$row['CompetenciesID']] = $quiz_result;
            }
        }

        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/template/course_menu');
        $this->load->view('guru/course/rekap_nilai');
        $this->load->view('guru/template/footer');
    }
    public function siswa($CourseID)
    {
        $data = array(
            'title'     => $this->Course_model->courseByGuru($CourseID)->CourseName . " - " . $this->Course_model->courseByGuru($CourseID)->ClassName,
            'menu'      => 'Kelas',
            'course_menu' => "Daftar Siswa",
            'course'    => $this->Course_model->courseByGuru($CourseID),
            'siswa'     => $this->Course_model->getSiswaByCourse($CourseID),
        );
        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/template/course_menu');
        $this->load->view('guru/course/daftar_siswa');
        $this->load->view('guru/template/footer');
    }
    public function pengaturan($CourseID)
    {
        $data = array(
            'title'     => $this->Course_model->courseByGuru($CourseID)->CourseName . " - " . $this->Course_model->courseByGuru($CourseID)->ClassName,
            'menu'      => 'Kelas',
            'course_menu' => "Pengaturan",
            'course'    => $this->Course_model->courseByGuru($CourseID),
        );
        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/template/course_menu');

        $this->load->view('guru/course/pengaturan');
        $this->load->view('guru/template/footer');
    }

    public function create_quiz($CourseID, $CompetenciesID)
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        if ($this->form_validation->run() == false) {
            $data = array(
                'title'     => $this->Course_model->courseByGuru($CourseID)->CourseName . " - " . $this->Course_model->courseByGuru($CourseID)->ClassName,
                'menu'      => 'Kelas',
                'course'    => $this->Course_model->courseByGuru($CourseID),
                'course_menu'      => 'Kelas',
                'id' => $CompetenciesID,
                'courseID' => $CourseID
            );

            $this->load->view('guru/template/header', $data);
            $this->load->view('guru/course/create_quiz');
            $this->load->view('guru/template/footer');
        } else {
            $insert_data = [
                'CompetenciesID' => $CompetenciesID,
                'QuizTitle' => $this->input->post('judul'),

            ];

            $QuizID =   $this->M_Quiz->createQuiz($insert_data);

            $log = [
                'CourseID' => $CourseID,
                'UserID' => $this->session->userdata('id_user'),
                'Log' => 'membuat quiz: ' . $this->input->post('judul'),
            ];
            $this->db->insert('log', $log);
            redirect('guru/list_question/' . $CourseID . '/' . $QuizID);
        }
    }

    public function create_question($CourseID, $QuizID)
    {
        $this->form_validation->set_rules('soal', 'Soal', 'required');
        if ($this->form_validation->run() == false) {
            $data = array(

                'title'     => $this->Course_model->courseByGuru($CourseID)->CourseName . " - " . $this->Course_model->courseByGuru($CourseID)->ClassName,
                'menu'      => 'Tambah Quiz',
                'course_menu' => "Tambah Quiz",
                'course'    => $this->Course_model->courseByGuru($CourseID),
                'id' => $QuizID,
                'nomor_soal' => $this->M_Quiz->getQuizCount($QuizID),
                'courseID' => $CourseID,
            );

            $this->load->view('guru/template/header', $data);
            $this->load->view('guru/course/create_question');
            $this->load->view('guru/template/footer');
        } else {
            $choose_option = $this->input->post('processed');
            if ($choose_option == 'Tambah Soal') {
                $temp = explode(".", $_FILES["file"]["name"]);
                $newfilename = round(microtime(true)) . '.' . $temp[1];

                $config['file_name']            = $newfilename;

                $config['upload_path']          = "media/soal/";
                $config['allowed_types']          = '*';


                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('file')) {
                    $insert_data = array(
                        'QuizID' => $QuizID,
                        'Question' => $this->input->post('soal'),
                        'OptionA' => $this->input->post('jawaban_1'),
                        'OptionB' => $this->input->post('jawaban_2'),
                        'OptionC' => $this->input->post('jawaban_3'),
                        'OptionD' => $this->input->post('jawaban_4'),
                        'OptionE' => $this->input->post('jawaban_5'),
                        'TrueOption' => $this->input->post('TrueOption'),
                    );
                    $this->M_Quiz->saveQuestion($insert_data, $QuizID);
                    redirect('guru/create_question/' . $CourseID . '/' . $QuizID);
                } else {
                    $insert_data = array(
                        'QuizID' => $QuizID,
                        'Question' => $this->input->post('soal'),
                        'OptionA' => $this->input->post('jawaban_1'),
                        'OptionB' => $this->input->post('jawaban_2'),
                        'OptionC' => $this->input->post('jawaban_3'),
                        'OptionD' => $this->input->post('jawaban_4'),
                        'OptionE' => $this->input->post('jawaban_5'),
                        'TrueOption' => $this->input->post('TrueOption'),

                        'question_img' => $config['file_name'],
                    );
                    $this->M_Quiz->saveQuestion($insert_data, $QuizID);
                    redirect('guru/create_question/' . $CourseID . '/' . $QuizID);
                }
            } elseif ($choose_option == 'Simpan') {
                $temp = explode(".", $_FILES["file"]["name"]);
                $newfilename = round(microtime(true)) . '.' . $temp[1];

                $config['file_name']            = $newfilename;
                $config['upload_path']          = "media/soal/";
                $config['allowed_types']          = '*';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('file')) {
                    $insert_data = array(
                        'QuizID' => $QuizID,
                        'Question' => $this->input->post('soal'),
                        'OptionA' => $this->input->post('jawaban_1'),
                        'OptionB' => $this->input->post('jawaban_2'),
                        'OptionC' => $this->input->post('jawaban_3'),
                        'OptionD' => $this->input->post('jawaban_4'),
                        'OptionE' => $this->input->post('jawaban_5'),
                        'TrueOption' => $this->input->post('TrueOption'),
                    );
                    $this->M_Quiz->saveQuestion($insert_data, $QuizID);
                    redirect('guru/list_question/' . $CourseID . '/' . $QuizID);
                } else {
                    $insert_data = array(
                        'QuizID' => $QuizID,
                        'Question' => $this->input->post('soal'),
                        'OptionA' => $this->input->post('jawaban_1'),
                        'OptionB' => $this->input->post('jawaban_2'),
                        'OptionC' => $this->input->post('jawaban_3'),
                        'OptionD' => $this->input->post('jawaban_4'),
                        'OptionE' => $this->input->post('jawaban_5'),
                        'TrueOption' => $this->input->post('TrueOption'),

                        'question_img' => $config['file_name'],
                    );
                    $this->M_Quiz->saveQuestion($insert_data, $QuizID);
                    redirect('guru/list_question/' . $CourseID . '/' . $QuizID);
                }
            }
        }
    }



    public function list_question($CourseID, $QuizID)
    {
        $data = array(
            'title'     => 'Quiz',
            'menu'      => 'Kelas',
            'course_menu'      => 'Kelas',
            'course'    => $this->Course_model->courseByGuru($CourseID),
            'id' => $QuizID,
            'courseID' => $CourseID,
            'quiz'=>$this->Course_model->getQuizByID($QuizID),
            'countUserQuiz'=>$this->Course_model->countUserQuiz($QuizID)
        );

        $data['question'] = $this->M_Quiz->getListQuestionByQuizID($QuizID);
        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/course/list_question');
        $this->load->view('guru/template/footer');
    }

    public function edit_question($CourseID, $QuestionID)
    {
        $this->form_validation->set_rules('soal', 'Soal', 'required');
        $temp = explode(".", $_FILES["file"]["name"]);
        $newfilename = round(microtime(true)) . '.' . $temp[1];
        $config['upload_path']          = "media/soal/";
        $config['allowed_types']          = '*';
        $config['file_name']            = $newfilename;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('file')) {
            // $raw = $this->M_Quiz->getQuizCount($this->input->post('quizid'));
            // $jumlah = $raw->jumlah;
            // (float)$total = 100 / $jumlah . (float)$jumlah;
            $insert_data = array(
                    'Question' => $this->input->post('soal'),
                    'OptionA' => $this->input->post('jawaban_1'),
                    'OptionB' => $this->input->post('jawaban_2'),
                    'OptionC' => $this->input->post('jawaban_3'),
                    'OptionD' => $this->input->post('jawaban_4'),
                    'OptionE' => $this->input->post('jawaban_5'),
                    'TrueOption' => $this->input->post('TrueOption'),
                );
            $this->M_Quiz->EditQuestion($insert_data, $QuestionID);
            redirect('guru/list_question/' . $CourseID . '/' . $this->input->post('quizid'));
        } else {
            // $raw = $this->M_Quiz->getQuizCount($this->input->post('quizid'));
            // $jumlah = $raw->jumlah;
            // (float)$total = 100 / $jumlah . (float)$jumlah;
            $insert_data = array(

                    'Question' => $this->input->post('soal'),
                    'OptionA' => $this->input->post('jawaban_1'),
                    'OptionB' => $this->input->post('jawaban_2'),
                    'OptionC' => $this->input->post('jawaban_3'),
                    'OptionD' => $this->input->post('jawaban_4'),
                    'OptionE' => $this->input->post('jawaban_5'),
                    'TrueOption' => $this->input->post('TrueOption'),
                    'question_img' => $config['file_name'],

                );

            $this->M_Quiz->EditQuestion($insert_data, $QuestionID);
            redirect('guru/list_question/' . $CourseID . '/' . $this->input->post('quizid'));
        }
    }

    public function hapus_soal($CourseID, $QuizID, $QuestionID)
    {
        $this->db->delete('quiz_question', array('QuestionID' => $QuestionID));
        redirect('guru/list_question/' . $CourseID . '/' . $QuizID);
    }
    public function result($LessonID, $CourseID)
    {
        $data = array(
            'title'     => 'Rekap Nilai',
            'menu'      => 'Kelas',
            'course_menu' => "Rekap Nilai",
            'course'    => $this->Course_model->courseByGuru($CourseID),
            'siswa'     => $this->Course_model->getUserLesson($LessonID),
            'lesson'=>$this->Course_model->getLessonContentByID($LessonID)

        );
        $this->load->view('guru/template/header', $data);
        // $this->load->view('guru/template/course_menu');
        $this->load->view('guru/course/result');
        $this->load->view('guru/template/footer');
    }
    public function resultquiz($CourseID, $QuizID)
    {
        $data = array(
            'title'     => 'Rekap Nilai',
            'menu'      => 'Kelas',
            'course_menu' => "Rekap Nilai",
            'course'    => $this->Course_model->courseByGuru($CourseID),
            'siswa' => $this->Course_model->getUserQuiz($QuizID),
            'quiz'=>$this->Course_model->getQuizByID($QuizID),
        );
        $this->load->view('guru/template/header', $data);
        // $this->load->view('guru/template/course_menu');
        $this->load->view('guru/course/resultquiz');
        $this->load->view('guru/template/footer');
    }
    public function answer($QuizID, $CourseID, $UserID)
    {
        $data = array(
            'title' => "Hasil Quiz",
            'menu'  => 'Kelas',
            'course_menu' => "Rekap Nilai",
            'course'    => $this->Course_model->courseByGuru($CourseID),
            'quiz'=>$this->Course_model->getQuizByID($QuizID),
            'hasil'=>$this->Course_model->getUserQuizByUser($QuizID,$UserID),
            // 'user_quiz' => $this->quiz->getUserQuiz($quizID),
            'feedback' => $this->Course_model->feedback($QuizID,$UserID)
        );
        $this->load->view('guru/template/header', $data);
        // $this->load->view('guru/template/course_menu');
        $this->load->view('guru/course/answer');
        $this->load->view('guru/template/footer');
    }
    public function editQuiz($QuizID,$CourseID)
    {
        $data = array(
            'QuizTitle'=>$this->input->post('QuizTitle')
            
        );
        $this->Course_model->updateQuiz($QuizID,$data);
        
        redirect('guru/list_question/'.$CourseID.'/'.$QuizID,'refresh');
        
    }
    public function deleteQuiz($QuizID,$CourseID)
    {
        $this->Course_model->deleteQuiz($QuizID);
        
        redirect('guru/course/'.$CourseID,'refresh');
        
    }
    public function liveCode()
    {
        $data = array(
            'title' => "Live Code",
            'menu'  => 'Live Code',
        );
        $this->load->view('guru/template/header', $data);
        $this->load->view('siswa/livecode');
        $this->load->view('guru/template/footer');
    }
    public function gameedu()
    {
        $data = array(
            'title' => "Game Edu",
            'menu'  => 'Game Edu',
        );
        $this->load->view('guru/template/header', $data);
        $this->load->view('siswa/gameedu');
        $this->load->view('guru/template/footer');
    }
}
        
    /* End of file  guru.php */
