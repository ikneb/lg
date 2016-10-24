git <?php

/**
 * Created by PhpStorm.
 * User: ikneb
 * Date: 22.10.2016
 * Time: 21:10
 */
class GenerateDataTest
{
    private $conection;
    private $host;
    private $db;
    private $charset;
    private $user;
    private $pass;

    /**
     * GenerateDataTest constructor.Create new instance and add param for connect db.
     * @param $conection
     * @param $host
     * @param $db
     * @param $charset
     * @param $user
     * @param $pass
     */
    public function __construct($host, $db, $charset, $user, $pass)
    {
        $this->host = $host;
        $this->db = $db;
        $this->charset = $charset;
        $this->user = $user;
        $this->pass = $pass;
    }


    public function main()
    {

        $connect = $this->connect_db();
        $this->truncatTable($connect);

        for ($user_id = 1; $user_id < 5; $user_id++) {
            $this->insertInfo($connect, $user_id);
            $this->insertObjective($connect, $user_id);
            $this->insertContact($connect, $user_id);
            $this->insertUser($connect, $user_id);
            $this->insertCertificate($connect, $user_id);
        }

    }

    public function connect_db()
    {
        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        try {
            $this->conection = new PDO($dsn, $this->user, $this->pass, $opt);
        } catch (PDOException $e) {
            echo 'Подключение не удалось: ' . $e->getMessage();
        }
        return $this->conection;
    }

    public function truncatTable($connect)
    {
        try {

            $truncate_tables = $connect->prepare("SET FOREIGN_KEY_CHECKS = 0;TRUNCATE TABLE certificate");
            $truncate_tables->execute();
            $truncate_tables = $connect->prepare("TRUNCATE TABLE contact");
            $truncate_tables->execute();
            $truncate_tables = $connect->prepare("TRUNCATE TABLE education");
            $truncate_tables->execute();
            $truncate_tables = $connect->prepare("TRUNCATE TABLE info");
            $truncate_tables->execute();
            $truncate_tables = $connect->prepare("TRUNCATE TABLE language");
            $truncate_tables->execute();
            $truncate_tables = $connect->prepare("TRUNCATE TABLE objective");
            $truncate_tables->execute();
            $truncate_tables = $connect->prepare("TRUNCATE TABLE practice");
            $truncate_tables->execute();
            $truncate_tables = $connect->prepare("TRUNCATE TABLE skill");
            $truncate_tables->execute();

            $truncate_tables = $connect->prepare("TRUNCATE TABLE app_users;SET FOREIGN_KEY_CHECKS = 1");
            $truncate_tables->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insertCertificate($connect, $user_id)
    {
        $large_foto = '';
        $small_foto = '';

        $sql = "INSERT INTO certificate(large_foto,small_foto,user_id)
              VALUES (:large_foto,:small_foto,:user_id)";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':large_foto', $large_foto, PDO::PARAM_STR);
        $stmt->bindParam(':small_foto', $small_foto, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id);

        $large_foto = 'http';
        $small_foto = 'http';
        $user_id = 1;
        $stmt->execute();

        $large_foto = 'http1';
        $small_foto = 'http1';
        $user_id = 1;
        $stmt->execute();
    }

    public function insertContact($connect, $user_id)
    {
        $photo = 'dfgd';
        $phone = 'dfg';
        $city = 'dfg';
        $country = 'dfg';
        $age = '25';
        $birthdey = 'ss';
        $skype = 'sdf';
        $vk = 'sdf';
        $facebook = 'sfd';
        $linkedin = 'sfd';
        $stackoverflow = 'sdf';

        $sql = "INSERT INTO contact(id,photo,phone,city,country,age,birthdey,skype,vk,facebook,linkedin,stackoverflow)
              VALUES (:id,:photo,:phone,:city,:country,:age,:birthdey,:skype,:vk,:facebook,:linkedin,:stackoverflow)";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':id', $user_id);
        $stmt->bindParam(':photo', $photo);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':birthdey', $birthdey);
        $stmt->bindParam(':skype', $skype);
        $stmt->bindParam(':vk', $vk);
        $stmt->bindParam(':facebook', $facebook);
        $stmt->bindParam(':linkedin', $linkedin);
        $stmt->bindParam(':stackoverflow', $stackoverflow);
        $stmt->execute();
    }

    public function insertEducation($connect, $user_id)
    {
        $university = '';
        $specialty = '';
        $date_end = '';

        $sql = "INSERT INTO education(university,specialty,date_end,user_id)
              VALUES (:university,:specialty,:date_end,:user_id)";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':university', $university);
        $stmt->bindParam(':specialty', $specialty);
        $stmt->bindParam(':date_end', $date_end);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
    }

    public function insertInfo($connect, $user_id)
    {
        if ($user_id / 2 == 0) {
            $info = 'Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.';
        } else if ($user_id / 3 == 0) {
            $info = 'Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero.';
        } else {
            $info = 'Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus.';
        }

        $sql = "INSERT INTO info(id,info)
              VALUES (:id,:info)";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':id', $user_id);
        $stmt->bindParam(':info', $info, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function insertLanguage($connect, $user_id)
    {
        $language_name = '';
        $level = '';

        $sql = "INSERT INTO info(user_id,language_name,level)
              VALUES (:user_id,:language_name,:level)";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':language_name', $language_name);
        $stmt->bindParam(':level', $level);
        $stmt->execute();
    }

    public function insertObjective($connect, $user_id)
    {
        $obj = 'Junior PHP developer position';
        if ($user_id / 2 == 0) {
            $summary = 'Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus.';
        } else {
            $summary = 'Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus.';
        }


        $sql = "INSERT INTO objective(id,obj,summary)
              VALUES (:id,:obj,:summary)";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':id', $user_id);
        $stmt->bindParam(':obj', $obj, PDO::PARAM_STR);
        $stmt->bindParam(':summary', $summary, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function insertPractice($connect, $user_id)
    {
        $cource = '';
        $description = '';
        $begin_date = '';
        $end_date = '';
        $demo_code = '';
        $sourse_code = '';
        $sql = "INSERT INTO info(user_id,cource,description,begin_date,end_date,demo_code,sourse_code)
              VALUES (:user_id,:cource,:description,:begin_date,:end_date,:demo_code,:sourse_code)";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':cource', $cource);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':begin_date', $begin_date);
        $stmt->bindParam(':end_date', $end_date);
        $stmt->bindParam(':demo_code', $demo_code);
        $stmt->bindParam(':sourse_code', $sourse_code);
        $stmt->execute();
    }

    public function insertSkill($connect, $user_id)
    {
        $category = '';
        $technologies = '';
        $sql = "INSERT INTO info(user_id,category,technologies)
              VALUES (:user_id,:category,:technologies)";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':technologies', $technologies);
        $stmt->execute();
    }


    public function insertUser($connect, $user_id)
    {
        $username = 'NIk' . $user_id;
        $name = 'sfsd' . $user_id;
        $photo = 'sdfsd' . $user_id;
        $lastname = 'sdsd' . $user_id;
        $password = 'sdsdf' . $user_id;
        $email = 'sdsd' . $user_id;
        $is_active = 1;
        $roles = 'dsf' . $user_id;
        $contact = $user_id;
        $objective = $user_id;
        $info = $user_id;

        $sql = "INSERT INTO app_users(id,username,name,lastname,password,email,is_active,roles,contact_id,objective_id,info_id)
              VALUES (:id,:username,:name,:lastname,:password,:email,:is_active,:roles,:contact,:objective,:info)";

        $stmt = $connect->prepare($sql);

        $stmt->bindParam(':id', $user_id);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':is_active', $is_active);
        $stmt->bindParam(':roles', $roles);
        $stmt->bindParam(':contact', $contact);
        $stmt->bindParam(':objective', $objective);
        $stmt->bindParam(':info', $info);

        $stmt->execute();

    }


    public function loadCertificate()
    {
    }

    public function generateDataContact()
    {
    }

    public function generateDataEducation()
    {
    }

    public function generateDataInfo()
    {
    }

    public function generateDataLanguage()
    {
    }

    public function generateDataObjective()
    {
    }

    public function generateDataPractice()
    {
    }

    public function generateDataSkill()
    {
    }

    public function generateDataUser()
    {
    }

}

$generate = new GenerateDataTest('localhost', 'lg', 'utf8mb4', 'benki', '*****');
$generate->main();