<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about d-flex justify-content-center align-items-center">

    <div>
        <div class="card card-body col-sm-12 col-12">
            <h3>Xususiyatlar</h3>
            <p>Fanlarda test yechadigan dastur odatda quyidagi xususiyatlarga ega bo'ladi:</p>

            <ol>
                <li>
                    <p><strong>Foydalanuvchi interfeysi (UI)</strong></p>
                    <ul>
                        <li><strong>Ro'yxatdan o'tish va kirish:</strong> Foydalanuvchilar tizimga kirishi yoki yangi hisob
                            yaratishi mumkin.
                        </li>
                        <li><strong>Foydalanuvchi profili:</strong> Har bir foydalanuvchi o'z profilini ko'rishi va tahrirlashi
                            mumkin.
                        </li>
                        <li><strong>Testlar ro'yxati:</strong> Turli fanlardan testlarni ko'rish va tanlash imkoniyati.</li>
                        <li><strong>Testni boshlash va yakunlash:</strong> Foydalanuvchilar testni boshlashi, davom ettirishi va
                            yakunlashi mumkin.
                        </li>
                        <li><strong>Natijalar va statistika:</strong> Test natijalarini ko'rish va tahlil qilish imkoniyati.
                        </li>
                    </ul>
                </li>
                <li>
                    <p><strong>Backend funksional imkoniyatlari</strong></p>
                    <ul>
                        <li><strong>Ma'lumotlar bazasi boshqaruvi:</strong> Savollar, javoblar va foydalanuvchi ma'lumotlarini
                            saqlash.
                        </li>
                        <li><strong>Savollarni tasniflash:</strong> Savollarni turli kategoriyalar va darajalarga ajratish.</li>
                        <li><strong>Testni baholash:</strong> Testni avtomatik baholash va natijalarni hisoblash.</li>
                        <li><strong>Xavfsizlik:</strong> Foydalanuvchi ma'lumotlarini himoyalash va xavfsizligini ta'minlash.
                        </li>
                    </ul>
                </li>
                <li>
                    <p><strong>Testni yaratish va boshqarish</strong></p>
                    <ul>
                        <li><strong>Savollarni qo'shish va tahrirlash:</strong> Administratorlar yoki o'qituvchilar savollarni
                            qo'shishi va tahrirlashi mumkin.
                        </li>
                        <li><strong>Turli savol turlari:</strong> Ko'p tanlovli, to'g'ri/noto'g'ri, ochiq javobli savollar va
                            boshqalar.
                        </li>
                        <li><strong>Vaqtni boshqarish:</strong> Testlarni ma'lum bir vaqt bilan cheklash imkoniyati.</li>
                    </ul>
                </li>
            </ol>
            <h3>Dastur Arxitekturasi</h3>
            <ol>
                <li>
                    <p><strong>Frontend:</strong></p>
                    <ul>
                        <li><strong>HTML, CSS, JavaScript:</strong> UI yaratish uchun asosiy texnologiyalar.</li>
                        <li><strong>Frontend frameworklari:</strong> React, Angular, Vue.js va boshqalar.</li>
                        <li><strong>API chaqiruvlari:</strong> Backend bilan muloqot qilish uchun AJAX yoki Fetch API.</li>
                    </ul>
                </li>
                <li>
                    <p><strong>Backend:</strong></p>
                    <ul>
                        <li><strong>Server tomon dasturlash tili:</strong> PHP, Node.js, Python (Django yoki Flask) va
                            boshqalar.
                        </li>
                        <li><strong>Framework:</strong> Yii2 (PHP uchun), Express (Node.js uchun) va boshqalar.</li>
                        <li><strong>API yaratish:</strong> RESTful API yoki GraphQL.</li>
                    </ul>
                </li>
                <li>
                    <p><strong>Ma'lumotlar bazasi:</strong></p>
                    <ul>
                        <li><strong>SQL:</strong> MySQL, PostgreSQL va boshqalar.</li>
                        <li><strong>NoSQL:</strong> MongoDB va boshqalar.</li>
                        <li><strong>ORMlar:</strong> Yii2 uchun Active Record, Django ORM va boshqalar.</li>
                    </ul>
                </li>
            </ol>
        </div>
    </div>

</div>
