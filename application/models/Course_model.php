<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Course_model extends CI_Model
{
    public function countCourseSiswa()
    {
        $id = $this->session->userdata('id_user');
        $this->db->from('course');
        $this->db->join('user_course', 'course.CourseID = user_course.CourseID');
        $this->db->where('user_course.UserID', $id);
        return $this->db->count_all_results();
    }
    public function countCourseGuru()
    {
        $id = $this->session->userdata('id_user');
        $this->db->from('course');
        $this->db->where('TeacherID', $id);
        return $this->db->count_all_results();
        ;
    }
    public function getUser()
    {
        // SELECT * FROM `users` INNER JOIN Level ON Level.LevelID=users.Level WHERE users.UserID=3
        $id = $this->session->userdata('id_user');
        $this->db->join('level', 'level.LevelID=users.level');
        $this->db->where('users.UserID', $id);
        return $this->db->get('users')->row();
    }
    public function countSiswa()
    {
        // SELECT * FROM course INNER JOIN user_course ON course.CourseID=user_course.CourseID WHERE course.TeacherID=2
        $id = $this->session->userdata('id_user');

        $this->db->select('user_course.UserID');
        $this->db->from('course');
        $this->db->join('user_course', 'course.CourseID = user_course.CourseID');
        $this->db->where('course.TeacherID', $id);
        $this->db->group_by('user_course.UserID');
        return $this->db->count_all_results();
    }
    public function countSiswaByCourse($CourseID)
    {
        $this->db->select('count(*) as c');
        $this->db->join('course', 'user_course.CourseID=course.CourseID');
        $this->db->join('users', 'users.UserID=user_course.UserID');
        $this->db->where('course.CourseID', $CourseID);
        $row = $this->db->get('user_course')->row();
        return $row->c;
    }

    public function getCourseGuru_limit()
    // get course created by teacher limit 6
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('TeacherID', $id);
        $this->db->limit(20);

        $this->db->order_by('CourseID', 'desc');

        return $this->db->get('course')->result();
    }
    public function getCourseSiswa_limit()
    {
        $id = $this->session->userdata('id_user');
        $this->db->join('user_course', 'course.CourseID = user_course.CourseID');
        $this->db->where('user_course.UserID', $id);
        $this->db->limit(20);
        $this->db->order_by('user_course.JoinDate', 'desc');
        return $this->db->get('course')->result();
    }
    public function getCourseGuru()
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('TeacherID', $id);
        $this->db->order_by('CourseID', 'asc');
        return $this->db->get('course')->result();
    }
    public function getCourseSiswa()
    {
        $id = $this->session->userdata('id_user');
        $this->db->join('user_course', 'course.CourseID = user_course.CourseID');
        $this->db->where('user_course.UserID', $id);
        $this->db->order_by('user_course.JoinDate', 'asc');
        return $this->db->get('course')->result();
    }

    public function getTeacherCourse()
    {
        $id = $this->session->userdata('id_user');
        $this->db->join('users', 'course.TeacherID = users.UserID');
        $this->db->where('users.UserID', $id);
        // $this->db->order_by('user_course.JoinDate', 'desc');
        return $this->db->get('course')->result();
    }
    public function getAllCourse()
    //get course where user not joining into that course
    {
        $id = $this->session->userdata('id_user');
        $query = $this->db->query('SELECT *,course.CourseID as id FROM course WHERE course.CourseID NOT IN (SELECT course.CourseID FROM course INNER JOIN user_course ON course.CourseID=user_course.CourseID AND user_course.UserID=' . $id . ')');
        return $query->result();
    }
    public function totalCourse(){
        $id = $this->session->userdata('id_user');
        $this->db->from('course');
        return $this->db->count('course');
    }
    public function course($CourseID)
    {
        $id = $this->session->userdata('id_user');
        $this->db->join('user_course', 'course.CourseID=user_course.CourseID');
        $this->db->where('user_course.UserID', $id);
        $this->db->where('course.CourseID', $CourseID);
        return $this->db->get('course')->row();
    }
    public function courseInfo($CourseID)
    {
        $this->db->join('users', 'users.UserID=course.TeacherID');
        $this->db->where('CourseID', $CourseID);
        return $this->db->get('course')->row();
    }
    public function courseByGuru($CourseID)
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('TeacherID', $id);
        $this->db->where('CourseID', $CourseID);
        return $this->db->get('course')->row();
    }
    public function getSiswaByCourse($CourseID)
    {
        $id = $this->session->userdata('id_user');

        $this->db->join('course', 'user_course.CourseID=course.CourseID');
        $this->db->join('users', 'users.UserID=user_course.UserID');
        $this->db->where('course.CourseID', $CourseID);
        $this->db->where('course.TeacherID', $id);

        $this->db->order_by('users.UserName', 'asc');

        return $this->db->get('user_course')->result();
    }
    public function updateKelas($CourseID, $data)
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('CourseID', $CourseID);
        $this->db->where('TeacherID', $id);
        $this->db->update('course', $data);
    }
    public function getOldLogo($CourseID)
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('TeacherID', $id);
        $this->db->where('CourseID', $CourseID);
        $row = $this->db->get('course')->row();
        return $row->CourseLogo;
    }
    public function getOldSertif($CourseID)
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('TeacherID', $id);
        $this->db->where('CourseID', $CourseID);
        $row = $this->db->get('course')->row();
        return $row->Sertifikat;
    }
    public function deleteCourse($CourseID)
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('TeacherID', $id);
        $this->db->where('CourseID', $CourseID);
        $this->db->delete('course');
    }
    public function kick($CourseID, $UserID)
    {
        $this->db->where('UserID', $UserID);
        $this->db->where('CourseID', $CourseID);
        $this->db->delete('user_course');
    }
    public function teman($CourseID)
    {
        $this->db->join('course', 'user_course.CourseID=course.CourseID');
        $this->db->join('users', 'users.UserID=user_course.UserID');
        $this->db->where('course.CourseID', $CourseID);
        $this->db->order_by('users.UserName', 'asc');
        return $this->db->get('user_course')->result();
    }
    public function sertifikat($CourseID)
    {
        $this->db->join('course', 'user_course.CourseID=course.CourseID');
        $this->db->join('users', 'users.UserID=user_course.UserID');
        $this->db->where('course.CourseID', $CourseID);
        $this->db->order_by('users.UserName', 'asc');
        return $this->db->get('user_course')->result();
    }
    public function quit($CourseID)
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('CourseID', $CourseID);
        $this->db->where('UserID', $id);
        $this->db->delete('user_course');
    }
    public function deleteUserLesson($CourseID)
    {
        // SELECT * FROM `user_lesson` INNER JOIN course_lesson ON course_lesson.LessonID=user_lesson.LessonID INNER JOIN competencies ON competencies.CompetenciesID=course_lesson.CompetenciesID WHERE user_lesson.UserID=3 AND competencies.CourseID=1
        $id = $this->session->userdata('id_user');
        $this->db->where('CourseID', $CourseID);
        $this->db->where('UserID', $id);
        $this->db->delete('user_lesson');
    }

    public function getCompetenciesByID($CourseID)
    {
        return $this->db->get_where('competencies', array('CourseID' => $CourseID))->result_object();
    }
    public function getCompetenciesByIDwithArray($CourseID)
    {
        return $this->db->get_where('competencies', array('CourseID' => $CourseID))->result_array();
    }

    public function getCouseByCompetenciesID($CompetenciesID)
    {
        return $this->db->get_where('competencies', array('CompetenciesID' => $CompetenciesID))->row_object();
    }

    public function addCompetencies($data)
    {
        $this->db->insert('competencies', $data);
    }

    public function addLesson($data)
    {
        $this->db->insert('course_lesson', $data);
    }

    public function getLessonContentByID($LessonID)
    {
        return $this->db->get_where('course_lesson', array('LessonID' => $LessonID))->row_array();
    }

    public function getLessonByCompetenciesID($CompetenciesID)
    {
        return $this->db->get_where('course_lesson', array('CompetenciesID' => $CompetenciesID))->result_array();
    }

    public function getQuizByCompetenciesID($CompetenciesID)
    {
        return $this->db->get_where('quiz', array('CompetenciesID' => $CompetenciesID))->result_array();
    }

    public function editLesson($data, $id)
    {
        $this->db->where('LessonID', $id);
        $this->db->update('course_lesson', $data);
    }

    public function totalXP()
    {
        // SELECT SUM(courseXP) FROM `user_course`WHERE UserID=1
        $id = $this->session->userdata('id_user');
        $this->db->select('SUM(courseXP) as xp');
        $this->db->where('UserID', $id);
        $row = $this->db->get('user_course')->row();
        return $row->xp;
    }
    public function setLevel($XP)
    {
        $id = $this->session->userdata('id_user');
        if ($XP < 500) {
            $level = 0;
        } elseif ($XP < 2000) {
            $level = 1;
        } elseif ($XP < 4000) {
            $level = 2;
        } elseif ($XP < 6000) {
            $level = 3;
        } elseif ($XP < 8000) {
            $level = 4;
        } else {
            $level = 5;
        }
        $data = array(
            'level' => $level
        );
        $this->db->where('UserID', $id);
        $this->db->update('users', $data);
    }
    public function getLeaderboard($CourseID)
    {
        # code...SELECT * FROM `user_course` INNER JOIN users ON user_course.UserID=users.UserID WHERE user_course.UserID=1 AND CourseID=1 ORDER BY user_course.courseXP DESC LIMIT 10
        $this->db->join('users', 'user_course.UserID=users.UserID');
        $this->db->where('CourseID', $CourseID);
        $this->db->order_by('user_course.courseXP', 'desc');
        $this->db->limit(10);
        return $this->db->get('user_course')->result();
        
    }
    public function getAllLeaderboard(){
        # code...SELECT * FROM `user_course` INNER JOIN users ON user_course.UserID=users.UserID WHERE user_course.UserID=1 AND CourseID=1 ORDER BY user_course.courseXP DESC LIMIT 10
        // $this->db->select('user_course.UserID', 'SUM(courseXP) as xp');
        // $this->db->select('users.UserID');
        // $this->db->join('users', 'user_course.UserID=users.UserID', 'SUM(courseXP) as xp');
        // $this->db->order_by('user_course.courseXP', 'desc');
        // $this->db->limit(10);
        // return $this->db->get('user_course')->result();
        $sql = "SELECT sum(courseXP) as totalskor FROM user_course";
        $result = $this->db->query($sql);
        return $result->row()->totalCourse;
    }
    public function countAllLesson()
    {
        $id = $this->session->userdata('id_user');
        $this->db->select('count(*) as c');
        $this->db->join('competencies', 'competencies.CompetenciesID=course_lesson.CompetenciesID');
        $this->db->join('user_course', 'user_course.CourseID=competencies.CourseID');
        $this->db->where('UserID', $id);
        $row = $this->db->get('course_lesson')->row();
        return $row->c;
    }

    public function countCompetencies($CourseID)
    {
        $this->db->select('count(*) as value');
        return $this->db->get_where('competencies', array('CourseID' => $CourseID))->row_object();
    }

    public function countCompletedLesson()
    {
        // SELECT COUNT(*) FROM user_lesson WHERE user_lesson.UserID=1 AND user_lesson.Score!=0
        $id = $this->session->userdata('id_user');
        $this->db->select('count(*) as c');
        $this->db->where('user_lesson.UserID', $id);
        $this->db->where('user_lesson.Score!=', 0);
        $row = $this->db->get('user_lesson')->row();
        return $row->c;
    }
    public function countAllQuiz()
    {
        // SELECT count(*) FROM `quiz` INNER JOIN competencies ON competencies.CompetenciesID=quiz.CompetenciesID INNER JOIN user_course ON user_course.CourseID=competencies.CourseID WHERE UserID=1
        $id = $this->session->userdata('id_user');
        $this->db->select('count(*) as c');
        $this->db->join('competencies', 'competencies.CompetenciesID=quiz.CompetenciesID');
        $this->db->join('user_course', 'user_course.CourseID=competencies.CourseID');
        $this->db->where('UserID', $id);
        $row = $this->db->get('quiz')->row();
        return $row->c;
    }
    public function countCompletedQuiz()
    {
        $id = $this->session->userdata('id_user');
        $this->db->select('count(*) as c');
        $this->db->where('UserID', $id);
        $row = $this->db->get('user_quiz')->row();
        return $row->c;
    }
    public function countLessonByCourse($CourseID)
    {
        $this->db->select('count(*) as c');
        $this->db->join('competencies', 'competencies.CompetenciesID=course_lesson.CompetenciesID');
        $this->db->where('competencies.CourseID', $CourseID);
        $row = $this->db->get('course_lesson')->row();
        return $row->c;
    }
    public function countQuizByCourse($CourseID)
    {
        // SELECT count(*) FROM `quiz` INNER JOIN competencies ON competencies.CompetenciesID=quiz.CompetenciesID INNER JOIN user_course ON user_course.CourseID=competencies.CourseID WHERE UserID=1
        $this->db->select('count(*) as c');
        $this->db->join('competencies', 'competencies.CompetenciesID=quiz.CompetenciesID');
        $this->db->where('competencies.CourseID', $CourseID);
        $row = $this->db->get('quiz')->row();
        return $row->c;
    }
    public function CompletedLessonByCourse($CourseID)
    {
        // SELECT COUNT(*) FROM user_lesson WHERE user_lesson.UserID=1 AND user_lesson.Score!=0
        $id = $this->session->userdata('id_user');
        $this->db->select('count(*) as c');
        $this->db->where('user_lesson.UserID', $id);
        $this->db->where('user_lesson.Score!=', 0);
        $this->db->where('user_lesson.CourseID', $CourseID);
        $row = $this->db->get('user_lesson')->row();
        return $row->c;
    }
    public function completedQuizByCourse($CourseID)
    {
        // SELECT * FROM `user_quiz` INNER JOIN quiz ON quiz.QuizID=user_quiz.QuizID INNER JOIN competencies ON competencies.CompetenciesID=quiz.CompetenciesID WHERE competencies.CourseID=1 AND UserID=1
        $id = $this->session->userdata('id_user');
        $this->db->select('count(*) as c');
        $this->db->join('quiz', 'quiz.QuizID=user_quiz.QuizID');
        $this->db->join('competencies', 'competencies.CompetenciesID=quiz.CompetenciesID');
        $this->db->where('competencies.CourseID', $CourseID);
        $this->db->where('UserId', $id);
        $row = $this->db->get('user_quiz')->row();
        return $row->c;
    }

    public function getLogByCourseID($CourseID)
    {
        // SELECT * FROM `log` INNER JOIN users ON users.UserID=log.UserID WHERE CourseID=2
        $this->db->join('users', 'users.UserID=log.UserID');
        $this->db->where('CourseID', $CourseID);
        $this->db->order_by('LogID', 'desc');
        $this->db->limit(30);
        return $this->db->get('log')->result();
    }
    public function getCourseName($CourseID)
    {
        $this->db->where('CourseID', $CourseID);
        return $this->db->get('course')->row()->CourseName;
    }
    public function getQuizByID($QuizID)
    {
        $this->db->where('QuizID', $QuizID);
        return $this->db->get('quiz')->row();
    }
    public function countUserQuiz($QuizID)
    {
        $this->db->select('count(*) as c');
        $this->db->where('QuizID', $QuizID);
        $row = $this->db->get('user_quiz')->row();
        return $row->c;
    }
    public function countUserLesson($LessonID)
    {
        // SELECT count(*) FROM `user_lesson` WHERE LessonID=4
        $this->db->select('count(*) as c');
        $this->db->where('LessonID', $LessonID);
        $row = $this->db->get('user_lesson')->row();
        return $row->c;
    }
    public function getUserLesson($LessonID)
    {
        // SELECT * FROM `user_lesson` INNER JOIN users ON  WHERE LessonID=4
        $this->db->join('users', 'users.UserID=user_lesson.UserID');
        $this->db->where('LessonID', $LessonID);
        $this->db->order_by('users.UserName', 'ASC');
        
        return $this->db->get('user_lesson')->result();
    }
    public function getUserQuiz($QuizID)
    {
        $this->db->join('users', 'users.UserID=user_quiz.UserID');
        $this->db->where('QuizID', $QuizID);
        return $this->db->get('user_quiz')->result();
    }
    public function getUserQuizByUser($QuizID, $UserID)
    {
        $this->db->join('users', 'users.UserID=user_quiz.UserID');
        $this->db->where('QuizID', $QuizID);
        $this->db->where('users.UserID', $UserID);
        return $this->db->get('user_quiz')->row();
    }
    public function feedback($QuizID, $UserID)
    {
        $this->db->join('quiz_question', 'quiz_question.QuestionID=user_answer.QuestionID');
        $this->db->where('quiz_question.QuizID', $QuizID);
        $this->db->where('user_answer.UserID', $UserID);
        return $this->db->get('user_answer')->result();
    }
    public function countTeacherLesson()
    {
        $id = $this->session->userdata('id_user');
        $this->db->select('count(LessonID) as c');
        $this->db->join('competencies', 'competencies.CompetenciesID=course_lesson.CompetenciesID');
        $this->db->join('course', 'course.CourseID=competencies.CourseID');
        $this->db->where('course.TeacherID', $id);
        $row = $this->db->get('course_lesson')->row();
        return $row->c;
    }
    public function countTeacherQuiz()
    {
        // SELECT * FROM `quiz` INNER JOIN competencies ON  INNER JOIN course ON course.CourseID=competencies.CompetenciesID
        $id = $this->session->userdata('id_user');
         $this->db->select('count(QuizID) as c');
        $this->db->join('competencies', 'competencies.CompetenciesID=quiz.CompetenciesID');
        $this->db->join('course', 'course.CourseID=competencies.CourseID');
        $this->db->where('course.TeacherID', $id);
        $row = $this->db->get('quiz')->row();
        return $row->c;

    }
    public function updateQuiz($QuizID,$data)
    {
        $this->db->where('QuizID', $QuizID);
        $this->db->update('quiz', $data);
        
        
    }
    public function deleteQuiz($QuizID)
    {
        $this->db->where('QuizID', $QuizID);
        $this->db->delete('quiz');
        
        
    }
}
                        
/* End of file Course.php */
