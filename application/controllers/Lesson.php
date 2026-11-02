<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Lesson extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'siswa') {
            redirect('auth', 'refresh');
        }
        $this->load->model('Course_model');
        $this->load->model('M_Lesson');
        $totalXP = $this->Course_model->totalXP();
        $this->Course_model->setLevel($totalXP);
    }
    public function course($CourseID)
    {
        $data = array(
            'title'     => $this->Course_model->course($CourseID)->CourseName . ' - ' . $this->Course_model->course($CourseID)->ClassName,
            'menu'      => 'Kelas',
            'course_menu'      => 'Kelas',
            'course'    => $this->Course_model->course($CourseID),
            'kd'        => $this->M_Lesson->getCompetency($CourseID),
            'total_xp'      => $this->Course_model->totalXP(),
            'user'        => $this->Course_model->getUser(),
            'score'     => $this->M_Lesson->scoreByCourse($CourseID),
            'total_mission' => $this->Course_model->countLessonByCourse($CourseID) + $this->Course_model->countQuizByCourse($CourseID),
            'completed_mission' => $this->Course_model->CompletedLessonByCourse($CourseID) + $this->Course_model->completedQuizByCourse($CourseID)
        );
        $this->load->view('siswa/template/header', $data);
        $this->load->view('siswa/course/course_menu');
        $this->load->view('siswa/course/course');
        $this->load->view('siswa/template/footer');
    }
    public function study($CourseID,$LessonID)
    {
        $data = array(
            'title'     => 'Materi',
            'menu'      => "Kelas",
            'course_menu'      => "Kelas",
             'user'        => $this->Course_model->getUser(),
            'course'    => $this->Course_model->course($CourseID),
            'lesson'  => $this->M_Lesson->getLesson($LessonID),
            'check' => $this->M_Lesson->check_user_lesson($LessonID)
        );
        $this->load->view('siswa/template/header', $data);
        $this->load->view('siswa/materi');
        $this->load->view('siswa/template/footer');
    }
    public function complete()
    {
        $CourseID = $this->input->post('course');
        $data = array(
            'UserID' => $this->session->userdata('id_user'),
            'LessonID' => $this->input->post('lesson'),
            'Score' => 200,
            'CourseID' => $CourseID
        );
        $this->M_Lesson->complete($data, $CourseID);
        $totalXP = $this->Course_model->totalXP();
        $this->Course_model->setLevel($totalXP);

        $lesson_title =  $this->M_Lesson->getLesson($this->input->post('lesson'))->LessonTitle;
        $log = [
            'CourseID' => $CourseID,
            'UserID'    => $this->session->userdata('id_user'),
            'Log' => 'membaca materi: ' . $lesson_title,
        ];
        $this->db->insert('log', $log);

        redirect('lesson/course/' . $CourseID, 'refresh');
    }
}
        
    /* End of file  Lesson.php */