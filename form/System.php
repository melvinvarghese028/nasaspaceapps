<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
define('DB_HOST', 'localhost');
define('DB_NAME', 'nasaspaceappstcr');
define('DB_USER', 'nasaspaceappstcr');
define('DB_PASS', 'As)]_sS9n~YE');

define('SITE_NAME', 'Unique World');
define('SECRET_KEY', '6LerQL0nAAAAAIARXjcYbtcHVF0G5MB9-10YGLci');
$self = basename($_SERVER['PHP_SELF']);
class System
{
    private $pdo;
    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ]);
        } catch (PDOException $e) {
            die("Cannot Connect to Database");
        }
    }
    public function contact_us()
    {
        $res['type'] = 'danger';
        $res['message'] = '<b>Error!</b> There was an error while submitting the form. Please try again later';
        $details['name'] = isset($_POST['name']) ? trim(strip_tags($_POST['name'])) : '';
        $details['email'] = isset($_POST['email']) ? trim(strip_tags($_POST['email'])) : '';
        $details['mobile'] = isset($_POST['phone']) ? trim(strip_tags($_POST['phone'])) : '';
        $details['location'] = isset($_POST['location']) ? trim(strip_tags($_POST['location'])) : '';
        $details['dob'] = isset($_POST['dob']) ? trim(strip_tags(nl2br($_POST['dob']))) : '';
        $details['created'] = date('Y-m-d H:i:s');
        if (
            empty($details['name']) or
            empty($details['email']) or
            empty($details['mobile'])
        ) {
            $res['message'] = "<strong>Required Fields were left empty.</strong> Please try again!";
            return $res;
        } elseif (!filter_var($details['email'], FILTER_VALIDATE_EMAIL)) {
            $res['message'] = "<strong>Error!</strong> Invalid email address.";
            return $res;
        } elseif (!preg_match('/^\+?\d+$/', $details['mobile'])) {
            $res['message'] = "<strong>Error!</strong> Invalid phone number.";
            return $res;
        } /*elseif (!$this->recaptcha_verify()) {
            $res['message'] = "<strong>Error!</strong> Bot Verification Failed.";
        }*/ elseif ($this->_addtodb('enquiries', $details)) {
            $res['type'] = 'success';
            $res['message'] = 'Your message has been sent successfully. <b>' . SITE_NAME . '</b> & team will get back to you soon!';
        }
        return $res;
    }
    private function _addtodb($table = NULL, $data = [])
    {
        $insert = [];
        foreach ($data as $k => $v) {
            $insert[':' . $k] = $v;
        }
        $sql = "INSERT INTO " . $table . " ( " . implode(', ', array_keys($data)) . " )  VALUES ( " . implode(', ', array_keys($insert)) . ") ";
        $query = $this->pdo->prepare($sql);
        return $query->execute($insert);
    }
    public function recaptcha_verify()
    {
        $recaptcha = $_POST['g-recaptcha-response'];
        if (empty($recaptcha)) return FALSE;
        $google_url = "https://www.google.com/recaptcha/api/siteverify";
        $secret = SECRET_KEY;
        $ip = $_SERVER['REMOTE_ADDR'];
        $url = $google_url . "?secret=" . $secret . "&response=" . $recaptcha . "&remoteip=" . $ip;
        $res = file_get_contents($url);
        $res = json_decode($res, true);
        return isset($res['success']) ? $res['success'] : FALSE;
    }
    public function uploadFile($filename, $from)
    {
        if (empty($_FILES[$from]['name'])) return FALSE;
        $target_dir = __DIR__ . "../uploads/";
        $target_file = $target_dir . $filename;
        $uploadOk = 1;
        $fileType = pathinfo($target_file, PATHINFO_EXTENSION);
        if ($_FILES[$from]["size"] > 500000000) {
            $uploadOk = 0;
        }
        if ($fileType != "doc" && $fileType != "docx" && $fileType != "pdf") {
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            return FALSE;
        } else {
            if (move_uploaded_file($_FILES[$from]["tmp_name"], $target_file)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }
    public function uploadImage($filename)
    {
        $target_dir = __DIR__ . "../uploads/";
        $target_file = $target_dir . $filename;
        $uploadOk = 1;
        $fileType = pathinfo($target_file, PATHINFO_EXTENSION);
        if ($_FILES["image"]["size"] > 500000000) {
            $uploadOk = 0;
        }
        if ($fileType != "jpg" && $fileType != "jpeg" && $fileType != "png" && $fileType != "gif") {
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            return FALSE;
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    public function export_enquiry_csv()
    {
        $filename = "nasa_csv.csv";
        $fp = fopen('php://output', 'w');

        header('Content-type: application/csv');
        header('Content-Disposition: attachment; filename=' . $filename);
        $heading = ['SL', 'Name', 'Email', 'Phone', 'Location', 'Date Of Birth', 'Created'];
        fputcsv($fp, $heading);

        $sql = "SELECT * FROM enquiries";
        $query = $this->pdo->query($sql);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row)
            fputcsv($fp, array_values($row));
        exit;
    }
}
