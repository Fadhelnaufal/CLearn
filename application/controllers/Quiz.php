<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Quiz
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Quiz extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Course_model');
        $this->load->model('M_Discussion');
        $this->load->model('M_Quiz', 'quiz');
        if ($this->session->userdata('role') != 'siswa') {
            redirect('auth', 'refresh');
        }
        $totalXP = $this->Course_model->totalXP();
        $this->Course_model->setLevel($totalXP);
    }

    public function Quiz_detail($quizID, $CourseID)
    {
        $data = array(
            'title' => "Quiz",
            'menu'  => 'Kelas',
            'CourseID' => $CourseID,
             'user'        => $this->Course_model->getUser(),
            'quiz' => $this->quiz->getQuiz($quizID),
            'CourseName' => $this->M_Discussion->getCourseName($CourseID),
            'jmlsoal' => $this->quiz->countQuestion($quizID)
        );
        $data['question'] = $this->quiz->getQuizByID($quizID);

        $this->load->view('siswa/template/header', $data);
        $this->load->view('siswa/quiz/quiz_detail');
        $this->load->view('siswa/template/footer');
    }

    public function QuizResult($quizID, $CourseID)
    {
        //Masukkan jawaban ke tabel user_answer dan beri nilai
        $question = $this->quiz->getQuizByID($quizID);
        $score = 0;
        $addXP = 0;
        $jml_soal = $this->quiz->countQuestion($quizID);
        foreach ($question as $row) {
            if ($row->TrueOption == $this->input->post('pertanyaan' . $row->QuestionID)) {
                $score++;
                $addXP = $addXP + 50;
            } else {
                $addXP = $addXP + 10;
            }
            $answer = array(
                'UserID' =>  $id = $this->session->userdata('id_user'),
                'QuestionID' => $row->QuestionID,
                'answer' => $this->input->post('pertanyaan' . $row->QuestionID)
            );
            $this->quiz->insertAnswer($answer);
        }
        //hitung nilai dan insert nilai
        $nilai = $score / $jml_soal * 100;
        $dataNilai = array(
            'UserID' =>  $id = $this->session->userdata('id_user'),
            'QuizID' => $quizID,
            'result' => ceil($nilai),
            'addXP' => $addXP
        );
        $this->quiz->insertNilai($dataNilai);
        //updateXP
        $this->quiz->updateXP($CourseID, $addXP);
        //load page

        $log = [
            'CourseID' => $CourseID,
            'UserID' =>  $id = $this->session->userdata('id_user'),
            'Log' => 'menyelesaikan quiz: ' . $this->quiz->getQuiz($quizID)->QuizTitle,
        ];
        $this->db->insert('log', $log);
        redirect('quiz/result/' . $quizID . '/' . $CourseID, 'refresh');
    }
    public function result($quizID, $CourseID)
    {
        $data = array(
            'title' => "Hasil Quiz",
            'menu'  => 'Kelas',
             'user'        => $this->Course_model->getUser(),
             'CourseName' => $this->M_Discussion->getCourseName($CourseID),
            'CourseID' => $CourseID,
            'quiz' => $this->quiz->getQuiz($quizID),
            'user_quiz' => $this->quiz->getUserQuiz($quizID),
            'feedback' => $this->quiz->feedback($quizID),
            'isEvaluation'=>$this->quiz->isEval($quizID),
            'course_menu'      => "Kelas",
            'course'    => $this->Course_model->course($CourseID),
        );
        $this->load->view('siswa/template/header', $data);
        $this->load->view('siswa/quiz/quiz_result');
        $this->load->view('siswa/template/footer');
    }
}


/* End of file Quiz.php */
/* Location: ./application/controllers/Quiz.php */
