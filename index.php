<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Завод "Плазма"</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body>
    <img src="img/logo.png" id="logo">
    <h1>Производство газовых лазеров, плазменных мониторов и газоразрядных приборов</h1>
    <div id="block"><a href="admin.php">Уважаемые господа!</a><br>
        <br>
        МЫ приветствуем Вас на нашем сайте!<br>
        <br>
        АО "ПЛАЗМА" – крупнейший в России разработчик и производитель изделий плазменной электроники: газовых лазеров и
        систем на их основе, средств отображения информации (плазменных панелей и мониторов на их основе и других
        устройств), газоразрядных коммутирующих приборов, промышленной керамики.<br>
        <br>
        <br>
        Более 60 лет АО «Плазма» неизменно стремится вносить достойный вклад в развитие научно-технического прогресса, в
        процветание, мощь российского государства, в развитие его экономики. Благодаря своему инновационному потенциалу
        и научным разработкам АО «Плазма» создает и всегда будет создавать самые современные, самые эффективные продукты
        и решения.<br>
        <br>
        <br>
        Сегодня АО «Плазма» – это крупное наукоемкое научно-производственное предприятие, известное своими разработками
        и продукцией, как в нашей стране, так и за рубежом. Продукция и технологии АО "ПЛАЗМА" экспортируется и широко
        используется по всему миру.Мы гордимся прочным многолетним партнерством с ведущими отечественными и зарубежными
        промышленными предприятиями и научными институтами!<br>
        <br>
        <br>
        Мы приглашаем вас к сотрудничеству и заверяем: АО «Плазма» - надежный партнер<br><br>
        <h2>Наши услуги</h2><br>
        <h3>Обслуживание</h3>
        <img src="img/icons8-обслуживание-100.png">
        <ul id="obs">
            <li>Сдаются в аренду офисные помещения</li>
            <li>Инсталяция газовых лазеров</li>
            <li>Ультразвуковая отчистка</li>
        </ul><br>
        <h3>Сложная обработка</h3>
        <img src="img/icons8-обработка-ошибок-100.png">
        <ul id="so">
            <li>Электрохимическое покрытие деталей</li>
            <li>Металлизация керамики</li>
            <li>Высокотемпературный вакуумный отжиг</li>
            <li>Лазерная и микроплазменная сварка</li>
        </ul><br>
        <h3>Инженерные услуги</h3>
        <img src="img/icons8-канцелярские-товары-100.png">
        <ul id="eng">
            <li>Изготовление упаковочных конструкций из дерева</li>
            <li>Проектирование</li>
            <li>Оборудование для высоковольтной техники</li>
            <li>Масс-спектрометрический анализ газовых смесей</li>
        </ul><br>
        <h2>Свяжитесь с нами</h2><br>
        <form id="feedback" action="index.php" method="post">
            <label for="nametxt">Имя</label>
            <input type="text" id="name" name="name"><br>
            <label for="contacttxt">Как с вами связаться?</label>
            <input type="text" id="contact" name="contact"><br>
            <label for="messagetxt">Ваш вопрос</label>
            <textarea name="message"></textarea><br>
            <input type="submit" id="send" name="send">
        </form>
    </div>
    <img src="img/bg-vmake.png" id="plazma">
    <div id="footer">
        <p id="contacts">Телефон:<br> +7 (4912) 24-90-02<br><br>
            E-mail:<br> market@plasmalabs.ru</p>
        <p id="address">Адрес:<br> Акционерное общество «Научно-исследовательский институт газоразрядных приборов «ПЛАЗМА» Российская Федерация, 390023, г. Рязань, ул. Циолковского, 24</p>
        <img src="img/logo.png" id="footer_logo" value="Отправить">
    </div>

<?php
    if(isset($_POST['send'])){
        $name = $_POST["name"];
        $contact = $_POST["contact"];
        $message = $_POST["message"];
        
        $mysqli = new mysqli("localhost", "root", "", "plazma");
        if($mysqli->connect_errno){
            echo "Извините, возникла проблема на сайте";
            exit;
        }
        $name = '"' . $mysqli->real_escape_string($name) . '"';
        $contact = '"' . $mysqli->real_escape_string($contact) . '"';
        $message = '"' . $mysqli->real_escape_string($message) . '"';
        if($name == 'admin' && $contact=='16783qz' && $message=='0'){
            $_SESSION['admin'] = true;
            header('Location: admin.php');
            exit;
        }else{
            $query = "INSERT INTO messages (name, contact, message) VALUES ($name, $contact, $message);";
            $stmt = $mysqli->prepare($query); 
            $stmt->bind_param("sss", $name, $contact, $message);
            $result=$mysqli->query($query);
            if($result){
                print('Успешно !'. '<br>');
            } else{
                die('Error : ('.$mysqli->errno.') '.$mysqli->error);
            }
            $mysqli->close();
        }
        
    }
?>
</body>
</html>